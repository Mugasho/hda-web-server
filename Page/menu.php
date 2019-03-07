<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/4/2018
 * Time: 8:36 AM
 */

echo '
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="'.CONTENT_PATH.'uploads/images/me.jpg" alt="user" />
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>'.$_SESSION['username'].'</h5>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <a href="pages-login.html" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>

                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                    <!-- text-->
                </div>
            </div>
        </div>';

        if ($this->getMenu() != null) {
            echo '<nav class="sidebar-nav">
                <ul id="sidebarnav">';
            foreach ($this->getMenu() as $key => $value) {
                $href=!is_null($value['items'])?'#':ADMIN_PATH.$value['path'];
                $classes=!is_null($value['items'])?'has-arrow waves-effect waves-dark':'waves-effect waves-dark';
                echo '<li>';
                echo '<a class="'.$classes.'" href="' .$href . '" aria-expanded="false">';
                if ($value['icon'] != null) {
                    echo '<i class="' . $value['icon'] . '"></i>';
                }
                echo '<span class="hide-menu">'.$key.'</span></a>';
                if(!is_null($value['items'])){
                    echo '<ul class="collapse" aria-expanded="false">';
                    foreach ($value['items'] as $item => $item_value) {
                        echo '<li> <a href="' .ADMIN_PATH. $item_value . '">'.$item.'</a></li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            echo '</ul>
               </nav>';
        }?>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>


