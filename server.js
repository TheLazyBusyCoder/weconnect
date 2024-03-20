const express = require("express");
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

const app = express();

app.set("view engine", "ejs");
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.set("views", path.join(__dirname, "src", "views"));

app.use(express.static("public"));

app.get(["/", "/home"], (req, res) => {
    res.render("pages/home");
});

app.get("/login", (req, res) => {
    res.render("pages/login");
});

app.get("/choose", (req, res) => {
    res.render("pages/choose");
});

app.get("/signup_provider", (req, res) => {
    res.render("pages/signup_provider");
});

app.post("/check_username_existence", (req, res) => {
    const { username, type } = req.body;
    const sql = "SELECT * FROM user_provider WHERE username = ?";
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

app.get("/signup_provider_submit", (req, res) => {
    const { username, name, password, service_name, description, state, city, area, phonenumber } = body.req;
    res.end(`${username} ${description} ${state} ${city} ${area}`);
});

app.get("/signup_finder", (req, res) => {
    res.render("pages/choose");
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
