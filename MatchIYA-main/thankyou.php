<?php

$mysqli = new mysqli("webdev.iyaserver.com", "chanquin", "AcadDev_Chanquin_5742321970", "chanquin_Match_IYA");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cohortId = $mysqli->real_escape_string($_POST['cohort']);
    $genderId = $mysqli->real_escape_string($_POST['gender']);
    $sexualityId = $mysqli->real_escape_string($_POST['sexuality']);
    $preferenceId = $mysqli->real_escape_string($_POST['preference']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Prepare INSERT statement
    $insertQuery = "INSERT INTO user (email, password, phone, cohort_id, gender_id, sexuality_id, preference_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $mysqli->prepare($insertQuery);
    $insertStmt->bind_param("sssssss", $email, $hashed_password, $phone, $cohortId, $genderId, $sexualityId, $preferenceId);
    
    $insertStmt->execute();
    if ($insertStmt->error) {
        echo "Insert error: " . $insertStmt->error;
        exit;
    } else {
        $userId = $mysqli->insert_id;

        // Insert interests
        if (isset($_POST['interests'])) {
            foreach ($_POST['interests'] as $interestId) {
                $interestIdSanitized = $mysqli->real_escape_string($interestId);
                $interestInsertQuery = "INSERT INTO user_interests (user_id, interest_id) VALUES ($userId, $interestIdSanitized)";
                if (!$mysqli->query($interestInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        // Insert professors
        if (isset($_POST['professors'])) {
            foreach ($_POST['professors'] as $professorId) {
                $professorIdSanitized = $mysqli->real_escape_string($professorId);
                $professorInsertQuery = "INSERT INTO user_professors (user_id, professor_id) VALUES ($userId, $professorIdSanitized)";
                if (!$mysqli->query($professorInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        // Insert activities
        if (isset($_POST['activities'])) {
            foreach ($_POST['activities'] as $activityId) {
                $activityIdSanitized = $mysqli->real_escape_string($activityId);
                $activityInsertQuery = "INSERT INTO user_activities (user_id, activity_id) VALUES ($userId, $activityIdSanitized)";
                if (!$mysqli->query($activityInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        // Insert admires
        if (isset($_POST['admires'])) {
            foreach ($_POST['admires'] as $admireId) {
                $admireIdSanitized = $mysqli->real_escape_string($admireId);
                $admireInsertQuery = "INSERT INTO user_admires (user_id, admire_id) VALUES ($userId, $admireIdSanitized)";
                if (!$mysqli->query($admireInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        // Insert softwares
        if (isset($_POST['softwares'])) {
            foreach ($_POST['softwares'] as $softwareId) {
                $softwareIdSanitized = $mysqli->real_escape_string($softwareId);
                $softwareInsertQuery = "INSERT INTO user_softwares (user_id, software_id) VALUES ($userId, $softwareIdSanitized)";
                if (!$mysqli->query($softwareInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['barboppo'])) {
            foreach ($_POST['barboppo'] as $barboppoId) {
                $barboppoIdSanitized = $mysqli->real_escape_string($barboppoId);
                $barboppoInsertQuery = "INSERT INTO user_barboppo (user_id, barboppo_id) VALUES ($userId, $barboppoIdSanitized)";
                if (!$mysqli->query($barboppoInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }
        if (isset($_POST['door'])) {
            foreach ($_POST['door'] as $doorId) {
                $doorIdSanitized = $mysqli->real_escape_string($doorId);
                $doorInsertQuery = "INSERT INTO user_door (user_id, door_id) VALUES ($userId, $doorIdSanitized)";
                if (!$mysqli->query($doorInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['icecream'])) {
            foreach ($_POST['icecream'] as $icecreamId) {
                $icecreamIdSanitized = $mysqli->real_escape_string($icecreamId);
                $icecreamInsertQuery = "INSERT INTO user_icecream (user_id, icecream_id) VALUES ($userId, $icecreamIdSanitized)";
                if (!$mysqli->query($icecreamInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['celebchoice'])) {
            foreach ($_POST['celebchoice'] as $celebchoiceId) {
                $celebchoiceIdSanitized = $mysqli->real_escape_string($celebchoiceId);
                $celebchoiceInsertQuery = "INSERT INTO user_celebchoice (user_id, celebchoice_id) VALUES ($userId, $celebchoiceIdSanitized)";
                if (!$mysqli->query($celebchoiceInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['matchiya'])) {
            foreach ($_POST['matchiya'] as $matchiyaId) {
                $matchiyaIdSanitized = $mysqli->real_escape_string($matchiyaId);
                $matchiyaInsertQuery = "INSERT INTO user_matchiya (user_id, matchiya_id) VALUES ($userId, $matchiyaIdSanitized)";
                if (!$mysqli->query($matchiyaInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['milkorcereal'])) {
            foreach ($_POST['milkorcereal'] as $milkorcerealId) {
                $milkorcerealIdSanitized = $mysqli->real_escape_string($milkorcerealId);
                $milkorcerealInsertQuery = "INSERT INTO user_first (user_id, first_id) VALUES ($userId, $milkorcerealIdSanitized)";
                if (!$mysqli->query($milkorcerealInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['oj'])) {
            foreach ($_POST['oj'] as $ojId) {
                $ojIdSanitized = $mysqli->real_escape_string($ojId);
                $ojInsertQuery = "INSERT INTO user_oj (user_id, oj_id) VALUES ($userId, $ojIdSanitized)";
                if (!$mysqli->query($ojInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['toilet'])) {
            foreach ($_POST['toilet'] as $toiletId) {
                $toiletIdSanitized = $mysqli->real_escape_string($toiletId);
                $toiletInsertQuery = "INSERT INTO user_toilet (user_id, toilet_id) VALUES ($userId, $toiletIdSanitized)";
                if (!$mysqli->query($toiletInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }

        if (isset($_POST['toporbottom'])) {
            foreach ($_POST['toporbottom'] as $tobId) {
                $tobIdSanitized = $mysqli->real_escape_string($tobId);
                $toporbottomInsertQuery = "INSERT INTO user_toporbottom (user_id, tob_id) VALUES ($userId, $tobIdSanitized)";
                if (!$mysqli->query($toporbottomInsertQuery)) {
                    echo "Error: " . $mysqli->error;
                }
            }
        }
    }

    if (!empty($_REQUEST["email"])) {
        $message = "Match IYA Responses\r";
        $message .= "--------------------------------\r";
        $message .= "When we tell you, go to the <a href";
        $message .= "discover.php";
        $message .= "Your Phone number: ";
        $message .= $_REQUEST["phone"];
    
        // email $message as body of message. Use $_REQUEST["email"] as "to"
        mail($_REQUEST["email"], "Your MatchIYA Response", $message);
    }

   
}

?>

<HTML>
<head>
    <title>Thank You</title>
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
    <h2 style="text-align: center; margin-top: 100px;"><em>You're registered! Check your email for updates soon</em></h2>
    <p style="text-align: center;">Email confirmation sent to <?php echo $email; ?></p> 

    <br>
    <img src="assets/images/TransitionScreen1.gif" style="width: 800px; margin-left: 10%; width: 80%;">
    <br>
    <?php include 'includes/footer.php';?>
    <?php



    ?>
</body>
</HTML>
