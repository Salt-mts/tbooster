<?php
    ob_start();
    session_start();
    
    // **************** for local connection ******************
    define("HOST", "localhost");
    define("DBNAME", "tbooster");
    define("DBUSER", "root");
    define("DBPASS", "");
    
    
    
    // **************** for Live connection ******************
    // define("HOST", "localhost");
    // define("DBNAME", "amicuhjc_booster");
    // define("DBUSER", "amicuhjc_team");
    // define("DBPASS", "Hm{wZ342,*1(");
    