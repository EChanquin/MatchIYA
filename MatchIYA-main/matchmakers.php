<HTML>

    <head>
    	<title>MatchMakers</title>
		
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width"/>
		
        <link href="./assets/css/global.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
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

    <?php include 'includes/navbar.php'; ?>

    <div style="align-items: center; padding-top: 100px; padding-bottom: 10%;">
        <h2 style="text-align: center; margin-bottom: 0px; padding-bottom: 0px;"><em>Meet the</em></h2>
        <div style="text-align: center;">
         <img style="align-items: center; padding-top: 0px; margin-top: -1%;" width="60%px" src="assets/images/MatchMakersLogo.png">
        </div>
    </div>

	<div class="headshot" style="margin-top: -2%; margin-left: auto; margin-right: auto; margin-bottom: 15%; align-content: center; text-align: center;">
		<img src="assets/images/headshots.png" style="width: 75%;">
	</div>
      
	
      <h2 style="text-align: center;"><em>Frequently Asked</em><span style="font-family: sans-serif;">QUESTIONS</span></h2>
      <br>
      <br>
	
	<div class="FAQ" style="margin-left: 7%;">
		<details>
        <summary style="font-weight: 500">&emsp;Why did you make MatchIYA?</summary>
            <div id="answer">
                We just love chaos. Plain and simple
            </div>
      </details>
      <br>
      <details>
        <summary style="font-weight: 500">&emsp;Who made MatchIYA?</summary>
            <div id="answer">
                Look up at the photos you idiot.
            </div>
      </details>
      <br>
      <details>
        <summary style="font-weight: 500">&emsp;How does Match IYA work?</summary>
            <div id="answer">
                MatchIYA uses a unique algorithm to match you with individuals from the Iovine and Young Academy based on your interests, goals, and aspirations.
            </div>
      </details>
      <br>
      <details>
        <summary style="font-weight: 500">&emsp;Is MatchIYA exclusively for dating?</summary>
            <div id="answer">
                No, MatchIYA offers connections for dating, professional networking, and friendship, ensuring a diverse array of opportunities.
            </div>
      </details>
      <br>
      <details>
        <summary style="font-weight: 500">&emsp;Is MatchIYA Anonymous?</summary>
            <div id="answer">
                Yes! We believe that in order to emphasize matchmaking based on interests, goals, and aspirations, physical attraction and bias based on previous interactions should be taken out of the equation. Your matches’ identity and picture will be revealed once both users swipe right!
            </div>
      </details>
      <br>
      <details>
        <summary style="font-weight: 500">&emsp;How is MatchIYA different from other dating sites?</summary>
            <div id="answer">
                First of all, it's exclusive to IYA students. Second, MatchIYA is more than just a dating site, offering students the ability to find business partners, mentors, or just friends that share similar interests and goals in career, life, and everything in between, whereas dating apps are often based solely on physical attraction, age, and proximity.
            </div>
      </details>
      <br>
      <details>
        <summary style="font-weight: 500">&emsp;How do I make my MatchIYA profile attractive?</summary>
            <div id="answer">
                Our first recommendation is to be your authentic self. Even though it may seem better to show your best self, we believe fabricated personalities only lead to complicated and difficult relationships in romantic, platonic, and even in business contexts.
            </div>
      </details>
      <br>
      <details>
        <summary style="font-weight: 500">&emsp;How can I contact MatchIYA?</summary>
            <div id="answer">
                You can reach us at @MatchIYA on instagram for any inquiries or assistance.            
            </div>
      </details>
	</div>
      
	<br> <br> <br>
	
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
</HTML>