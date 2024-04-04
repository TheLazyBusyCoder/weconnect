const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser");
const path = require("path");
const PORT = process.env.PORT || 3000;
const pool = require("./src/database");
const userController = require("./src/controllers/userController");
const authController = require("./src/controllers/authController");

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

app.use("/user", userController);
app.use("/auth", authController);

app.get(["/", "/home"], (req, res) => {
    res.render("pages/home");
});

app.get("*", (req, res) => {
    res.render("pages/error.ejs", { errorMessage: "Upps! 404", text: "Page not found", route: "/home" });
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
