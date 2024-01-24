<?php
session_start();

if (!isset($_SESSION['phone'])) {
    header("Location: login.php");
    exit();
}

$mysqli = new mysqli("webdev.iyaserver.com", "chanquin", "AcadDev_Chanquin_5742321970", "chanquin_Match_IYA");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function getOptions($mysqli, $tableName, $columnName, $idColumnName = 'id') {
    $options = [];
    $result = $mysqli->query("SELECT * FROM " . $tableName);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            if (isset($row[$idColumnName])) {
                $options[$row[$idColumnName]] = $row[$columnName];
            }
        }
    }
    return $options;
}


$cohorts = getOptions($mysqli, "cohorts", "cohort", "cohort_id");
$genders = getOptions($mysqli, "genders", "gender", "gender_id");
$sexualities = getOptions($mysqli, "sexualities", "sexuality", "sexuality_id");
$preferences = getOptions($mysqli, "preferences", "preference", "preference_id");
$interests = getOptions($mysqli, "interests", "interest", "interest_id");
$professors = getOptions($mysqli, "professors", "professor", "professor_id");
$activities = getOptions($mysqli, "activities", "activity", "activity_id");
$preferences = getOptions($mysqli, "preferences", "preference", "preference_id");
$softwares = getOptions($mysqli, "softwares", "software", "software_id");
$admires = getOptions($mysqli, "admires", "admire", "admire_id");
$barboppo = getOptions($mysqli, "barboppo", "answer", "barboppo_id");
$deank = getOptions($mysqli, "deank", "answer", "deank_id");
$door = getOptions($mysqli, "door", "answer", "door_id");
$icecream = getOptions($mysqli, "ice cream", "answer", "icecream_id");
$iyafloor = getOptions($mysqli, "iyafloor", "answer", "iyafloor_id");
$joke = getOptions($mysqli, "joke", "answer", "joke_id");
$kanyeortaylor = getOptions($mysqli, "kanyeortaylor", "answer", "kort_id");
$matchiya = getOptions($mysqli, "matchiya", "answer", "matchiya_id");
$milkorcereal = getOptions($mysqli, "milkorcereal", "answer", "first_id");
$oj = getOptions($mysqli, "OJ", "answer", "oj_id");
$toilet = getOptions($mysqli, "toilet", "answer", "toilet_id");
$toporbottom = getOptions($mysqli, "toporbottom", "answer", "tob_id");
$romanemp = getOptions($mysqli, "romanemp", "answer", "romanemp_id");





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cohortId = $mysqli->real_escape_string($_POST['cohort']);
    $genderId = $mysqli->real_escape_string($_POST['gender']);
    $sexualityId = $mysqli->real_escape_string($_POST['sexuality']);
    $preferenceId = $mysqli->real_escape_string($_POST['preference']);

    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $password = $mysqli->real_escape_string($_POST['password']);


    $updateQuery = "UPDATE user SET email = '$email', password = '$password', phone = '$phone', cohort_id = '$cohortId', gender_id = '$genderId', sexuality_id = '$sexualityId', preference_id = '$preferenceId', WHERE phone = '".$_SESSION['phone']."'";
    $mysqli->query($updateQuery);

    $result = $mysqli->query("SELECT id FROM user WHERE phone = '".$_SESSION['phone']."'");
    $row = $result->fetch_assoc();
    $userId = $row['id'];


    if (isset($_POST['interests'])) {
        foreach ($_POST['interests'] as $interestId) {
            $interestInsertQuery = "INSERT INTO user_interests (user_id, interest_id) VALUES ($userId, $interestId)";
            $mysqli->query($interestInsertQuery);
        }
    }


    if (isset($_POST['professors'])) {
        foreach ($_POST['professors'] as $professorId) {
            $sportInsertQuery = "INSERT INTO user_professors (user_id, professor_id) VALUES ($userId, $professorId)";
            $mysqli->query($sportInsertQuery);
        }
    }


    if (isset($_POST['activities'])) {
        foreach ($_POST['activities'] as $activityId) {
            $foodInsertQuery = "INSERT INTO user_activities (user_id, activity_id) VALUES ($userId, $activityId)";
            $mysqli->query($foodInsertQuery);
        }
    }

    if (isset($_POST['admires'])) {
        foreach ($_POST['admires'] as $admireId) {
            $foodInsertQuery = "INSERT INTO user_admires (user_id, admire_id) VALUES ($userId, $admireId)";
            $mysqli->query($foodInsertQuery);
        }
    }


    if (isset($_POST['softwares'])) {
        foreach ($_POST['softwares'] as $softwareId) {
            $foodInsertQuery = "INSERT INTO user_softwares (user_id, software_id) VALUES ($userId, $softwareId)";
            $mysqli->query($foodInsertQuery);
        }
    }

    if (isset($_POST['barboppo'])) {
        foreach ($_POST['barboppo'] as $barboppoId) {
            $query = "INSERT INTO user_barboppo (user_id, barboppo_id) VALUES ($userId, $barboppoId)";
            $mysqli->query($query);
        }
    }


    if (isset($_POST['door'])) {
        foreach ($_POST['door'] as $doorId) {
            $query = "INSERT INTO user_door (user_id, door_id) VALUES ($userId, $doorId)";
            $mysqli->query($query);
        }
    }

    if (isset($_POST['icecream'])) {
        foreach ($_POST['icecream'] as $icecreamId) {
            $query = "INSERT INTO user_icecream (user_id, icecream_id) VALUES ($userId, $icecreamId)";
            $mysqli->query($query);
        }
    }




    if (isset($_POST['kanyeortaylor'])) {
        foreach ($_POST['kanyeortaylor'] as $kortId) {
            $query = "INSERT INTO user_kort (user_id, kort_id) VALUES ($userId, $kortId)";
            $mysqli->query($query);
        }
    }

    if (isset($_POST['matchiya'])) {
        foreach ($_POST['matchiya'] as $matchiyaId) {
            $query = "INSERT INTO user_matchiya (user_id, matchiya_id) VALUES ($userId, $matchiyaId)";
            $mysqli->query($query);
        }
    }

    if (isset($_POST['milkorcereal'])) {
        foreach ($_POST['milkorcereal'] as $milkorcerealId) {
            $query = "INSERT INTO user_first (user_id, first_id) VALUES ($userId, $milkorcerealId)";
            $mysqli->query($query);
        }
    }

    if (isset($_POST['oj'])) {
        foreach ($_POST['oj'] as $ojId) {
            $query = "INSERT INTO user_oj (user_id, oj_id) VALUES ($userId, $ojId)";
            $mysqli->query($query);
        }
    }

    if (isset($_POST['toilet'])) {
        foreach ($_POST['toilet'] as $toiletId) {
            $query = "INSERT INTO user_toilet (user_id, toilet_id) VALUES ($userId, $toiletId)";
            $mysqli->query($query);
        }
    }

    if (isset($_POST['toporbottom'])) {
        foreach ($_POST['toporbottom'] as $tobId) {
            $query = "INSERT INTO user_toporbottom (user_id, tob_id) VALUES ($userId, $tobId)";
            $mysqli->query($query);
        }
    }



    $mysqli->close();
    echo "Profile updated successfully.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
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
<body>
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

