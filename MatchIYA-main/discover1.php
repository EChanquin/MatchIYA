<?php
require_once 'init.php'; // Make sure this includes your database connection and other initializations

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or show an error message
    header('Location: login.php'); // Redirect to login page
    exit();
}

$currentUser = $_SESSION['user_id'];
$matches = [];

// Connect to the database
$mysqli = new mysqli("webdev.iyaserver.com", "chanquin", "AcadDev_Chanquin_5742321970", "chanquin_Match_IYA");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to find users with shared interests
function findMatchesByInterests($mysqli, $currentUser) {
    $matches = [];
    $query = "SELECT ui.user_id, COUNT(*) as shared_interests
              FROM user_interests ui
              JOIN user_interests ui2 ON ui.interest_id = ui2.interest_id AND ui2.user_id = ?
              WHERE ui.user_id != ?
              GROUP BY ui.user_id
              ORDER BY shared_interests DESC
              LIMIT 10";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("ii", $currentUser, $currentUser);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $matches[] = $row['user_id'];
        }

        $stmt->close();
    }

    return $matches;
}

// Function to get user's cohort and preference
function getUserDetails($mysqli, $userId) {
    $details = [];
    $query = "SELECT u.id, u.email, c.cohort, p.preference
              FROM user u
              LEFT JOIN cohorts c ON u.cohort_id = c.cohort_id
              LEFT JOIN preferences p ON u.preference_id = p.preference_id
              WHERE u.id = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $details = $row;
        }
        $stmt->close();
    }
    return $details;
}

// Get potential matches
$potentialMatches = findMatchesByInterests($mysqli, $currentUser);

// Get user details for potential matches
$profiles = [];
foreach ($potentialMatches as $matchUserId) {
    $profiles[] = getUserDetails($mysqli, $matchUserId);
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Discover</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <link href="./assets/css/global.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Additional CSS (if any) -->
    <style>
        /* Add any additional CSS styling here */
        .discover-wrapper {
            display: flex;
            justify-content: center;
            align-items: start;
            padding: 20px;
        }
        .card_section, .likes_section {
            margin: 10px;
        }
        /* Further styling */
    </style>
</head>
<body class="light-mode">
<!-- Navigation Bar -->
<?php include 'includes/navbar.php'; ?>

<!-- Toggle Mode Button -->
<button id="toggle-mode" class="lampbutton">
    <img src="assets/images/cupid.png" class="switch">
</button>

<!-- Main Content Wrapper -->
<div class="discover-wrapper">
    <!-- Left Section for Liked Profiles -->
    <div class="likes_section">
        <!-- Sorting Container -->
        <div class="sort_container">
            <!-- Sorting Buttons -->
            <p>Sort By:</p>
            <button class="sort_button" onclick="sort('matched')">Matched</button>
            <button class="sort_button" onclick="sort('dateAdded')">Date Added</button>
            <button class="sort_button" onclick="sort('cohort')">Cohort</button>
        </div>
        <!-- Liked Profiles Container -->
        <div class="likes_container">
            <!-- Liked Profiles will be listed here -->
        </div>
        <!-- Collapse Button -->
        <button id="collapseLikesBtn" class="rate-button">
            <i data-feather="heart"></i>
        </button>
    </div>

    <!-- Card Section for Potential Matches -->
    <div class="card_section">
        <!-- Dislike Button -->
        <button id="dislike_button" class="rate-button">
            <i data-feather="x"></i>
        </button>

        <!-- Card Stack for Displaying Matches -->
        <div class="card-stack">
            <?php
            foreach ($profiles as $profile) {
                include 'partials/card.php'; // Display user card
            }
            ?>
        </div>

        <!-- Like Button -->
        <button id="like_button" class="rate-button">
            <i data-feather="check"></i>
        </button>
    </div>
</div>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

<!-- Scripts -->
<script src="https://unpkg.com/feather-icons"></script>
<script src="assets/js/discover.js"></script>
<script>
    feather.replace();
    // Additional JavaScript if needed
</script>
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
</body>
</html>

