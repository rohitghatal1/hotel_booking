<?php require '../database/databaseConnection.php';?>
<!-- script to send contact detals to database -->
<?php

$faddress = $_POST['faddress'];
$phone1 = $_POST['ph1'];
$phone2 = $_POST['ph2'];
$email = $_POST['email'];
$facebookLink = $_POST['facebookLink'];
$instragramLink = $_POST['instagramLink'];
$twitterLink = $_POST['twitterLink'];
$googleMapLink = $_POST['mapLink'];

$updateContact = $conn->prepare("UPDATE contact_details SET
address =?,
phoneno1 =?,
phoneno2=?,
email=?,
facebookLink=?,
instagramLink=?,
twitterLink=? ,
mapLink=? ");

$updateContact->bind_param("ssssssss", $faddress, $phone1, $phone2, $email, $facebookLink, $instragramLink, $twitterLink, $googleMapLink);

if ($updateContact->execute()) {
    echo "<script> alert('Contact Updated Successfully')</script>";
    echo "<script> window.location ='a_settings.php'</script>";
} else {
    die('Error : ' . $updateContact->error);
}
?>