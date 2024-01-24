<?php
require_once 'init.php';

$mysqli = new mysqli("webdev.iyaserver.com", "chanquin", "AcadDev_Chanquin_5742321970", "chanquin_Match_IYA");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function getOptions($mysqli, $tableName, $columnName, $idColumnName = 'id') {
    $options = [];
    $result = $mysqli->query("SELECT " . $idColumnName . ", " . $columnName . " FROM " . $tableName);
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
$deank = getOptions($mysqli, "deank", "text", "deank_id");
$door = getOptions($mysqli, "door", "answer", "door_id");
$icecream = getOptions($mysqli, "ice_cream", "flavor", "icecream_id");
$iyafloor = getOptions($mysqli, "iyafloor", "text", "iyafloor_id");
$joke = getOptions($mysqli, "joke", "text", "joke_id");
$celebchoice = getOptions($mysqli, "celebchoice", "name", "celebchoice_id");
$matchiya = getOptions($mysqli, "matchiya", "answer", "matchiya_id");
$milkorcereal = getOptions($mysqli, "milkorcereal", "answer", "first_id");
$oj = getOptions($mysqli, "OJ", "answer", "oj_id");
$toilet = getOptions($mysqli, "toilet", "answer", "toilet_id");
$toporbottom = getOptions($mysqli, "toporbottom", "answer", "tob_id");
$romanemp = getOptions($mysqli, "romanemp", "text", "romanemp_id");

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

<form method="POST" style="padding-top: 100px;" action="thankyou.php">

    <div class="quiz-question" id="form" id="section1" style="width: 35%; margin: auto; text-align: center; margin-top: 50px;">
        <h3 style="text-align: center; font-size: 20pt;">Ready to meet your match?</h3>
        <br>


        <input type="text" id="email" name="email" placeholder="Email*" required><br>
        <input type="text" id="phone" name="phone" placeholder="Phone*" required><br>
        <input type="text" id="password" name="password" placeholder="Password*" required><br>
        <button type="button" class="navigation-button" id="next" id="next" onclick="nextSection()"" style="width: 100%; margin-left: 0px; border-radius: 10px;">Join Now</button>

        <span style="font-size: 12pt">

        By clicking "Join Now", you agree to MatchIYA's 
        <br>
        <a href="termsconditions.php" target=”_blank”><u><strong>Terms of Service</strong></u></a>
        <br><br>
        Already have an account? <a href="login.php"><u><strong>Login</strong></u></a>
        
        </span>
        <br>
    </div>

    <div class="quiz-question" id="form" id="section1" style="width: 35%; margin: auto; text-align: center; margin-top: 50px">
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
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
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
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
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
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
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
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
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
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>

        </div>
    </div>


    <div class="quiz-question" id="section7" style="display: none;">
        <h2 style="text-align: center;"><em>Barbie or Oppenheimer?</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($barboppo as $id => $option): ?>
                <div id="ck-button" style="width: 48%; height: 140px;">
                    <label>
                        <input type="checkbox" name="barboppo[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>
        </div>
    </div>


    <div class="quiz-question" id="section8" style="display: none;">
        <h2 style="text-align: center;"><em>Chocolate or Vanilla? (Ice Cream)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($icecream as $id => $option): ?>
                <div id="ck-button" style="width: 48%; height: 140px" >
                    <label>
                        <input type="checkbox" name="icecream[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="sectionCelebChoice" style="display: none;">
        <h2 style="text-align: center;"><em>Choose Your Favorite Celebrity</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($celebchoice as $id => $celebrity): ?>
                <div id="ck-button" style="width: 48%; height: 140px" >
                    <label>
                        <input type="checkbox" name="celebchoice[]" value="<?php echo $id; ?>"><span><?php echo $celebrity; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section9" style="display: none;">
        <h2 style="text-align: center;"><em>Is Match IYA a good idea?</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($matchiya as $id => $option): ?>
                <div id="ck-button" style="width: 48%; height: 140px" >
                    <label>
                        <input type="checkbox" name="matchiya[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section10" style="display: none;">
        <h2 style="text-align: center;"><em>Milk or Cereal First?</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($milkorcereal as $id => $option): ?>
                <div id="ck-button" style="width: 48%; height: 140px" >
                    <label>
                        <input type="checkbox" name="milkorcereal[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>
        </div>
    </div>


    <div class="quiz-question" id="section11" style="display: none;">
        <h2 style="text-align: center;"><em>Did the glove fit? (OJ Simpson)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($oj as $id => $option): ?>
                <div id="ck-button" style="width: 48%; height: 140px" >
                    <label>
                        <input type="checkbox" name="oj[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section12" style="display: none;">
        <h2 style="text-align: center;"><em>Over or Under? (Toilet Paper)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($toilet as $id => $option): ?>
                <div id="ck-button" style="width: 48%; height: 140px" >
                    <label>
                        <input type="checkbox" name="toilet[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
            <br>
        </div>
    </div>

    <div class="quiz-question" id="section13" style="display: none;">
        <h2 style="text-align: center;"><em>Top or bottom? (floor of IYA)</em></h2>
        <br>
        <div style="text-align: center; width: 500px; margin: auto;">
            <?php foreach ($toporbottom as $id => $option): ?>
                <div id="ck-button" style="width: 48%; height: 140px" >
                    <label>
                        <input type="checkbox" name="toporbottom[]" value="<?php echo $id; ?>"><span><?php echo $option; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            <br><br><br><br><br><br><br>
            <button type="button" class="navigation-button" onclick="prevSection()">Previous</button>
            <button type="button" class="navigation-button" id="next" onclick="nextSection()"">Next</button>
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

<?php include 'includes/footer.php'; ?>


<script>
    let currentSection = 0;
    const sections = document.querySelectorAll('.quiz-question');

    function showSection(index) {
        sections.forEach((section, idx) => {
            section.style.display = idx === index ? 'block' : 'none';
        });
    }

    function nextSection() {
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;

        console.log("Email:", email, "Phone:", phone);

        if (!email.endsWith('@usc.edu')) {
            alert('Please enter a valid USC email');
            return;
        } else if (!/^\d{10}$/.test(phone)) {
            alert('Phone number must be a 10-digit number');
            return;
        } else {
            currentSection = Math.min(sections.length - 1, currentSection + 1);
            showSection(currentSection);
        }

    }

    function prevSection() {
        currentSection = Math.max(0, currentSection - 1);
        showSection(currentSection);
    }
    showSection(currentSection);
</script>

</body>
</html>
