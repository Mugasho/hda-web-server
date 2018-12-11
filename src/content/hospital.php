<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 7:36 PM
 */

$db = new \database\db();
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


 <div class="m-datatable">
                <table id="datatable" class="dataTable table-hover table table-striped">
                    <thead>
                    <tr>
                        <th >

                        </th>
                        <th>Facility</th>
                        <th>Address</th>
                        <th>Sector</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($allFacilities as $Facilities) {
                        echo '<tr>
                        <td >
                        
                  <input type="checkbox" >
                 
                        </td>
                        <td>
                            ' . $db->limitChars($Facilities['name'], 15) . '
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
                         <td><a href="detail.php?drug=' . $Facilities['id'] . '" class="btn btn-success btn-sm">
                                           <span class="iconfont iconfont-export"></span>
                                        </a></td>
                    </tr>';
                    } ?>
                    </tbody>
                </table>
            </div>
        <!-- /# card -->