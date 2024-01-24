
<html>
<head>
     <link href="assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    
    body{
        margin: 5%;
    }
        
    .data{
        color: #28001E;
    }
    .basic{
        display: flex;
        width:90%;
        margin:auto;
    }
    .column1{
        flex: 50%;
        text-align:center;
    }
    .button{
        padding-bottom:5%;
        margin:auto;
    }
    #button{
        margin:auto;
    }
    </style>
</head>
<body>
<?php

echo $_REQUEST["id"];


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

if(empty($_REQUEST['pk'])) {
    echo "id left empty- Please go through search page";
//    header('Location: match2-admin-search.php');
    exit();
}

// echo "<div class=data";

echo $_REQUEST["pk"];

$sql = "SELECT * FROM user WHERE 1=1 AND 'pk' = " . $_REQUEST['pk'];
echo $sql. "<br><br>";

$results = $mysql->query($sql);

if(!$results) {
        echo "SQL error: ". $mysql->error;
        exit();
        }

// while($currentrow = $results->fetch_assoc()) {
// 
// Class: 
// <?php echo $_REQUEST['pk']; 
// <br>
// <?php
// } // end loop

// echo "</div class=data";
?>

<form action = "match2-admin-update.php">
    <input type= "hidden" name="pk" value="<?php echo $_REQUEST["pk"]; ?>">
<?php

$recorddata = $results->fetch_assoc();

?>

<br>
<h2> User Info: <?php echo $currentrow['email']; ?> </h2>

<strong>Email:</strong>
        <input type="text" name="email"
               value="<?php echo $recorddata['email']; ?> " 
               placeholder= "<?php echo $currentrow['email']; ?>">
               <br>
<strong>Phone(no dashes):</strong>
        <input type="text" name="phone"
               value="<?php echo $recorddata['phone']; ?>   ">
               <br>
               
 <strong>Password:</strong>
        <input type="text" name="password"
               value="<?php echo $recorddata['password']; ?>   ">
               <br>    
               
<div class="basic">
    
<div class="column1">
    
Cohort:    
    <select name="cohort">

<?php
    echo "<option value= '" . $recorddata["cohort_id"] . "'>" . $recorddata["cohort"] . "</option>";
  
    $sqlcohort = "SELECT * FROM cohorts";
echo $sqlcohort. "<br><br>"; 

$resultscohort = $mysql->query($sqlcohort);
    while($currentrow = $resultscohort->fetch_assoc()) {
        echo "<option value= '" . $currentrow["cohort_id"] . "'>". $currentrow["cohort"] . "</option>";
    }
?>    
</select>
<br>

Preference:
<select name="preference">

<?php
echo "<option value='" . $recorddata["preference_id"] . "'>" . $recorddata["preference"] . "</option>";

$sqlpreference = "SELECT * FROM preferences";
echo $sqlpreference. "<br><br>"; 

$resultpreference = $mysql->query($sqlpreference);
while($currentrow = $resultpreference->fetch_assoc()) {
    echo "<option value='" . $currentrow["preference_id"] . "'>". $currentrow["preference"] . "</option>";
}
?>    
</select>
<br>
</div class="column1">
<div class="column1">
    
Gender:    
    <select name="gender">

<?php
    echo "<option value= '" . $recorddata["gender_id"] . "'>" . $recorddata["gender"] . "</option>";
  
    $sqlgender = "SELECT * FROM genders";
echo $sqlgender. "<br><br>"; 

$resultsgender = $mysql->query($sqlgender);
    while($currentrow = $resultsgender->fetch_assoc()) {
        echo "<option value= '" . $currentrow["gender_id"] . "'>". $currentrow["gender"] . "</option>";
    }
?>    
</select>
<br>


Sexuality:    
    <select name="sexuality">

<?php
    echo "<option value= '" . $recorddata["sexuality_id"] . "'>" . $recorddata["sexuality"] . "</option>";
  
    $sqlsexuality = "SELECT * FROM sexualities";
echo $sqlsexuality. "<br><br>"; 

$resultssexuality = $mysql->query($sqlsexuality);
    while($currentrow = $resultssexuality->fetch_assoc()) {
        echo "<option value= '" . $currentrow["sexuality_id"] . "'>". $currentrow["sexuality"] . "</option>";
    }
?>    
</select>
<br>

<!-- Ethnicity:
<select name="ethnicity">

<?php
// echo "<option value='" . $recorddata["ethnicity_id"] . "'>" . $recorddata["ethnicity"] . "</option>";

// $sqlethnicity = "SELECT * FROM ethnicities";
// echo $sqlethnicity. "<br><br>"; 

// $resultsethnicity = $mysql->query($sqlethnicity);
// while ($currentrow = $resultsethnicity->fetch_assoc()) {
//     echo "<option value='" . $currentrow["ethnicity_id"] . "'>" . $currentrow["ethnicity"] . "</option>";
// }
?>    
</select> -->
<br>
</div class="column1">
</div class="basics">
<div id="button">
<input class="button" type= "submit" value = "Save User Profile Edits">
</div>

</form>
</body>
</html>