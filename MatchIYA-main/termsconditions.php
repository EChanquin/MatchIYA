<HTML>
<head>
    <title>Terms & Conditions</title>
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
        <br>
    <h2 style="text-align: center; margin-top: 100px;"><em>Terms and Conditions</em></h2>
    <br>
        <div id="form" style="padding-top: 20px;  width: 50%; margin-left: 5%; margin-right: 5%; margin: auto;">
            <p>
                Welcome to MatchIYA, a platform designed to connect people based on shared interests and compatibility. Before you begin using our services, please carefully read and understand the following Terms and Conditions. By accessing or using our app, you agree to be bound by these terms.
                 
                <br><br>
                <strong>1. User Agreement</strong>
                <br><br>
                By using MatchIYA, you affirm that you are at least 18 years old and have the legal capacity to enter into this agreement.
                <br><br>
                <strong>2. Privacy and Data Handling</strong>
                <br><br>
                a. MatchIYA facilitates connections by sharing users' phone numbers with their mutual matches. Users are responsible for the information they choose to share and should exercise caution when exchanging contact details.
                <br><br>
                b. To enhance compatibility matching, MatchIYA collects and saves users' personality quiz answers. This data is used solely for the purpose of improving match accuracy and is treated with the utmost confidentiality.
                <br><br>
                <strong>3. User Responsibilities</strong>
                <br><br>
                a. Users are responsible for providing accurate and up-to-date information on their profiles. MatchIYA is not liable for any consequences resulting from inaccurate or misleading user information.
                <br><br>
                b. Users agree to treat others with respect and courtesy. Any form of harassment, offensive behavior, or violation of another user's rights will result in immediate account suspension.
                <br><br>
                <strong>4. Safety Guidelines</strong>
                <br><br>
                a. MatchIYA encourages users to exercise caution when meeting in person. Meet in public places, inform a friend about your plans, and prioritize your safety.
                <br><br>
                b. Users are encouraged to report any suspicious or inappropriate behavior to 911 for prompt investigation and action.
                <br><br>
                <strong>5. Intellectual Property</strong>
                <br><br>
                a.  Users retain ownership of their content (e.g., photos, profile information). By using the app, users grant MatchIYA a non-exclusive license to use, reproduce, and display their content for the purpose of providing the service.
                <br><br>
                <strong>6. Termination of Accounts</strong>
                <br><br>
                MatchIYA reserves the right to terminate or suspend user accounts for any reason, including but not limited to violations of these Terms and Conditions.
                <br><br>
                <strong>7. Modifications to Terms</strong>
                <br><br>
                MatchIYA reserves the right to update or modify these Terms and Conditions at any time. Users will be notified of any significant changes.
                <br><br>
                <strong>8. Disclaimer of Warranty</strong>
                <br><br>
                MatchIYA provides its services "as is" without any warranty or guarantee. Users acknowledge and accept the inherent risks associated with online dating.
                <br><br>
                <strong>9. Governing Law</strong>
                <br><br>
                These Terms and Conditions are governed by the laws of California. Any disputes arising from or relating to these terms will be subject to the exclusive jurisdiction of the courts in California.
                <br><br>
                By using MatchIYA, you acknowledge that you have read, understood, and agreed to these Terms and Conditions. If you do not agree with any part of these terms, please do not use the app.
                <br><br>
                10. Communication Policies
                <br><br>
                a. Email Communications: By using MatchIYA, users consent to receive emails from MatchIYA for various purposes including, but not limited to, announcements, updates, and reviews of user activities or responses on the platform.
                <br><br>
                i. Users must certify that the email address provided is valid and that they have access to it.
                <br><br>
                ii. MatchIYA will send periodic emails to keep users informed about any changes to the 
                platform, promotional offers, and to provide personalized feedback or summaries of their        
                activities and interactions.
                <br><br>
                b. Review and Feedback Emails: Periodically, MatchIYA may send emails requesting users to review their experience on the platform. These reviews help us to improve our services and user experience.
                <br><br>
                c. User Consent: By accepting these Terms and Conditions, users specifically agree to receive such emails and acknowledge that these communications are part of the service offered by MatchIYA.
                <br><br>
                MatchIYA wishes you a pleasant and successful matching experience!

            </p>
        </div>


    <?php include 'includes/footer.php'; ?>
</body>
</HTML>
