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
$search_result = [];


if (isset($_GET['search'])) {
    $sql = "SELECT * FROM users WHERE 1=1";

    foreach ($_GET as $key => $value) {
        if (!empty($value) && $key !== 'search') {
            $safe_value = $mysql->real_escape_string($value);
            $sql .= " AND `$key` LIKE '%$safe_value%'";
        }
    }

    $search_result = $mysql->query($sql);

    if (!$search_result) {
        echo "An error occurred: " . $mysql->error;
        $search_result = [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - MatchIYA</title>
    <link rel="stylesheet" href="./assets/css/global.css">

</head>
<body>
<div id="container">
    <h1>Search Results</h1>
    <?php if (!empty($search_result) && $search_result->num_rows > 0): ?>
        <div id="results">
            <?php while ($row = $search_result->fetch_assoc()): ?>
                <div class="result">
                    <?php
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Interests: " . $row['interests'] . "</p>";
                    echo "<p>Year: " . $row['year'] . "</p>";
                    echo "<p>Birthdate: " . $row['birthdate'] . "</p>";
                    echo "<p>Ethnicity: " . $row['ethnicity'] . "</p>";
                    echo "<p>Gender: " . $row['gender'] . "</p>";
                    echo "<p>Sexuality: " . $row['sexuality'] . "</p>";
                    echo "<p>Phone Number: " . $row['phone_number'] . "</p>";
                    echo "<p>Description: " . $row['description'] . "</p>";
                    echo "<p>Instagram: " . $row['instagram_handle'] . "</p>";
                    echo "<p>Goals: " . $row['goals'] . "</p>";
                    echo "<p>Aspirations: " . $row['aspirations'] . "</p>";
                    ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No results found. There is sadly no love for you in IYA ;-; .</p>
    <?php endif; ?>

</div>
</body>
</html>
