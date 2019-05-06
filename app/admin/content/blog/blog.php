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
if(isset($_GET['category'])){
    $category=$db->getPostCategoryByID($_GET['category']);
}
?>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Blog posts</h4>
            <ul class="search-listing"><?php
                foreach ($Posts as $post){
                    echo '<li>
                    <h3><a href="'.ADMIN_PATH.'blog/'.$post['id'].'/">'.$post['title'].'</a></h3>
                    <a href="'.ADMIN_PATH.'blog/'.$post['id'].'" class="search-links ">'.ADMIN_PATH.'blog/'.$post['id'].'/</a>
                    <p>'.$post['content'].'
                    
                    <a  href="'.ADMIN_PATH.'blog/view/'.$post['id'].'/" target="_blank" > <i class="fa fa-eye"></i> View</a>
                    <a  href="'.ADMIN_PATH.'blog/edit/'.$post['id'].'/" > <i class="fa fa-pencil"></i> Edit</a>
                    <a  href="'.ADMIN_PATH.'blog/?r='.$post['id'].'" > <i class="fa fa-trash"></i> Delete</a>
                    </p>
                </li>';
                }
                ?>
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
