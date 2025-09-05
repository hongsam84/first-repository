<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "잘못된 접근입니다.";

}

$id = intval($_GET['id']);

$sql_check = "SELECT id FROM list WHERE id = $id";
$result_check = $conn->query($sql_check);

if ($result_check && $result_check->num_rows > 0) {

    $sql_delete = "DELETE FROM list WHERE id = $id";

    if ($conn->query($sql_delete)) {
        header("Location: mypage.php");
        exit;
    } else {
        echo "삭제 실패: " . $conn->error;
    }
} else {
    echo "삭제 실패: " . $conn->error;
}

$conn->close();
?>


