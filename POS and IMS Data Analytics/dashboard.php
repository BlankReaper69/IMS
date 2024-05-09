<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if user is not logged in
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMS Dashboard-Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="CSS/ims.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="dashboardMainContainer">
<?php include('partials/app-sidebar.php') ?>

    <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
            <div class="dashboard_content_main">

            </div>
        </div>
    </div>
</div>

<script src="Js/script.js"></script>
</body>  
</html>
