<?php

// connect to the mysql database and create the users table
// if it doesn't already exist

$servername = getenv("DB_HOST") ? getenv("DB_HOST") : "localhost"; // REPLACE with Database host, usually localhost

if (getenv("DB_HOST")) {
    $servername = getenv("DB_HOST");
    $dbname = "postdb";
    $dbuser = "postdb";
} else {
    $servername = "localhost";
    $dbname = "picchioj_postdb";
    $dbuser = "picchioj_postdb";
}

$dbpass = "secret";

// Create connection
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create tables (photo, tag) with relationships
$sql1 = "CREATE TABLE IF NOT EXISTS photo (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    image LONGBLOB NOT NULL,
    imagetype VARCHAR(30) NOT NULL
    )";

$sql2 = "CREATE TABLE IF NOT EXISTS tag (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    photoId INT(6) UNSIGNED NOT NULL,
    tag1 VARCHAR(30) NOT NULL,
    tag2 VARCHAR(30) NOT NULL,
    tag3 VARCHAR(30) NOT NULL,
    tag4 VARCHAR(30) NOT NULL,
    tag5 VARCHAR(30) NOT NULL,
    FOREIGN KEY (photoId) REFERENCES photo(id)
    )";


// executing sql query
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);


// sends result back in JSON format
echo json_encode(array("results" => array($result1, $result2)));
