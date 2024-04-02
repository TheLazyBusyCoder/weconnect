const express = require("express");
const session = require("express-session");

const bodyParser = require("body-parser");
const path = require("path");
const PORT = process.env.PORT || 3000;
const mysql = require("mysql");

const pool = mysql.createPool({
    connectionLimit: 10,
    host: "localhost",
    user: "root",
    password: "",
    database: "project",
});

pool.getConnection((err, con) => {
    if (err) {
        console.log(err);
    } else {
        console.log("Database connected");
    }
});

const app = express();

app.set("view engine", "ejs");
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.set("views", path.join(__dirname, "src", "views"));
app.use(express.static("public"));
app.use(
    session({
        secret: "123456789",
        resave: true,
        saveUninitialized: true,
    })
);

app.get(["/", "/home"], (req, res) => {
    res.render("pages/home");
});

app.post("/getcity", (req, res) => {
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

app.post("/getdatabyservice", (req, res) => {
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

// logout
app.post("/logout", (req, res) => {
    req.session.destroy();
    res.redirect("/home");
});

// update
app.post("/update", (req, res) => {
    const { username, name, service_name, description, phonenumber } = req.body;
    const sql = `UPDATE user_provider 
                 SET name = ?, service_name = ?, description = ?, phonenumber = ? WHERE username = ?`;
    pool.query(sql, [name, service_name, description, phonenumber, username], (err, result) => {
        if (err) throw err;
        console.log("Record updated successfully");
        res.redirect("/account?updated=1");
    });
});

// login

app.get("/login", (req, res) => {
    res.render("pages/login");
});

app.get("/searchpage", (req, res) => {
    res.render("pages/search.ejs");
});

app.get("/account", (req, res) => {
    const username = req.session.username;
    const type = req.session.type;
    let sql;
    if (type == "finder") {
        res.redirect("/searchpage");
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

app.post("/checklogin", (req, res) => {
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
            res.redirect("/account");
        } else {
            const errorMessage = "Oops! Incorrect Username password.";
            res.render("pages/error", { errorMessage: errorMessage, route: "/login", text: "Login" });
        }
    });
});

// SIGNUP

app.get("/choose", (req, res) => {
    res.render("pages/choose");
});

app.get("/signup_provider", (req, res) => {
    res.render("pages/signup_provider");
});

app.post("/check_username_existence", (req, res) => {
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

app.post("/signup_provider_submit", (req, res) => {
    const { username, name, password, service_name, description, state, city, area, phonenumber } = req.body;
    const sql =
        "INSERT INTO user_provider (username, name, password, service_name, description, state, city, area, phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    const values = [username, name, password, service_name, description, state, city, area, phonenumber];
    pool.query(sql, values, (error, results) => {
        if (error) {
            console.error("Error inserting data into user_provider table:", error);
            res.redirect("/error");
        } else {
            res.redirect("/success");
        }
    });
});

app.post("/signup_finder_submit", (req, res) => {
    const { username, name, password } = req.body;
    const sql = "INSERT INTO user_finder (username, name, password) VALUES (?, ?, ?)";
    const values = [username, name, password];
    pool.query(sql, values, (error, results) => {
        if (error) {
            console.error("Error inserting data into user_finder table:", error);
            res.redirect("/error");
        } else {
            res.redirect("/success");
        }
    });
});

app.get("/success", (req, res) => {
    res.render("pages/success");
});

app.get("/error", (req, res) => {
    const errorMessage = "Oops! Something went wrong.";
    res.render("pages/error", { errorMessage: errorMessage });
});

app.get("/signup_finder", (req, res) => {
    res.render("pages/signup_finder");
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
