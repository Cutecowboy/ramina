<?php 

include("config.php");

// connect to the db

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

// queries

$sql = "DROP TABLE IF EXISTS courses;";

$sql .= "CREATE TABLE courses(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    courseid VARCHAR(6) NOT NULL,
    name VARCHAR(20) NOT NULL, 
    progression VARCHAR(1) NOT NULL,
    syllabus VARCHAR(250) NOT NULL
    );
    ";


$sql .= "INSERT INTO courses VALUES
    (1, 'DT057G', 'Webbutveckling', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt057g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    (2, 'DT087G', 'Introduktion till programmering i JavaScript', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt084g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    (3, 'DT200G', 'Grafisk teknik för webb', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt200g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    (4, 'DT068G', 'Webbanvändbarhet', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt068g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    (5, 'DT003G', 'Databaser', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt003g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    (6, 'DT093G', 'Frontend-baserad webbutveckling', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt211g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    (7, 'DT197G', 'Backend-baserad webbutveckling', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt207g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    (8, 'DT173G', 'Programmering i TypeScript', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt208g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'
    );
    ";

echo "<pre>$sql</pre>";

if($db->multi_query($sql)) {
    echo "Tabell installerad";
} else echo "Fel vid installation";