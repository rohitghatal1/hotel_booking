<?php require '../database/databaseConnection.php';?>
<?php
// creating contact table 
$contactTbl = "CREATE TABLE contact_details(
    address varchar(200),
    phoneno1 varchar(50),
    phoneno2 varchar(50),
    email varchar(50),
    facebookLink varchar(50),
    instagramLink varchar(50),
    twitterLink varchar(50),
    mapLink varchar(50)
)";

if($conn->query($contactTbl)===true){
    echo "contact table created successfully<br>";
}
else{
    echo "contact table creation failed!!<br>";
}

// creating facilities table 
$facilityTbl = "CREATE TABLE facilities(
    pic varchar(200),
    facilityName varchar(200),
    aboutFaciity varchar(200)
)";

if($conn->query($facilityTbl)===true){
    echo "facilities table created successfully<br>";
}
else{
    echo "facilities table creation failed!!<br>";
}

// creating features table 
$featureTbl = "CREATE TABLE features(
    pic varchar(200),
    featureName varchar(200),
    aboutFeature varchar(200)
)";

if($conn->query($featureTbl)===true){
    echo "features table created successfully<br>";
}
else{
    echo "features table creation failed!!<br>";
}

//creating general settings table
$generalSettingsTbl = "CREATE TABLE general_settings(
    hotel_name varchar(200),
    about_hotel varchar(200)
)";

if($conn->query($generalSettingsTbl)===true){
    echo "general settings table created successfully<br>";
}
else{
    echo"general settings table creation failed!!<br>";
}

//creating rooms table
$roomTbl = "CREATE TABLE rooms(
    roomId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    imagePath varchar(200),
    roomType varchar(200),
    roomDesc varchar(200),
    status varchar(200),
    roomPrice int(10),
    roomFeatures varchar(200),
    roomFacilities varchar(200),
    photo1 varchar(200),
    photo2 varchar(200),
    photo3 varchar(200),
    photo4 varchar(200),
    detailedInfo varchar(500)
)";

if($conn->query($roomTbl)===true){
    echo "rooms table created successfully<br>";
}
else{
    echo "rooms table creation failed<br>";
}

//creain team members table
$teamMembersTbl = "CREATE TABLE team_members(
    member_name varchar(200),
    member_position varchar(200),
    photo_path varchar(200)
)";

if($conn->query($teamMembersTbl)===true){
    echo "team members table created successfully<br>";
}
else{
    echo "team members table creation failed<br>";
}

//creating users table
$userTbl = "CREATE TABLE users(
    UID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName varchar(200),
    lastName varchar(200),
    gender varchar(200),
    address varchar(200),
    contact varchar(200),
    email varchar(200),
    username varchar(200),
    password varchar(200)
)";

if($conn->query($userTbl)===true){
    echo "user table created successfully<br>";
}
else{
    echo "user table creation failed";
}