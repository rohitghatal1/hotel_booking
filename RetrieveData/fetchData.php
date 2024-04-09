<?php require '../database/databaseConnection.php'?>
<?php

function getGeneralData()
{
    global $conn, $hotelName, $aboutHotel;
    $tabledata = "SELECT * FROM general_settings";
    $result = $conn->query($tabledata);
    $fetchedData = $result->fetch_assoc();
    $hotelName = $fetchedData['hotel_name'];
    $aboutHotel = $fetchedData['about_hotel'];
}

function getContactDetails()
{
    global $conn, $address, $contact1, $contact2, $email, $facbookLink, $instagramLink, $twitterLink, $mapLink;
    $contactDetails = "SELECT * FROM contact_details";
    $contactResult = $conn->query($contactDetails);
    $fetchedContactData = $contactResult->fetch_assoc();

    $address = $fetchedContactData['address'];
    $contact1 = $fetchedContactData['phoneno1'];
    $contact2 = $fetchedContactData['phoneno2'];
    $email = $fetchedContactData['email'];
    $facebookLink = $fetchedContactData['facebookLink'];
    $instagramLink = $fetchedContactData['instagramLink'];
    $twitterLink = $fetchedContactData['twitterLink'];
    $mapLink = $fetchedContactData['mapLink'];
}
