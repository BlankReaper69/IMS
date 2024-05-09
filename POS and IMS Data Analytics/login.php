<?php
session_start();
if(isset($_SESSION['user'])) header('location: dashboard.php');

$error_message = ""; 

if(isset($_POST['username']) && isset($_POST['password'])){
    include('IMS Database/connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM users WHERE email = :username AND password = :password LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->execute(array(':username' => $username, ':password' => $password));

    if($stmt->rowCount() > 0){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        $error_message = 'Please make sure that username and password are correct!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/ims.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body id="loginBody">
    <?php if(!empty($error_message)) {?>
        <div id="errorMessage" style="background: #ffff; text-align: center; color: red; font-size: 20px; padding: 11px;">
            <p>ERROR: <?= $error_message ?></p>
        </div>
    <?php } ?>

    <div class="container">
        <div class="loginHeader">
            <h1>IMS</h1>
            <p><span class="blue-i">I</span>nventory <span class="blue-i">M</span>anagement <span class="blue-i">S</span>ystem</p>
        </div>
        <div class="loginBody">
            <form action="login.php" method="POST"> <!-- Form submits to login.php -->
                <div class="loginInputsContainer">
                    <label for="">Username</label>
                    <input placeholder="username" name="username" type="text"/>
                </div>
                <div class="loginInputsContainer">
                    <label for="">Password</label>
                    <input placeholder="password" name="password" type="password"/>
                </div>
                <div class="loginButtonContainer">
                    <button type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
