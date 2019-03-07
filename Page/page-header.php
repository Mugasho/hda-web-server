<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/19/2019
 * Time: 12:52 AM
 */

?>
<header class="stick-top">
    <div class="menu-sec">
        <div class="container">
            <div class="logo text-white">
                <h3><a href="index.html" title="">HDA</a></h3>
            </div><!-- Logo -->
            <div class="btn-extars">
                <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Facility</a>
                <ul class="account-btns">
                    <li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
                    <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
                </ul>
            </div><!-- Btn Extras -->
            <nav>
                <ul>
                    <?php
                    foreach ($this->getMenu() as $key => $value){
                        $href=!is_null($value['items'])?'#':BASE_PATH.$value['path'];
                        $classes=!is_null($value['items'])?'menu-item-has-children':'menu-item';
                        echo '<li class="'.$classes.'">';
                        echo '<a  href="'.$href .'" title="">'.$key;
                        echo '</a>';
                        if(!is_null($value['items'])){
                            echo '<ul >';
                            foreach ($value['items'] as $item => $item_value) {
                                echo '<li> <a href="' .BASE_PATH. $item_value . '" title="">'.$item.'</a></li>';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }?>
                </ul>
            </nav><!-- Menus -->
        </div>
    </div>
</header>


