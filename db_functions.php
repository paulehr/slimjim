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

function new_post($DB_CONN, $p_title, $p_content) {
    $p_date = date("Y-m-d H:i:s");
    $sql = $DB_CONN->prepare("insert into articles (post_date, title, article) values (?,?,?)");
    $sql->bind_param("sss", $p_date, $p_title, $p_content);
    $sql->execute();
    mysqli_close($DB_CONN);
}

function update_post($DB_CONN, $p_id, $p_title, $p_content) {
    $p_date = date("Y-m-d H:i:s");
    $sql = $DB_CONN->prepare("update articles set post_date = ?, title = ?, article = ? where id = ?");
    $sql->bind_param("sssi", $p_date, $p_title, $p_content, $p_id);
    $sql->execute();
    mysqli_close($DB_CONN);

}

function delete_post($DB_CONN, $p_id) {
    $sql = $DB_CONN->prepare("delete from articles where id = ?");
    $sql->bind_param("i", $p_id);
    $sql->execute();
    mysqli_close($DB_CONN);
}
?>
