<?php require '../database/databaseConnection.php'?>
<?php
if (isset($_POST['memberName'])) {
    $employeeName = $_POST['memberName'];
    $stmt = $conn->prepare("DELETE FROM team_members where member_name =?");
    $stmt->bind_param("s", $employeeName);
    $stmt->execute();
    exit();
}
