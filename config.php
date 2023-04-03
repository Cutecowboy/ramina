<?php 

spl_autoload_register(function($class_name){
    include 'classes/' . $class_name . '.class.php';
});

$devmode = true;

if($devmode) {
    error_reporting(-1);
    ini_set("display_errors", 1);

    define("DBHOST", "localhost");
    define("DBUSER", "catapi");
    define("DBPASS", "password");
    define("DBDATABASE", "catapi");
} else {
    // lägg in dbserver i molnet
    define("DBHOST", "localhost");
    define("DBUSER", "catapi");
    define("DBPASS", "password");
    define("DBDATABASE", "catapi");
}