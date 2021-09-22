<?php
    // $servername = 'localhost';
    // $username = 'root';
    // $password = '';
    // $database = 'PAPE';

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = 'heroku_642713f4dfbe555';
?>