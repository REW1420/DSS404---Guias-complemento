<?php
include_once ('class/database.class.php');

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];

    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    $stmt = $mysqli->prepare("DELETE FROM libros WHERE isbn = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: libros-singleton.php");

}
?>
