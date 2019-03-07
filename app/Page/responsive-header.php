<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/21/2019
 * Time: 2:40 PM
 */
?>

<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo text-white"><h3><a href="index.html" title="">HDA</a></h3></div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="<?php echo VENDOR ;?>hunt/images/icon.png" alt="" /> Menu
            </div>
            <div class="res-closemenu">
                <img src="<?php echo VENDOR ;?>hunt/images/icon2.png" alt="" /> Close
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        <div class="btn-extars">
            <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Facility</a>
            <ul class="account-btns">
                <li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
                <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
            </ul>
        </div><!-- Btn Extras -->
        <form class="res-search">
            <input type="text" placeholder="Job title, keywords or company name" />
            <button type="submit"><i class="la la-search"></i></button>
        </form>
        <div class="responsivemenu">
            <ul>
                <?php
                foreach ($this->getMenu() as $key => $value){
                    $href=!is_null($value['items'])?'#':BASE_PATH.$value['path'];
                    $classes=!is_null($value['items'])?'menu-item-has-children':'menu-item';
                    echo '<li class="'.$classes.'">';
                    echo '<a  href="'.$href .'" title="">'.$key;
                    echo '</a>'. PHP_EOL;
                    if(!is_null($value['items'])){
                        echo '<ul >'. PHP_EOL;
                        foreach ($value['items'] as $item => $item_value) {
                            echo '<li> <a href="' .BASE_PATH. $item_value . '" title="">'.$item.'</a></li>'. PHP_EOL;
                        }
                        echo '</ul>'. PHP_EOL;
                    }
                    echo '</li>'. PHP_EOL;
                }?>
            </ul>
        </div>
    </div>
</div>
