<?php require '../database/databaseConnection.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // handling file upload
    $target_folder = "../ourTeam/";
    $target_file = $target_folder . basename($_FILES["memberPhoto"]["name"]);
    move_uploaded_file($_FILES["memberPhoto"]["tmp_name"], $target_file);

    // getting other form data
    $memberName = $_POST["teamMember_name"];
    $memberPosition = $_POST["teamMember_position"];
    $photo = $target_file;

    // inseting data into database
    $stmt = $conn->prepare("INSERT INTO team_members(member_name, member_position, photo_path) VALUES(?,?,?)");
    $stmt->bind_param("sss", $memberName, $memberPosition, $photo);
    if ($stmt->execute() === true) {
        echo "<script>alert('data updated successfully')</script>";
        echo "<script>window.location.href='a_settings.php';</script>";
    } else {
        die("Error: " . $sql . "<br>" . $conn->error());
    }

    // close connection
    $stmt->close();
    $conn->close();
}
