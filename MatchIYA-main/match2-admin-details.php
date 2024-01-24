<!DOCTYPE html>
<html>
<head>
     <link href="assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
        margin:5%;
    }
    .basic{
        display: flex;
        width:80%;
       /* background-color:rgba(248 36 40/ 20%);*/
       /*color:#F82428;*/
       /*border-radius: 10%;*/
       /*padding:5%;*/
    }
    .info{
         background-color:rgba(248 36 40/ 20%);
       color:#F82428;
       border-radius: 10%;
       padding:5%;
    }
    .column1{
        flex: 100%;
    }
    #long{
        /*float:left;*/
        display:block;
        text-align: center;
        width:80%;
    }
    .data{
        color: #28001E;
    }
    
    </style>
</head>
<body>
<?php
echo "<div class= data>";
var_dump($_REQUEST);
if(empty($_REQUEST['pk'])) {
    echo "class left empty- Please go through search page. (or redirect)";
//    header('Location: 5.2a-schedule-search.php');
    exit();
}

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


echo $_REQUEST["pk"];
$sql = "SELECT * FROM user WHERE id = " . $_REQUEST["pk"];
echo  "<br>"."This is what is being submitted into your database:" . "<br>". $sql; 
echo "</div class= data>";

$results = $mysql->query($sql);


while ($currentrow = $results->fetch_assoc()) {
    echo "<center>";
    
    echo "<div class=info>";
    echo '<img src="assets/images/FlyingCupid.png" style="margin:auto; width: 40%;">'. "<br>". "<br>";
    echo "<h2>User Info: ".$currentrow["email"] . "</h2><br>";
    echo "<div class=basic>";
   
    echo "<div class=column1>";
    echo "<strong>Email:</strong><br> " . $currentrow["email"] . "<br><br>";
    echo "<strong>Phone:</strong><br> " . $currentrow["phone"] . "<br><br>";
  echo "<strong>Password:</strong><br> " . $currentrow["password"] . "<br><br>";
    // echo "<h3>User Info</h3>" . "<br>";
    echo "<strong>Cohort:</strong> <br>" . $currentrow["cohort_id"] . "<br><br>";
    echo "</div class=column>";
    echo "<div class=column1>";
    echo "<strong>Preference:</strong><br> " . $currentrow["preference_id"] . "<br><br>";
    
    echo "<strong>Gender: </strong><br>" . $currentrow["gender_id"] . "<br><br>";
    echo "<strong>Sexuality: </strong><br>" . $currentrow["sexuality_id"] . "<br><br>";
    // echo "<strong>Ethnicity:</strong> <br>" . $currentrow["ethnicity_id"] . "<br><br>";
    
    echo "</div class=column>";
    echo "</div class=basic>";
    
    echo "<br>"."<h2>Match Questions</h2> " . "<br><br>";
    echo "<div class=basic>"; 
    echo "<div class=column1>";
    echo "<h3>Pick 9</h3> " . "<br><br>";
    echo "<strong>I want to share  with someone:</strong> <br>" . $currentrow["activity_id"] . "<br><br>";
    echo "<strong>Admired Celebrities:</strong><br> " . $currentrow["admire_id"] . "<br><br>";
    echo "<strong>Favorite Software:</strong><br> " . $currentrow["	software_id"] . "<br><br>";
    echo "<strong>Favorite Professors:</strong><br> " . $currentrow["professor_id"] . "<br><br>";
    echo "<strong>Iya Interests:</strong> <br>" . $currentrow["interest_id"] . "<br><br>";
  echo "</div class=column1>";
  
  
  echo "<div class=column1>";
   echo "<h3>Pick 2</h3> " . "<br><br>";
    echo "<strong>Barbie or Oppenheimer:</strong> <br>" . $currentrow["barboppo_id"] . "<br><br>";
    echo "<strong>Front or Back Door (IYA):</strong> <br>" . $currentrow["door_id"] . "<br><br>";
    echo "<strong>Chocolate or Vanilla (icecream):</strong> <br>" . $currentrow["icecream_id"] . "<br><br>";
    echo "<strong>Kanye West or Taylor Swift:</strong><br> " . $currentrow["kort_id"] . "<br><br>";
    echo "<strong>Did the glove fit:</strong><br> " . $currentrow["oj_id"] . "<br><br>";
    echo "<strong>Milk or Cereal:</strong> <br>" . $currentrow["first_id"] . "<br><br>";
    echo "<strong>Over or Under (Toilet Paper):</strong> <br>" . $currentrow["toilet_id"] . "<br><br>";
    echo "<strong>Top or Bottom (floor): </strong><br>" . $currentrow["tob_id"] . "<br><br>";
    echo "<strong>Is Match IYA a good idea: </strong><br>" . $currentrow["matchiya_id"] . "<br><br>";
    echo "</div class=column1>";
     echo "</div class=basic>";
    
     echo "<h2>Long Answer:</h2><br>"; 
    echo "<div id=long>";
    echo "<strong>Tell us a Joke: </strong><br>" . $currentrow["joke_id"] . "<br><br>";
    echo "<strong>What is your Roman Empire: </strong><br>" . $currentrow["romanemp_id"] . "<br><br>";
    echo "<strong>Dean Rikakis is a:</strong> <br>" . $currentrow["deank_id"] . "<br><br>";
    echo "<strong>What should we do with the third floor: </strong><br>" . $currentrow["iyafloor_id"] . "<br><br>";
    echo "</div>";
    
    echo "</div class=info>";
     echo "</center>";
  
    
}

/*if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}*/
?>

<a href="admin_frontpage.php">
                    <div class="button"> ADMIN HOME </div>
                 </a> 
</body>
</html>