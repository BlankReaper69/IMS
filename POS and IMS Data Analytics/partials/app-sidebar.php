
<div class="dashboard_sidebar" id="dashboard_sidebar">
        <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
        <div class="dashboard_sidebar_user">
            <img src='images/user.jpg' alt="user Image." id="userImage"/>
            <span><?= $user['first_name']. ' ' . $user['last_name']?></span>
        </div>
        <div class="dashboard_side_menus">
            <ul class="dashboard_menu_list">
                <!-- class="menuActive"-->
                <li class="liMainMenu">
                    <a href="./dashboard.php" > <i class="fa-solid fa-gauge"> </i> <span class="menuText"> DASHBOARD</span></a>
                </li>

                <li class="liMainMenu">
                    <a href="#"> <i class="fa-solid fa-user-plus"> </i> <span class="menuText"> PRODUCT MANAGEMENT</span></a>
                </li>

                <li class="liMainMenu">
                    <a href="#"> <i class="fa-solid fa-user-plus"> </i> <span class="menuText"> SUPPLIER MANAGEMENT</span></a>
                </li>
                
                <li class="liMainMenu">
                    <a href="./user-add.php"> 
                        <i class="fa-solid fa-user-plus"> </i> 
                        <span class="menuText"> USER MANAGEMENT </span>
                        <i class="fa-solid fa-angle-left mainMenuIconArrow"></i> 
                    </a>
                    <ul class="subMenus">
                       <li><a class="subMenuLink" href="#"><i class="fa-regular fa-circle"></i> View Users</a></li>
                       <li><a class="subMenuLink" href="#"><i class="fa-regular fa-circle"></i> Add User</a></li>
                    </ul>
                </li>
               

            </ul>
        </div>
    </div>