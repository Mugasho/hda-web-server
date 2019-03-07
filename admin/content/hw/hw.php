<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 1/28/2019
 * Time: 11:21 PM
 */

$db = new Hda\database\db();
$next_id = null;
$search = null;
$allhws = array();
if (isset($_POST['next_id'])) {
    $next_id = $_POST['next_id'];
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
$allhws = $db->get_hws(100, $next_id, $search);
if (!empty($allhws)) {
    $next_id = $allhws[count($allhws) - 1]['id'];
}
?>

<div class="col-12">
    <div class="card">
        <div class="card-header ">
            Health Workers <a href="<?php echo ADMIN_PATH.'hw/add/'?>" class="btn btn-info pull-right"><i class="mdi mdi-plus"></i>Add new </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Names</th>
                        <th>email</th>
                        <th>Qualification</th>
                        <th>RegNo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($allhws as $hw) {
                        echo '<tr>
           
                        <td>
                            ' .$hw['surname']. ' '.$hw['first_name']. '
                        </td>
                        <td>
                            ' .$hw['email']. '
                        </td>
                        <td>
                            ' .$hw['qualification']. '
                        </td>
                        <td>
                            ' .$hw['reg_no'] . '
                        </td>
                        <td>
                        <div class="btn-group">
                                            <a href="detail/' . $hw['id'] . '/" class="btn btn-info btn-sm">
                                            <i class="fa fa-search"></i></a>
                                            <a href="detail/' . $hw['id'] . '/" class="btn btn-warning btn-sm">
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


