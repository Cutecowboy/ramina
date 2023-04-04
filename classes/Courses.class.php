<?php

class Courses
{
    //properties
    private $db;
    private $courseid;
    private $coursename; 
    private $progression; 
    private $syllabus;

    // constructor connect to db 
    function __construct(){
        $this->db = new mysqli(DBHOST,DBUSER, DBPASS, DBDATABASE); 

        if($this->db->connect_errno > 0){
            die('Error connecting to database: ' . $this->db->connect_error);
        }
    }


    //methods 

    //setters 

    function setCourseId(string $courseid) : bool {
        $courseid = strip_tags($courseid);
        if(strlen($courseid) === 6){
            $this->courseid = $courseid;
            return true;
        } else return false;
    }    

    function setcourseName(string $coursename) : bool {
        $coursename = strip_tags($coursename);
        if(strlen($coursename) > 0){
            $this->coursename = $coursename;
            return true;
        } else return false;
    }

    function setProgression(string $progression) : bool {
        if(strlen($progression === 1)){
            $this->progression = $progression; 
            return true;
        } else return false;
    }

    function setSyllabus(string $syllabus) : bool {
        $syllabus = strip_tags($syllabus);
        // 84 is the minimum length of link https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/search/
        if(strlen($syllabus > 84)){
            $this->syllabus = $syllabus;
            return true;
        } else return false;
       
    }


}