<form action="Quiz.php" method="POST" style="padding-top: 100px;">

    <div class="quiz-question" id="form" id="section1" style="width: 400px; margin: auto; text-align: center; margin-top: 50px;">
        <h3 style="text-align: center; font-size: 20pt;">Ready to meet your match?</h3>
        <br>


        <input type="text" id="email" name="email" placeholder="Email*" required><br>
        <input type="text" id="phone" name="phone" placeholder="Phone*" required><br>
        <input type="text" id="password" name="password" placeholder="Password*" required><br>
        <button type="button" class="navigation-button" id="next" onclick="nextSection()" style="width: 100%; margin-left: 0px; border-radius: 10px;">Join Now</button>

        <span style="font-size: 12pt">

        By clicking "Join Now", you agree to MatchIYA's 
        <br>
        <a href="termsconditions.php" target=”_blank”><u><strong>Terms of Service</strong></u></a>
        <br><br>
        Already have an account? <a href="login.php"><u><strong>Login</strong></u></a>
        
        </span>
        <br>
    </div>

    <div class="quiz-question" id="form" id="section1" style="width: 400px; margin: auto; text-align: center; margin-top: 50px">
        <h3 style="text-align: center; font-size: 20pt;">About you...</h3>
        <br>

        <label for="cohort">Cohort:</label>
        <select id="cohort" name="cohort">
            <?php foreach ($cohorts as $id => $cohort): ?>
                <option value="<?php echo $id; ?>"><?php echo $cohort; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <?php foreach ($genders as $id => $gender): ?>
                <option value="<?php echo $id; ?>"><?php echo $gender; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="sexuality">Sexuality:</label>
        <select id="sexuality" name="sexuality">
            <?php foreach ($sexualities as $id => $sexuality): ?>
                <option value="<?php echo $id; ?>"><?php echo $sexuality; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="preference">Type of Relationship:</label>
        <select id="preference" name="preference">
            <?php foreach ($preferences as $id => $preference): ?>
                <option value="<?php echo $id; ?>"><?php echo $preference; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
        <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
    </div>


    <div class="quiz-question" id="section2" style="display: none;">
        <h2 style="text-align: center;"><em>Select all your IYA interests</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($interests as $id => $interest): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="interests[]" value="<?php echo $id; ?>"><span><?php echo $interest; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
        </div>
    </div>


    <div class="quiz-question" id="section3" style="display: none;">
        <h2 style="text-align: center;"><em>Your Favorite Professors</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
        <?php foreach ($professors as $id => $professor): ?>
            <div id="ck-button">
            <label>
                <input type="checkbox" name="professors[]" value="<?php echo $id; ?>"><span><?php echo $professor; ?></span>
            </label>
            </div>
        <?php endforeach; ?>
            <br>
        <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
        <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
        </div>
    </div>

    <div class="quiz-question" id="section4" style="display: none;">
        <h2 style="text-align: center;"><em>Who do you Admire</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($admires as $id => $admire): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="admires[]" value="<?php echo $id; ?>"><span><?php echo $admire; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
        </div>
    </div>

    <div class="quiz-question" id="section5" style="display: none;">
        <h2 style="text-align: center;"><em>Your Favorite Software</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($softwares as $id => $software): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="softwares[]" value="<?php echo $id; ?>"><span><?php echo $software; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
        </div>
    </div>



    <div class="quiz-question" id="section6" style="display: none;">
        <h2 style="text-align: center;"><em>I want someone I can share ____ with</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
        <?php foreach ($activities as $id => $activity): ?>
            <div id="ck-button">
                <label>
                    <input type="checkbox" name="activities[]" value="<?php echo $id; ?>"><span><?php echo $activity; ?></span>
                </label>
            </div>
        <?php endforeach; ?>
        <br>
        <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
        <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
        <br>

        </div>
    </div>


    <div class="quiz-question" id="section7" style="display: none;">
        <h2 style="text-align: center;"><em>Barbie or Oppenheimer?</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($barboppo as $id => $option): ?>
                <div id="ck-button">
                    <label>
                        <input type="radio" name="barboppo[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
            <br>
        </div>
    </div>


    <div class="quiz-question" id="section8" style="display: none;">
        <h2 style="text-align: center;"><em>Chocolate or Vanilla? (Ice Cream)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($icecream as $id => $option): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="icecream[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section9" style="display: none;">
        <h2 style="text-align: center;"><em>Is Match IYA a good idea?</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($matchiya as $id => $option): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="matchiya[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section10" style="display: none;">
        <h2 style="text-align: center;"><em>Milk or Cereal First?</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($milkorcereal as $id => $option): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="milkorcereal[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
            <br>
        </div>
    </div>


    <div class="quiz-question" id="section11" style="display: none;">
        <h2 style="text-align: center;"><em>Did the glove fit? (OJ Simpson)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($oj as $id => $option): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="oj[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section12" style="display: none;">
        <h2 style="text-align: center;"><em>Over or Under? (Toilet Paper)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($toilet as $id => $option): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="toilet[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section13" style="display: none;">
        <h2 style="text-align: center;"><em>Top or bottom? (floor of IYA)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($toporbottom as $id => $option): ?>
                <div id="ck-button">
                    <label>
                        <input type="checkbox" name="toporbottom[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()">Next</button>
            <br>
        </div>
    </div>




    <div class="quiz-question" id="section14" style="display: none;">
        <h2 style="text-align: center;"><em>Short Answers (Pick any 3)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto; text-align: left;">
            <p>Dean Rikakis is a...</p>
            <input type="text" id="deank" name="deank" placeholder="Type here"><br>

            <p>Tell us a joke</p>
            <input type="text" id="joke" name="joke" placeholder="Type here"><br>

            <p>What is your Roman empire?</p>
            <input type="text" id="romanemp" name="romanemp" placeholder="Type here"><br>

            <p>What should the IYA 3rd floor be used for?</p>
            <input type="text" id="iyafloor" name="iyafloor" placeholder="Type here"><br>

            <input type="submit" id="formButton" value="Submit">
        </div>
    </div>

</form>

<script>
    let currentSection = 0;
    const sections = document.querySelectorAll('.quiz-question');

    function showSection(index) {
        sections.forEach((section, idx) => {
            section.style.display = idx === index ? 'block' : 'none';
        });
    }

    function nextSection() {
        currentSection = Math.min(sections.length - 1, currentSection + 1);
        showSection(currentSection);
    }

    function prevSection() {
        currentSection = Math.max(0, currentSection - 1);
        showSection(currentSection);
    }
    showSection(currentSection);

    function nextSection() {
        console.log("Current section (before):", currentSection);
        currentSection = Math.min(sections.length - 1, currentSection + 1);
        console.log("Next section (after):", currentSection);
        showSection(currentSection);
    }


</script>
</body>
</html>

