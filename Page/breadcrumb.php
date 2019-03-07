<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 3:18 PM
 */

$routes=explode("/",$_SERVER['REQUEST_URI']);

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <?php echo $this->isHasTitle() ? '<h3 class="text-themecolor">' . $this->getPageTitle() . '</h3>' : '';?>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <?php
            echo '<li class="breadcrumb-item"><a href="'.ADMIN_PATH.'">Home</a></li>';
            for($i=3;$i<count($routes)-1;$i++){
                if($i != count($routes) - 2) {
                    echo '<li class="breadcrumb-item"><a href="' . ADMIN_PATH . $routes[$i] . '/">' . $routes[$i] . '</a></li>';
                } else {
                    echo '<li class="breadcrumb-item active">' . $routes[$i] . '</li>';
                }
            }
            ?>
            <!--<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><?php /*echo $this->getPageTitle();*/?></li>
            <li class="breadcrumb-item active">User Cards</li>-->
        </ol>
    </div>

</div>
<!-- END BREADCRUMB-->
