<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/4/2018
 * Time: 8:36 AM
 */
echo '<div class="sidebar">
    <div class="sidebar__scroll">
        <div>
            <div class="sidebar__user">
                <div class="sidebar__user-avatar">
                    <img src="'.CONTENT_PATH.'images/uploads/me.jpg" alt="" width="68" height="68" class="rounded-circle">
                    <!--<span class="sidebar__user-avatar-placeholder">
            <span class="iconfont iconfont-avatar-placeholder"></span>
          </span>-->
                    <!--<img src="img/users/user-1.jpg" alt="" width="68" height="68" class="rounded-circle">-->
                </div>
                <div class="dropdown sidebar__user-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        '.$_SESSION['username'].'
                        <i class="fa fa arrowBottom"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Help</a>
                        <a class="dropdown-item" href="#">Sign Out</a>
                    </div>
                </div>
            </div>';
if ($this->getMenu() != null) {
    echo '<ul class="sidebar-nav">';
    foreach ($this->getMenu() as $key => $value) {

        $href=!is_null($value['items'])?'#':CONTENT_PATH. $value['path'];
        $classes=!is_null($value['items'])?'sidebar-nav__link':'sidebar-nav__link';
        echo '<li class="sidebar-nav__item">';
        echo '<a class="'.$classes.'" href="' .$href . '">';
        if ($value['icon'] != null) {
            echo '<span class="sidebar-nav__item_icon"><i class="' . $value['icon'] . '"></i></span>';
        }
        echo '<span class="sidebar-nav__item-text">'.$key.'</span>';
        echo '</a>';
        if(!is_null($value['items'])){
            echo '<ul class="sidebar-subnav">';
            foreach ($value['items'] as $item => $item_value) {
                echo '<li class="sidebar-subnav__item">
                           <a class="sidebar-subnav__link" href="' .CONTENT_PATH. $item_value . '">'.$item.'</a>
                      </li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    echo '</ul>';
}
echo '
</div>

        <div class="sidebar-nav__footer">
            <div class="sidebar__collapse">
                <span class="icon iconfont iconfont-collapse-left-arrows"></span>
            </div>
        </div>
    </div>
</div>';
?>

