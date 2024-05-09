
<div class="dashboard_sidebar" id="dashboard_sidebar">
        <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
        <div class="dashboard_sidebar_user">
            <img src='images/user.jpg' alt="user Image." id="userImage"/>
            <span><?= $user['first_name']. ' ' . $user['last_name']?></span>
        </div>
        <div class="dashboard_side_menus">
            <ul class="dashboard_menu_list">
                <!-- class="menuActive"-->
                <li>
                    <a href="./dashboard.php" > <i class="fa-solid fa-gauge"> </i> <span class="menuText"> DASHBOARD</span></a>
                </li>
                <li>
                    <a href="./user-add.php"> <i class="fa-solid fa-user-plus"> </i> <span class="menuText"> ADD USERS</span></a>
                </li>

            </ul>
        </div>
    </div>