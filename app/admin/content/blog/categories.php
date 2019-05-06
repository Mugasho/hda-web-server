<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/31/2019
 * Time: 5:11 PM
 */

$db = new Hda\database\db();
$next_id = null;
$search = null;
$current = isset($_GET['pg']) ? $_GET['pg'] : 1;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 30;
$search = isset($_GET['search']) ? $_GET['search'] : null;
$pages = round($db->countDrugs($search) / $limit, 0);
$categories = array();

if (!is_null($pages)) {

    $start = $current < 5 ? 1 : $current - 4;
    $last = ($current + 4) > $pages ? $pages : $current + 4;
    $next_id = (($current - 1) * $limit);
    $categories = $db->getPostCategories($limit);


}
?>

<div class="col-12">
    <div class="card">
        <div class="card-header ">
            Categories
            <div class="btn-group mr-2 pull-right" role="group" aria-label="First group">
                <input  placeholder="search" onchange="search_page('search',this.value)"/>
                <a href="#" class="btn btn-themecolor" data-toggle="modal" data-target="#content-modal">
                    New category
                    <i class="mdi mdi-plus"></i> </a>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Author</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $category) {
                        echo '<tr>
           
                        <td>
                            ' . $db->limitChars($category['category'], 30) . '
                        </td>
                        <td>
                            ' . $db->limitChars($category['description'], 30) . '
                        </td>
                        <td>
                            ' . $db->limitChars($category['author'], 30) . '
                        </td>
                        <td>
                        <div class="btn-group">
                                            <a href="detail/' . $category['id'] . '/" class="btn btn-info btn-sm">
                                            <i class="mdi mdi-menu"></i></a>
                                            <a href="detail/' . $category['id'] . '/" class="btn btn-warning btn-sm">
                                            <i class="fa fa-minus-circle"></i></a>
                                            </div>
                         </td>
                    </tr>';
                    } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- hw modal -->
<div id="content-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="category" name="category"
                               placeholder="Enter Category Title" required="required">
                    </div>
                    <div class="form-group">
                            <textarea type="text" class="form-control" id="description" name="description"
                                      placeholder="Description" rows="5" ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->
<script>
    function search_page(param, value) {
        var searchParams = new URLSearchParams(window.location.search);
        searchParams.set(param, value)
        var newParams = searchParams.toString()
        window.location.href = window.location.href.split('?')[0] + '?' + newParams;
    }
</script>