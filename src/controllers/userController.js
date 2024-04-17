const pool = require("../database");
const express = require("express");
const router = express.Router();

// PROVIDER ROUTES

router.get("/account", (req, res) => {
    const username = req.session.username;
    const type = req.session.type;
    let sql = "select * from user_provider where username = ?";
    if (type == "finder") {
        res.redirect("/user/searchpage");
    } else {
        pool.query(sql, [username], (err, results) => {
            if (err) throw err;
            if (results.length > 0) {
                const userData = results[0];
                console.log(userData);
                res.render("pages/accounts", {
                    username: userData.username,
                    name: userData.name,
                    service_name: userData.service_name,
                    state: userData.state,
                    city: userData.city,
                    area: userData.area,
                    description: userData.description,
                    phonenumber: userData.phonenumber,
                });
            } else {
                res.redirect("/login");
            }
        });
    }
});

router.post("/update", (req, res) => {
    const { username, name, service_name, description, phonenumber } = req.body;
    const sql = `UPDATE user_provider 
                 SET name = ?, service_name = ?, description = ?, phonenumber = ? WHERE username = ?`;
    pool.query(sql, [name, service_name, description, phonenumber, username], (err, result) => {
        if (err) throw err;
        console.log("Record updated successfully");
        res.redirect("/user/account?updated=1");
    });
});

// FINDER ROUTES

router.post("/getcity", (req, res) => {
    const { city } = req.body;

    const sql = "SELECT area FROM city WHERE city = ?";

    pool.query(sql, [city], (err, results) => {
        if (err) {
            console.error("Error executing query:", err);
            res.status(500).json({ error: "An error occurred while fetching data" });
            return;
        }
        console.log("Fetched data:", results);
        res.json({ data: results });
    });
});

router.post("/getdatabyservice", (req, res) => {
    const { servicename } = req.body;
    const data = servicename.split(",");
    let sql =
        "SELECT username, description, name, phonenumber, area, city, state, service_name FROM user_provider WHERE service_name = ?";
    let params = [data[0]];

    if (data[1]) {
        sql += " AND state = ?";
        params.push(data[1]);
    }
    if (data[2]) {
        sql += " AND city = ?";
        params.push(data[2]);
    }
    if (data[3]) {
        sql += " AND area = ?";
        params.push(data[3]);
    }
    pool.query(sql, params, (err, results) => {
        if (err) {
            console.error("Error executing query:", err);
            res.status(500).json({ error: "An error occurred while fetching data" });
            return;
        }
        console.log("Fetched data:", results);
        res.json({ data: results });
    });
});

router.get("/searchpage", (req, res) => {
    const username = req.session.username;
    const type = req.session.type;
    if (username && type) {
        res.render("pages/search.ejs");
    } else {
        res.redirect("/auth/login");
    }
});

module.exports = router;
