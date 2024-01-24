<html>


    <head>
        <title>MatchIYA Admin Edit Search</title>
        <link href="assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            margin:5%;
        }
        .button{
        padding-bottom:5%;
    }
    </style>
    </head>
    <body> 
   <center> <?php
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
        ?>
        <h2>Search for a User:</h2>
    <form
        action = "match2-admin-result.php"
        method = "get">
        
        <label for="email"> Email: </label> <input type="text" name= "email"> 
        <br>
       
    <br>
  <input type="submit" class="button">
</form> 
    
    </body> 
    </html>
    