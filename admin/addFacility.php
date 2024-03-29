<?php require '../database/databaseConnection.php';?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //handling file upload
    $target_folder = "../facilities/";
    $target_file = $target_folder . basename($_FILES["facilityImage"]["name"]);
    move_uploaded_file($_FILES["facilityImage"]["tmp_name"], $target_file);

    // getting other form data
    $facilityName = $_POST['facilityname'];
    $description = $_POST['aboutFacility'];
    $photo = $target_file;

    // inserin data into database
    $stmt = $conn->prepare("INSERT INTO facilities(pic, facilityName, aboutFacility) VALUES (?,?,?);");
    $stmt->bind_param("sss", $photo, $facilityName, $description);
    if ($stmt->execute() === true) {
        echo "<script>alert('Facility added successfully')</script>";
        echo "<script>window.location.href='Admin_facilities.php';</script>";
    } else {
        die("Error: " . $sql . "<br>. $conn->error());</script>");
    }
    //close connection
    $stmt->close();
    $conn->close();
}