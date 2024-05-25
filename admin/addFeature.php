<?php require '../database/databaseConnection.php';?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //handling file upload
    $target_folder = "../features/";
    $target_file = $target_folder . basename($_FILES["featureImage"]["name"]);
    move_uploaded_file($_FILES["featureImage"]["tmp_name"], $target_file);

    // getting other form data
    $featureName = $_POST['featurename'];
    $description = $_POST['aboutFeature'];
    $photo = $target_file;

    // inserin data into database
    $stmt = $conn->prepare("INSERT INTO features(pic, featureName, aboutFeature) VALUES (?,?,?);");
    $stmt->bind_param("sss", $photo, $featureName, $description);
    if ($stmt->execute() === true) {
        echo "<script>alert('Feature added successfully')</script>";
        echo "<script>window.location.href='a_Admin_facilities.php';</script>";
    } else {
        die("Error: " . $sql . "<br>. $conn->error());</script>");
    }
   
    $stmt->close();
    $conn->close();
}