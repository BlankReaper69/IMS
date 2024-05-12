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
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                            <td class="firstName"><?= $user ['first_name'] ?></td>
                                            <td class="lastName"><?= $user ['last_name'] ?></td>
                                            <td class="email"><?= $user ['email'] ?></td>
                                            <td><?= date('M d,Y @h:i:s A', strtotime($user ['created_at'])) ?></td>
                                            <td><?= date('M d,Y @h:i:s A',strtotime($user ['updated_at'])) ?></td>
                                            <td>
                                                <a href="" class="updateUser" data-userid="<?= $user['id'] ?>"><i class="fa fa-pencil"></i> Edit</a>
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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    BootstrapDialog.confirm({
                                        type:BootstrapDialog.TYPE_DANGER,
                                        message:'Are you sure you want to delete ' + fname + ' ' + lname + '?',
                                        callback: function(isDelete){
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
                                    BootstrapDialog.alert({
                                        type:BootstrapDialog.TYPE_SUCCESS,
                                        message:data.message,
                                        callback: function(){
                                            location.reload();
                                        }
                                    });
                                } else 
                                    BootstrapDialog.alert({
                                        type:BootstrapDialog.TYPE_DANGER,
                                        message:data.message,
                                        
                                        
                                    });
                            }
                        });
                    }
                });


                }

                if(classList.contains('updateUser')) {
                    e.preventDefault();

                    firstName = targetElement.closest('tr').querySelector('td.firstName').innerHTML;
                    lastName = targetElement.closest('tr').querySelector('td.lastName').innerHTML;
                    email = targetElement.closest('tr').querySelector('td.email').innerHTML;
                    userId = targetElement.dataset.userid;

                    BootstrapDialog.confirm({
                        title:'Update' + firstName + '' + lastName,
                        message: '<form>\
                        <div class="form-group">\
                        <label for="firstName">Email address:</label>\
                        <input type="text" class="form-control" id="firstName" value="'+ firstName +'">\
                        </div>\
                        <div class="form-group">\
                        <label for="lastName">Email address:</label>\
                        <input type="text" class="form-control" id="lastName" value="'+ lastName +'">\
                        </div>\
                        <div class="form-group">\
                        <label for="email">Email address:</label>\
                        <input type="email" class="form-control" id="emailUpdate" value="'+ email +'">\
                        </div>\
                        </form>',
                        callback: function(isUpdate){
                            if(isUpdate){
                               $.ajax({
                            method: 'POST',
                            data:{
                                userId: userId,
                                f_name: document.getElementById('firstName').value,
                                l_name: document.getElementById('lastName').value,
                                email: document.getElementById('emailUpdate').value,

                           },
                            url:'IMS Database/update-user.php',
                            dataType:'json',
                            success: function(data){
                                if(data.success){
                                    BootstrapDialog.alert({
                                        type:BootstrapDialog.TYPE_SUCCESS,
                                        message:data.message,
                                        callback: function(){
                                            location.reload();
                                        }
                                    });
                                } else 
                                    BootstrapDialog.alert({
                                        type:BootstrapDialog.TYPE_DANGER,
                                        message:data.message,
                                        
                                        
                                    });
                            }
                          });
                        }
                       }
                    });
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
