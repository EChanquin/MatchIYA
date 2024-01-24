<?php
require_once 'init.php';

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to homepage
    header("Location: frontpage.php");
    exit();
}
?>

<script src="https://unpkg.com/feather-icons"></script>

<div class="topnav">  
	<div class="leftTopNav">
        <?php
        if (isset($_SESSION['user_id'])) {
            // If user is logged in, show logout link
            echo '<a href="?action=logout">Logout</a>'; // Notice the href is changed
        } else {
            // If user is not logged in, show login link
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </div>  
    
    <div class="centerTopNav">
        <a href="frontpage.php">Match IYA</a>
    </div>  
    
    <div class="rightTopNav">
        <a href="discover.php">For You</a>
    </div>  
</div>

<script>
    feather.replace();
</script>
