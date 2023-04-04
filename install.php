<?php 

include("config.php");

// connect to the db

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

// queries

$sql = "DROP TABLE IF EXISTS courses;";

$sql .= "CREATE TABLE courses(
    id VARCHAR(6) PRIMARY KEY NOT NULL,
    name VARCHAR(20) NOT NULL, 
    progression VARCHAR(1) NOT NULL,
    syllabus VARCHAR(250) NOT NULL
    );
    ";


$sql .= "INSERT INTO courses VALUES
    ('DT057G', 'Webbutveckling', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt057g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    ('DT087G', 'Introduktion till programmering i JavaScript', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt084g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    ('DT200G', 'Grafisk teknik för webb', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt200g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    ('DT068G', 'Webbanvändbarhet', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt068g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    ('DT003G', 'Databaser', 'A', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt003g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    ('DT093G', 'Frontend-baserad webbutveckling', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt211g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    ('DT197G', 'Backend-baserad webbutveckling', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt207g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'),
    ('DT173G', 'Programmering i TypeScript', 'B', 'https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/?name=&code=dt208g&level=-1&department=-1&faculty=-1&term=-1&version=1&sort=KursBenamning'
    );
    ";

echo "<pre>$sql</pre>";

if($db->multi_query($sql)) {
    echo "Tabell installerad";
} else echo "Fel vid installation";