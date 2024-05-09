<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if user is not logged in
    exit;
}
$_SESSION['table'] = 'users';
$user = $_SESSION['user'];
$users = include('IMS Database/show-users.php');

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
            <div class="row">
                <div class="column column-5">
                    <h1 class="section_header"><i class="fa fa-plus"></i>Create User</h1>
                      <div id="userAddFormContainer">
                       <form action="IMS Database/add.php" method="POST" class="appForm" id="userAddForm"> 
                    <div class="appFormInputContainer">
                        <label for="first_name">First Name</label>
                        <input type="text" class="appFormInput" id="first_name" name="first_name" />
                    </div class="appFormInputContainer">
                    <div>
                        <label for="last_name">Last Name</label>
                        <input type="text" class="appFormInput" id="last_name" name="last_name" />
                    </div>
                    <div class="appFormInputContainer">
    <label for="email">Email</label>
    <input type="text" class="appFormInput" id="email" name="email" autocomplete="email">
</div>
                    <div class="appFormInputContainer">
    <label for="password">Password</label>
    <input type="password" class="appFormInput" id="password" name="password" autocomplete="current-password">
</div>
                    
                    <button type="submit" class="appBtn"><i class="fa-solid fa-plus"></i>Add User</button>
                  
                </form>
                <?php 
                if (isset($_SESSION['response'])) { 
                    $response_message = $_SESSION['response']['message'];
                    $is_success = $_SESSION['response']['success'];
                ?>
                    <div class="responseMessage">
                        <p class="responseMessage <?= $is_success ? 'responseMessage_success' : 'responseMessage_error' ?>">
                            <?= $response_message ?>
                        </p>
                    </div>
                <?php
                    unset($_SESSION['response']);
                }
                ?>



                </div>

                    
                </div>
                <div class="column column-7">
                <h1 class="section_header"><i class="fa fa-users"></i>List of Users</h1>
                        <div class="section_content">
                            <div class="users">
                                <p class="userCount"><?= count($users) ?>Users</p>
                                <table>
                                     <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                        </tr>
                                        
                                     </thead>
                                     <tbody>
                                        <?php
                                           foreach($users as $index => $user){ ?>

                                     
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $user ['first_name'] ?></td>
                                            <td><?= $user ['last_name'] ?></td>
                                            <td><?= $user ['email'] ?></td>
                                            <td><?= date('M d,Y @h:i:s A', strtotime($user ['created_at'])) ?></td>
                                            <td><?= date('M d,Y @h:i:s A',strtotime($user ['updated_at'])) ?></td>
                                            <td>
                                                <a href=""><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="" class="deleteUser" data-userid="<?= $user['id'] ?>" data-fname="<?= $user['first_name']?>"
                                                data-lname="<?= $user['last_name'] ?>"><i class="fa fa-trash"></i> Delete</a>
                        
                                            </td>
                                        </tr>
                                        <?php }?>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<script src="Js/script.js"></script>
<script src="Js/jquery-3.7.1.min.js"></script>
<script>
    function Script() {
        this.initialize = function() {
            this.registerEvents();
        };

        this.registerEvents = function() {
            document.addEventListener('click', function(e) {
                var targetElement = e.target;
                var classList = targetElement.classList;

                if (classList.contains('deleteUser')) {
                    e.preventDefault();
                    var userId = targetElement.dataset.userid;
                    var fname = targetElement.dataset.fname;
                    var lname = targetElement.dataset.lname;

                    if (window.confirm('Are you sure you want to delete ' + fname + ' ' + lname + '?')){
                        $.ajax({
                            method: 'POST',
                            data:{
                                user_id: userId,
                                f_name: fname,
                                l_name: lname

                           },
                            url:'IMS Database/delete-user.php',
                            dataType:'json',
                            success: function(data){
                                if(data.success){
                                    if(window.confirm(data.message)){
                                        location.reload();
                                    }
                                } else{
                                    window.alert(data.message);
                                }
                            }
                        })
                    }else{
                        console.log('will not deletes');
                    }
                }
            });
        };
    }

    var scriptInstance = new Script();
    scriptInstance.initialize();
</script>   
</script>   
</body>  
</html>
