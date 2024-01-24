<HTML>
    <head>
		<title>Admin Frontpage</title>
		
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width"/>
		
        <link href="./assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        body{
            margin:5%;
        }
        .footer{
            margin-top:75%;
        }
        .h2{
            font-size:50%;
        }
        .flex{
            margin-top:2%;
            display:flex;
            flex-direction:column;
        }
        .button{
            margin: 5%;
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RY0YMZZN3C"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RY0YMZZN3C');
    </script>
	
	<body class="light-mode">
        <button id="toggle-mode" class="lampbutton"><img src="assets/images/cupid.png" class="switch"></button>
        
        <script>
          const toggle = document.getElementById("toggle-mode");
          const body = document.body;
    
          const setMode = mode => {
            body.className = mode;
            localStorage.setItem("mode", mode);
          };
    
          const toggleMode = () => {
            if (body.classList.contains("light-mode")) {
              setMode("dark-mode");
            } else {
              setMode("light-mode");
            }
          };
    
          toggle.addEventListener("click", toggleMode);
    
          const currentMode = localStorage.getItem("mode") || "light-mode";
          setMode(currentMode);
        </script>

        <!--<?php include 'includes/navbar.php'; ?>-->

        <div style="height: 85vh; width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <h2 style="text-align: center; transform: translateY(0.8rem);"><em>Welcome to</em></h2>
                <div style="text-align: center;" class="logo";>
                    <img width="40%" src="assets/images/MatchIYALogo.png">
                </div>
                <br>
               <h2>Admin</h2></div>
               <br>
        <img src="assets/images/arrowLong.png" style="width: 80%">
                <div class="flex">
                <a href="match-admin-insert.php"> 
                    <div class="button">INSERT USER</div>
                </a> 
                <a href="match2-admin-search.php"> 
                    <div class="button">EDIT USER</div>
                </a> 
                <a href="frontpage.php"> 
                    <div class="button">HOME PAGE</div>
                </a> 
                </div>

                   
            </div>
<<<<<<< HEAD
                <div id="form" style="width: 50%;">
=======
		<div id="form" style="width: 50%;">
>>>>>>> 1611cd75586d578d348ed861e4721669f7e4d103
                    <img src="assets/images/UserEngagementTracker.jpeg"; style="width: 100%;">
                 </div>
                 <br>
                 <div id="form" style="width: 50%;">
                    <img src="assets/images/ViewsPerPage.jpeg"; style="width: 100%;">
                 </div>

   <!--         <a href="#learnMore" style="text-align: center; position: absolute; bottom: 5vh;">-->
   <!--             <div>Learn More</div>-->
   <!--             <i class="fa fa-angle-down" style="font-size: 18px;color:red;"></i>-->
   <!--         </a>-->
   <!--     </div>-->

   <!--     <br><br><br><br>-->
        
   <!--     <div id="learnMore" style="display: flex; flex-direction: column; gap: 4vw; padding: 4vw 8vw 8vw 8vw;">-->
			
			<!--<div>-->
				
			<!--	<div style="display: flex; flex-direction: column; width: 100%; justify-content: center;">-->
			<!--		<h2 class="space"><em>Meet your match...<br>no not like that.</em></h2> <br>-->
			<!--		<p class="text1">Welcome to MatchIYA, your premier platform for networking and friendship connections with a unique twist - we connect you with like-minded individuals from the prestigious Iovine and Young Academy. -->
			<!--		</p>-->
                
			<!--	</div>-->
   <!--             <br>-->
			<!--	<div>-->
   <!--                 <div style="float: right; text-align: right;">-->
                    
   <!--                     <p class="text2" style="text-align: right;">We understand that compatibility goes beyond just shared interests; it's about shared dreams and aspirations. Our goal is to make meaningful connections for you, whether you're looking for a romantic partner, a mentor, a collaborator, or a friend who understands your journey.</p>-->
   <!--                     <a href="matchmakers.php" style="float: right">-->
   <!--                         <div class="button">Learn More</div>-->
			<!--		    </a>-->
                        
   <!--                 </div>-->
   <!--                 <div style="float: right; margin-right: 20%;">-->
   <!--                     <img src="assets/images/FlyingCupid.png" style="width: 300px;">-->
                        
   <!--                 </div>-->
                    

			
			<!--	</div>-->
			
			<!--</div>-->
            
            
   <!--     </div>-->
        
        <div class="footer" style="padding: 0vw 8vw 6vw 8vw;"><br>
            
            <img src="assets/images/arrowLong.png" style="width: 100%"><br>
            
            <div class="right">
                <br>
                <p style="text-align: right;">&#169; Match IYA 2023 <br>All Rights Reserved. </p>
            </div>

            <div class="left">
                <br><br>
                <a href="frontpage.php"><img src="assets/images/MatchIYALogo.png" width="150px"></a>
            </div>
        </div>
        
        <br><br>

        <script>
            function learnMore() {
                document.getElementById("learnMore").style.display = "block";
            }
        </script>
    </body>

</HTML>
