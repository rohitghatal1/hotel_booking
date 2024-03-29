<?php require '../database/databaseConnection.php'?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userID"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $updateUser = $conn->prepare("UPDATE users SET firstName=?, lastName=?, gender=?, address=?, contact=?, email=?, username=?, password=? WHERE UID=?");
    $updateUser->bind_param("ssssssssi", $fname, $lname, $gender, $address, $contact, $email, $username, $password, $userId);

    if ($updateUser->execute()) {
        echo "<script>alert('User Data updated successfully')</script>";
        echo "<script>window.location.href ='userPage.php'</script>";
    } else {
        echo "<script>alert('Failed to update data')</script>";
        echo "<script>window.location.href ='userPage.php'</script>";
    }
}
