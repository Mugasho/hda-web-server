<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/7/2019
 * Time: 12:10 PM
 */

$db = new Hda\database\db();

$Posts = array();
$default=30;
$limit=isset($_GET['limit'])?$_GET['limit']:30;
$Posts = $db->getAllPosts($limit);
?>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Search Result For "Angular Js"</h4>
            <h6 class="card-subtitle">About 14,700 result ( 0.10 seconds)</h6>
            <ul class="search-listing"><?php
                foreach ($Posts as $post){
                    echo '<li>
                    <h3><a href="javacript:void(0)">'.$post['title'].'</a></h3>
                    <a href="'.ADMIN_PATH.'blog/'.$post['id'].'" class="search-links">'.ADMIN_PATH.'blog/'.$post['id'].'/</a>
                    <p>'.$post['content'].'</p>
                </li>';
                }
                ?>
                <li>
                    <h3><a href="javacript:void(0)">AngularJs</a></h3>
                    <a href="javascript:void(0)" class="search-links">http://www.google.com/angularjs</a>
                    <p>Lorem Ipsum viveremus probamus opus apeirian haec perveniri, memoriter.Praebeat pecunias viveremus probamus opus apeirian haec perveniri, memoriter.</p>
                </li>

            </ul>
            <nav aria-label="Page navigation example" class="m-t-40">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
