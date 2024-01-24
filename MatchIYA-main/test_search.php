<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Users - MatchIYA</title>
    <link rel="stylesheet" href="./assets/css/global.css">
</head>
<body>
<div id="container">
    <h1>Search User Profiles</h1>
    <form action="test_results.php" method="GET">
        <input type="text" name="email" placeholder="Email...">
        <input type="text" name="interests" placeholder="Interests...">
        <input type="text" name="year" placeholder="Year...">
        <input type="text" name="birthdate" placeholder="Birthdate...">
        <input type="text" name="ethnicity" placeholder="Ethnicity...">
        <input type="text" name="gender" placeholder="Gender...">
        <input type="text" name="sexuality" placeholder="Sexuality...">
        <input type="text" name="phone_number" placeholder="Phone Number...">
        <input type="text" name="description" placeholder="Description...">
        <input type="text" name="instagram_handle" placeholder="Instagram...">
        <input type="text" name="goals" placeholder="Goals...">
        <input type="text" name="aspirations" placeholder="Aspirations...">
        <input type="submit" value="Search" name="search">
    </form>
</div>
</body>
</html>

<?php

$host = "webdev.iyaserver.com";
$userid = "chanquin";
$userpw = "AcadDev_Chanquin_5742321970";
$db = "chanquin_Match_IYA";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if ($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}