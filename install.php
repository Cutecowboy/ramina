<?php 

include("config.php");

// connect to the db

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

// queries

$sql = "DROP TABLE IF EXISTS courses;";

$sql .= "CREATE TABLE courses(
    courseid VARCHAR(6) PRIMARY KEY NOT NULL,
    courname VARCHAR(20) NOT NULL, 
    progression VARCHAR(1) NOT NULL,
    period INT(1) NOT NULL
    );
    ";


$sql .= "INSERT INTO courses VALUES
    ('DT057G', 'Webbutveckling', 'A',1),
    ('DT087G', 'Introduktion till programmering i JavaScript', 'A', 1),
    ('DT200G', 'Grafisk teknik för webb', 'A', 2),
    ('DT068G', 'Webbanvändbarhet', 'B', 2),
    ('DT003G', 'Databaser', 'A', 3),
    ('DT093G', 'Frontend-baserad webbutveckling', 'B', 3),
    ('DT197G', 'Backend-baserad webbutveckling', 'B', 4),
    ('DT173G', 'Programmering i TypeScript', 'B', 4
    
    );
    ";

echo "<pre>$sql</pre>";

if($db->multi_query($sql)) {
    echo "Tabell installerad";
} else echo "Fel vid installation";