<html>
<head>
    <link href="assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            margin:5%;
        }
        
        hr{
            color:#F82428;
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
    exit();
}

// echo $_REQUEST["pk"];

if(empty($_REQUEST['pk'])) {
    echo "id left empty- Please go through search page. (or redirect)";
//    header('Location: match2-admin-search.php');
    exit();
}

$sql = "UPDATE user SET email = '" . $_REQUEST['email']  . 
"', password = '" . $_REQUEST['password'] . 
"', cohort_id ='" . $_REQUEST['cohort'] . 
"', preference_id ='" . $_REQUEST['preference'] . 
"', sexuality_id ='" . $_REQUEST['sexuality'] .  
// "', activity_id ='" . $_REQUEST['activity_id'] . 
// "', admire_id ='" . $_REQUEST['admire_id'] . 
// "', software_id ='" . $_REQUEST['software_id'] . 
// "', professor_id ='" . $_REQUEST['professor_id'] . 
// "',interest_id ='" . $_REQUEST['interest_id'] . 
// "', door_id ='" . $_REQUEST['door'] . 
// "', kort_id ='" . $_REQUEST['celebchoice'] . 
// "', icecream_id ='" . $_REQUEST['icecream'] . 
// "', oj_id ='" . $_REQUEST['oj'] . 
// "', first_id ='" . $_REQUEST['first'] . 
// "', matchiya_id ='" . $_REQUEST['matchiya'] . 
// "', toilet_id ='" . $_REQUEST['toilet'] . 
// "', tob_id ='" . $_REQUEST['tob'] . 
"', gender_id ='" . $_REQUEST['gender'] . "' " .
"WHERE 1=1 AND id = " . $_REQUEST['pk'];

echo "<div class=info>";
echo '<img src="assets/images/FlyingCupid.png" style="margin:auto; width: 40%;">'. "<br>". "<br>";
echo "This is what is sent to the database: <br>" . $sql;

$results = $mysql->query($sql);

if(!$results) {
        echo "SQL error: ". $mysql->error;
        exit();
        }

echo "<br><br>". "YAY! The user with an id of " . $_REQUEST['pk'] . " with the email " . $_REQUEST['email'] . " has been updated!" . "<br><br>";


$searchQuery = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';


echo '<a href="match2-admin-search.php?q=' . urlencode($searchQuery) . '">Back to Search Page</a>';
echo "</div class=info>";
?>



</body>
</html>