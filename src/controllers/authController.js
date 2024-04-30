const pool = require("../database");
const express = require("express");
const router = express.Router();

// LOGIN

router.get("/login", (req, res) => {
    res.render("pages/login");
});

router.post("/checklogin", (req, res) => {
    const { username, type, password } = req.body;
    let sql;
    if (type == "finder") {
        sql = "SELECT * FROM user_finder WHERE username = ?";
    } else {
        sql = "SELECT * FROM user_provider WHERE username = ?";
    }
    pool.query(sql, [username], (error, results) => {
        if (error) {
            console.error("Error executing query:", error);
            res.status(500).json({ error: "Internal Server Error" });
            return;
        }
        if (results.length == 0) {
            const errorMessage = "Oops! Incorrect Username password.";
            res.render("pages/error", { errorMessage: errorMessage, route: "/login", text: "Login" });
        } else if (results[0].password == password) {
            req.session.username = username;
            req.session.type = type;
            res.redirect("/user/account");
        } else {
            const errorMessage = "Oops! Incorrect Username password.";
            res.render("pages/error", { errorMessage: errorMessage, route: "/auth/login", text: "Login" });
        }
    });
});

router.get("/choose", (req, res) => {
    res.render("pages/choose");
});

router.post("/check_username_existence", (req, res) => {
    const { username, type } = req.body;
    let sql;
    if (type == "finder") {
        sql = "SELECT * FROM user_finder WHERE username = ?";
    } else {
        sql = "SELECT * FROM user_provider WHERE username = ?";
    }
    pool.query(sql, [username, type], (error, results) => {
        if (error) {
            console.error("Error executing query:", error);
            res.status(500).json({ error: "Internal Server Error" });
            return;
        }
        const isExist = results.length > 0;
        console.log("Username exists:", isExist);
        res.json({ is_exist: isExist });
    });
});

// SIGNUP PROVIDER

router.get("/signup_provider", (req, res) => {
    res.render("pages/signup_provider");
});

router.post("/signup_provider_submit", (req, res) => {
    const { username, name, password, service_name, description, state, city, area, phonenumber } = req.body;
    const out = /^[a-zA-Z]+$/.test(name);
    const out1 = /^[a-zA-Z\s]+$/.test(service_name);
    if (phonenumber.length != 10) {
        return res.redirect("/auth/signup_provider?problem=contact");
    } else if (!out) {
        return res.redirect("/auth/signup_provider?problem=name");
    } else if (!out1) {
        return res.redirect("/auth/signup_provider?problem=service");
    }
    const sql =
        "INSERT INTO user_provider (username, name, password, service_name, description, state, city, area, phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    const values = [username, name, password, service_name, description, state, city, area, phonenumber];
    pool.query(sql, values, (error, results) => {
        if (error) {
            console.error("Error inserting data into user_provider table:", error);
            res.redirect("/auth/error");
        } else {
            res.redirect("/auth/success");
        }
    });
});

// SIGNUP FINDER

router.get("/signup_finder", (req, res) => {
    res.render("pages/signup_finder");
});

router.post("/signup_finder_submit", (req, res) => {
    const { username, name, password } = req.body;
    const sql = "INSERT INTO user_finder (username, name, password) VALUES (?, ?, ?)";
    const values = [username, name, password];
    pool.query(sql, values, (error, results) => {
        if (error) {
            console.error("Error inserting data into user_finder table:", error);
            res.redirect("/auth/error");
        } else {
            res.redirect("/auth/success");
        }
    });
});

// Other authentication routes

router.post("/logout", (req, res) => {
    req.session.destroy();
    res.redirect("/home");
});

router.get("/success", (req, res) => {
    res.render("pages/success");
});

router.get("/error", (req, res) => {
    const errorMessage = "Oops! Something went wrong.";
    res.render("pages/error", { errorMessage: errorMessage, route: "/home", text: "Home" });
});

module.exports = router;
