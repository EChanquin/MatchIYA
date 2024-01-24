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
exit("STOPPING PAGE.");
}


// if(empty(trim($_REQUEST['first']))) {
//     echo "You must enter a first name.";
//     exit();
// }

// if(empty(trim($_REQUEST['last']))) {
//     echo "You must enter a last name.";
//     exit();
// }

if(empty(trim($_REQUEST['email']))) {
    echo "You must enter an email.";
    exit();
}

if(empty(trim($_REQUEST['preference']))) {
    echo "You must enter a preference.";
    exit();
}
echo "<div class=info>";
echo '<img src="assets/images/FlyingCupid.png" style="margin:auto; width: 40%;">'. "<br>". "<br>";
print_r($_REQUEST)."<br><br>";

$sql =  "  INSERT INTO user " .
    "    ( email, phone, cohort_id, gender_id, sexuality_id, preference_id, password) " . 
    "    VALUES  ( ". 
    "
     '". $_REQUEST['email'] ."' ,
     '". $_REQUEST['phone'] ."' ,
     '". $_REQUEST['cohort'] ."' ,
     '". $_REQUEST['gender'] ."' ,
     '". $_REQUEST['sexuality'] ."' ,
     '". $_REQUEST['preference'] ."',
     '". NULL ."'
    ) 
     ";
     
$results = $mysql->query($sql);



if(!$results) {
    echo "ERROR! FORM info " . print_r($_REQUEST) . "<hr>";
    echo "SQL: " . $sql . "<hr>";
    echo "db error: " . $mysqli->error;
    exit();
}

echo "</br>";

echo "New basics info " . " for user " . $_REQUEST['email'] . " was added! " .
     " The new record has the ID/PK of " . 
     $mysql->insert_id;
$searchQuery = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
echo"<br>";

echo '<a href="match-admin-insert.php?q=' . urlencode($searchQuery) . '">Back to Search Page</a>';

echo "</div class=info>";


?>

<a href="admin_frontpage.php">
                    <div class="button"> ADMIN HOME </div>
                 </a> 


</body>
</html>