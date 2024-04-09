<?php require '../database/databaseConnection.php'?>
<?php
if (isset($_GET['employeeName'])) {
    $employeeName = $_GET['employeeName'];
    $stmt = $conn->prepare("DELETE FROM team_members where member_name =?");
    $stmt->bind_param("s", $employeeName);
    $stmt->execute();

    header("Location: a_settings.php");
    exit();
}
