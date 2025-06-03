<?php

$servername = "127.0.0.1";
$username = "root";
$password = "password";
$dbname = "db_name";

$link = mysqli_connect($servername, $username, $password);

if (!link) {
    die("Error connection: " . mysqli_connection_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (mysqli_query($link, $sql)) {
    echo "Not create database";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
)";

if(!mysqli_query($link, $sql)) {
    echo "Not create table Users";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL,
    )";

if(!mysqli_query($link, $sql)) {
    echo "Not create table Posts";
}

mysqli_close($link);

?>