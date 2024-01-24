<!DOCTYPE html>
<html>
<head>
    <title> Match IYA Result</title>
     <link href="assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
        margin:5%;
    }
    
    .user{
        margin: auto;
        padding: auto;
    
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

    if ($mysql->connect_errno) {
        echo "db connection error : " . $mysql->connect_error;
        exit();
    }
    
    $sql = "SELECT * FROM user WHERE 1=1 " ;
        //" AND class LIKE '%" . $_REQUEST['class'] . "%'";
        
    if ($_REQUEST["email"] != "") {
        $sql .= " AND email  ='" . $_REQUEST["email"] . "'";
    }
//     if ($typesearch != "all") {
//         $sql .= " AND type = '" . $typesearch . "'";
//     }
//  if ($datesearch != "") {
//         $sql .= " AND date > '" . $datesearch . "'";
//     }

//     $sql .= " ORDER BY " . $sortorder;
    
    echo "This is what's being submitted into your database: <br /><br />  " . $sql . "<br>";
    

    $results = $mysql->query($sql);

    if(!$results) {
        echo "SQL error: ". $mysql->error;
        exit();
        }


    echo "<hr>";
    echo "I found " . $results->num_rows . " users <hr>";
    echo "Search Terms" . "<br><br>" . "Email: " . $_REQUEST["email"];
    echo "<br><br><hr>";

    while ($currentrow = $results->fetch_assoc()) {
    echo '<div id= "user">';
        echo '<img src="assets/images/FlyingCupid.png" style="float: left; width: 100px;">'.
            'Email: ' . $currentrow['email']. '<br>';
        echo 'Cohort: ' . $currentrow['cohort_id']. '<br>';
        echo 'Preference: ' . $currentrow['preference_id']. '<br>';
        echo '<br style="clear: both;">' ;
    
       
        echo "<div class='link'>" . 
        "<a href='match2-admin-details.php?pk=" .
        $currentrow["id"]."'>" .
        "View</a>". "</div>"  ;
        
        echo "<div class='link'>" . 
        "<a href='match2-admin-edit2.php?pk=" .
        $currentrow["id"]."'>" .
        "Edit </a>". "</div>"  ;

        echo "<p> PK: ".$currentrow["id"]."</p>";
		echo '</div>';
		
    }

    echo "<br>";
?>

<a href="admin_frontpage.php">
                    <div class="button"> ADMIN HOME </div>
                 </a> 
</body>
</html>
