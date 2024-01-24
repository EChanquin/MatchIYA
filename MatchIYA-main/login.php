<?php
require_once 'init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hostname = "webdev.iyaserver.com";
    $username = "chanquin";
    $password = "AcadDev_Chanquin_5742321970";
    $dbname = "chanquin_Match_IYA";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM user WHERE phone = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set user ID in the session
            $_SESSION['user_id'] = $row['id'];  // Assuming 'id' is the column name in your 'user' table

            $mysqli->close(); 
            header("Location: discover.php");
            exit();
        } else {
            $_SESSION['error_message'] = 'Invalid password.';
        }
    } else {
        $_SESSION['error_message'] = 'No user found with that phone number.';
    }

    $mysqli->close();
}
?>


<HTML>
<head>
    <title>Login</title>
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

    <div id="form-container" style="margin-top: 0px">
        <div id="form">
            <h3 style="text-align: center; font-size: 20pt;"><b>Welcome Back <3</b></h3>
            <br>
            <form action="login.php" method="post">
                <input type="text" id="phone" name="phone" placeholder="Phone Number*" style="background-color: rgba(255, 255, 255, 0)"><br>
                <input type="password" id="password" name="password" placeholder="Password*" style="background-color: rgba(255, 255, 255, 0)"><br>
                <input id="formButton" type="submit" value="Login">
                <?php
                    if (isset($_SESSION['error_message'])) {
                        echo "<p>" . $_SESSION['error_message'] . "</p>";
                        unset($_SESSION['error_message']);
                    }
                ?>
            </form>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</HTML>
