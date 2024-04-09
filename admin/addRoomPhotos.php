<?php require '../database/databaseConnection.php'?>
<?php
// to save photos and details of room to database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //setting parameters for image upload
    $target_dir = "../ourRooms/";
    $displayImage_path = $target_dir . basename($_FILES["DisplayImage"]["name"]);
    $img1_path = $target_dir . basename($_FILES["img1"]["name"]);
    $img2_path = $target_dir . basename($_FILES["img2"]["name"]);
    $img3_path = $target_dir . basename($_FILES["img3"]["name"]);
    $img4_path = $target_dir . basename($_FILES["img4"]["name"]);

    //moving uploaded images to the target directory
    $displayImage_uploaded = move_uploaded_file($_FILES["DisplayImage"]["tmp_name"], $displayImage_path);
    $img1_uploaded = move_uploaded_file($_FILES["img1"]["tmp_name"], $img1_path);
    $img2_uploaded = move_uploaded_file($_FILES["img2"]["tmp_name"], $img2_path);
    $img3_uploaded = move_uploaded_file($_FILES["img3"]["tmp_name"], $img3_path);
    $img4_uploaded = move_uploaded_file($_FILES["img4"]["tmp_name"], $img4_path);

    if ($displayImage_uploaded && $img1_uploaded && $img2_uploaded && $img3_uploaded && $img4_uploaded) {
        // All images uploaded successfully

        //getting other data
        $room_detail = $_POST["roomDetail"];
        $roomId = $_POST['roomID'];
        echo $roomId;

        // update table query with prepared statement
        $update = $conn->prepare("UPDATE rooms SET imagePath=?, photo1=?, photo2=?, photo3=?, photo4=?, detailedInfo=? WHERE roomId =?");
        $update->bind_param("ssssssi", $displayImage_path, $img1_path, $img2_path, $img3_path, $img4_path, $room_detail, $roomId);
        if ($update->execute()) {
            echo "Room photos added successfully";
            header("Location: a_roomSetting.php");
        } else {
            echo "failed";
        }

        $update->close();
    } else {
        // One or more images failed to upload
        echo "Image upload failed";
    }

    $conn->close();
}
