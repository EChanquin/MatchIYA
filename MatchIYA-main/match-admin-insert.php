<html>
<head>
    <link href="assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MatchIYA Admin Insert</title>
    <style>
     body{
            margin:5%;
        }
        
        .info{
        background-color:rgba(248 36 40/ 20%);
       color:#F82428;
       border-radius:20%;
       padding:5%;
       text-align:center;
    }
    .button{
        padding-bottom:5%;
    }
    </style>
</head>
<body>
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

if($mysql->connect_errno) {
echo "db connection error : " . $mysql->connect_error;
exit();
}

// if(empty(trim($_REQUEST['class']))) {
//     echo "You must enter a class.";
//     exit();
// }

// echo "Output all form variables:<br>";
// var_dump($_REQUEST);
// echo "<hr>";
?>
<div class="info">
<img src="assets/images/FlyingCupid.png" style="margin:auto; width: 40%;"><br><br>

<h2>Add User to Database:</h2>
<form action="match-admin-meeting-add.php">
    
    Email: <input type="text" name="email">
    <br>
    Phone: <input type="text" name="phone">
    <br>
    
   Cohort: <select name="cohort">
        <?php

        $sql = "SELECT * FROM cohorts";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['cohort_id'] . "'>" . $currentrow['cohort'] . "</option>";
        }
        ?>
        <select>
    <br>
    
     <!-- Ethnicity: <select name="ethnicity">
        <?php

        // $sql = "SELECT * FROM ethnicities";

        // $results = $mysql->query($sql);

        // if(!$results) {
        //     echo "SQL problem: " .
        //         $mysql->error ;
        //     exit();
        // }

        // while($currentrow = $results->fetch_assoc()) {
        //     echo "<option value='" . $currentrow['ethnicity_id'] . "'>" . $currentrow['ethnicity'] . "</option>";
        // }
        ?>
        <select>
    <br> -->
    
    Gender: <select name="gender">
        <?php

        $sql = "SELECT * FROM genders";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['gender_id'] . "'>" . $currentrow['gender'] . "</option>";
        }
        ?>
        <select>
    <br>
    
  Sexuality: <select name="sexuality">
        <?php

        $sql = "SELECT * FROM sexualities";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['sexuality_id'] . "'>" . $currentrow['sexuality'] . "</option>";
        }
        ?>
        <select>
    <br>
    
    Preference: <select name="preference">
        <?php

        $sql = "SELECT * FROM preferences";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['preference_id'] . "'>" . $currentrow['preference'] . "</option>";
        }
        ?>
        <select>
    <br>
    
    <!--Nationality: <select name="nationality">-->
       <?php

    // <!--    $sql = "SELECT * FROM nationalities";-->

    // <!--    $results = $mysql->query($sql);-->

    // <!--    if(!$results) {-->
    // <!--        echo "SQL problem: " .-->
    // <!--            $mysql->error ;-->
    // <!--        exit();-->
    // <!--    }-->

    //   while($currentrow = $results->fetch_assoc()) {-->
    //         echo "<option value='" . $currentrow['nationality_id'] . "'>" . $currentrow['nationality'] . "</option>";-->
    //   }
     ?>
    <!--    <select>-->
    <br>
    
    <input type="submit" class="button">
    
</form>
</div class="info">
<br>
</body>
</html>