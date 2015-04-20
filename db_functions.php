<?php
/* ==============================================================
/*
/* db_fucntions.php - library to access and operate on mysql db
/* 
/* ==============================================================
*/

$DB_HOST = 'localhost';
$DB_USER = 'slim';
$DB_PASS = 'slim';
$DB_INST = 'blog';

$blog_db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_INST);

if($blog_db->connect_errno > 0) {
    die('Unable to connect to database [' . $blog_db->connect_error . ']');
}

$sql = <<<SQL
    SELECT *
    FROM `articles`
SQL;

if (!$result = $blog_db->query($sql)) {
    die ('There was an error running the query[' . $blog_db->error . ']');
}

while ($row = $result->fetch_assoc()) {
    echo '============================' . '<br />';
    echo $row['title'] . '<br />';
    echo $row['post_date'] . '<br />';
    echo $row['article'] . '<br />';
    echo $row['author'] . '<br />';
    echo '============================' . '<br />';
    
}

$result->free();

?>