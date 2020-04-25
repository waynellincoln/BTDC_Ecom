<?php

    ob_start();

    session_start();

    //if directory separator is not defined, define it as DS
    defined ("DS") ? null : define ("DS", DIRECTORY_SEPARATOR);

    //defining root directory
     __DIR__ ;

    //idefining path to template front
    defined ("TEMPLATE_FRONT") ? null : define ("TEMPLATE_FRONT", __DIR__ . DS . "template/front");

    //defining path to template back
    defined ("TEMPLATE_BACK") ? null : define ("TEMPLATE_BACK", __DIR__ . DS . "template/back");

    //defining database connection
    defined ("DB_HOST") ? null : define ("DB_HOST",  "localhost");
    defined ("DB_USER") ? null : define ("DB_USER",  "root");
    defined ("DB_PASS") ? null : define ("DB_PASS",  "");
    defined ("DB_NAME") ? null : define ("DB_NAME",  "ecommerce");
 
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    require_once ("functions.php");
    













?>