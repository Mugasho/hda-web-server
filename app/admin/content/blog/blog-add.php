<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/7/2019
 * Time: 2:55 PM
 */
$db=new \Hda\database\db();
$users=$db->getAllUsers();
$categories=$db->getPostCategories(null);

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-primary">
                Basic Information <a href="<?php echo ADMIN_PATH . 'blog/' ?>"
                                     class="btn btn-info pull-right"><i class="mdi mdi-view-list"></i> All Posts</a>
            </div>
            <form  method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="product-title">Title</label>
                                    <input type="text" class="form-control" id="title"  name="title" placeholder="Title"
                                           required="required">
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required="required">
                                    <option value="0">uncategorized</option>
                                    <?php
                                    foreach ($categories as $category){
                                        echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="category">Author</label>
                                <select class="form-control" id="author" name="author" required="required">

                                    <?php
                                    if(!empty($users)){
                                        foreach ($users as $user){
                                            echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="1">Admin</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required="required">
                                    <option value="1">Published</option>
                                    <option value="2">Draft</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="category">Date Published</label>
                                <input class="form-control" type="date" name="date_added" id="date_added">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="content">content</label>
                                    <textarea id="content"  name="content" rows="5" class="form-control"
                                              placeholder="Post content"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="blog_pic">Featured image</label>
                                <input type="file" class="dropify" id="blog_pic" name="blog_pic"
                                       placeholder="Featured image" >
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-lg-center">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
