<?php

//======================================HELPER FUNCTIONS===================================================
    
function set_message($msg) {
    
    if (!empty($msg)) {
        
        $_SESSION['message'] = $msg;
        
    } else {
        
        $msg = "";
    }  
}


function display_message(){
    
    if (isset($_SESSION['message'])) {
        
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }   
}


function redirect () {
    
    header ("Location: $location");
    
}


function query ($sql) {
    
    global $con;
    
    return mysqli_query ($con, $sql);
    
}

function result ($result) {
    
    global $con;
    
    if (!$result) {
        
        die ("QUERY FAILED " . mysqli_error($con));
    }
}


function escape ($string) {
    
    global $con;
    
    return mysqli_real_escape_string ($con, $string);
}


function fetch_array ($result) {
    
    global $con;
    
    return mysqli_fetch_array ($result);
    
}





?>