<?php
/* ==============================================================
/*
/* db_fucntions.php - library to access and operate on mysql db
/* 
/* ==============================================================
*/

function connect_db() {
$DB_HOST = 'localhost';
$DB_USER = 'slim';
$DB_PASS = 'slim';
$DB_INST = 'blog';

$DB_CONN = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_INST);

if (mysqli_connect_errno()) {
    echo "Connection Failed: " . mysqli_connect_errno();
    exit();
}

return $DB_CONN;
}

function get_posts($DB_CONN) {
    $sql = 'select * from articles order by id desc';
    $results = $DB_CONN->query($sql);
    
    while ($row = $results->fetch_assoc()) {
        $records[] = $row;
    }
    
    mysqli_close($DB_CONN);
    return $records;
}

function update_post($DB_CONN) {
    //stub
}

function delete_post($DB_CONN) {
    //stubb
}
?>