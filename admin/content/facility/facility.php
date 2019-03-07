<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 7:36 PM
 */

$db = new Hda\database\db();
$next_id = null;
$search = null;
$allFacilities = array();
if (isset($_POST['next_id'])) {
    $next_id = $_POST['next_id'];
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
$allFacilities = $db->getAllFacilities(30, $next_id, $search);
if (!empty($allFacilities)) {
    $next_id = $allFacilities[count($allFacilities) - 1]['id'];
}

?>

<div class="card">
    <div class="card-header">
        Registered Health facilities <a href="<?php echo ADMIN_PATH . 'facility/add/' ?>"
                                        class="btn btn-info pull-right"><i class="mdi mdi-plus"></i> Add new</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table-hover table table-striped">
                <thead>
                <tr>
                    <th>Health Facility</th>
                    <th>Address</th>
                    <th>Sector</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allFacilities as $Facilities) {
                    echo '<tr>
 
                        <td>
                            ' . $db->limitChars($Facilities['facility'], 35) . '
                        </td>
                        <td>
                            ' . $db->limitChars($Facilities['address'], 15) . '
                        </td>
                        <td>
                            ' . $db->limitChars($Facilities['sector'], 20) . '
                        </td>
                        <td>
                            ' . $db->limitChars($Facilities['category'], 20) . '
                        </td>
                         <td>
                         <div class="btn-group">
                                            <a href="detail/' . $Facilities['id'] . '/" class="btn btn-info btn-sm">
                                            <i class="fa fa-search"></i></a>
                                            <a href="d/' . $Facilities['id'] . '/" class="btn btn-warning btn-sm">
                                            <i class="fa fa-minus-circle"></i></a>
                                            </div>
                         </td>
</td>
                    </tr>';
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /# card -->