<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 3:36 PM
 */

$db = new Hda\database\db();
$next_id = null;
$search = null;
$allDrugs = array();
if (isset($_POST['next_id'])) {
    $next_id = $_POST['next_id'];
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
$allDrugs = $db->getAllDrugs(100, $next_id, $search);
if (!empty($allDrugs)) {
    $next_id = $allDrugs[count($allDrugs) - 1]['id'];
}
?>

<div class="col-12">
    <div class="card">
        <div class="card-header ">
            Drugs List <a href="<?php echo BASE_PATH.'drugs/add/'?>" class="btn btn-info pull-right"><i class="mdi mdi-plus"></i>Add new </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Drug</th>
                        <th>Strength</th>
                        <th>Company</th>
                        <th>Country</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($allDrugs as $drug) {
                        echo '<tr>
           
                        <td>
                            ' . $db->limitChars($drug['name_of_drug'], 30) . '
                        </td>
                        <td>
                            ' . $db->limitChars($drug['strength_of_drug'], 15) . '
                        </td>
                        <td>
                            ' . $db->limitChars($drug['local_technical_representative'], 30) . '
                        </td>
                        <td>
                            ' . $db->limitChars($drug['country_of_manufacture'], 15) . '
                        </td>
                        <td>
                        <div class="btn-group">
                                            <a href="detail/' . $drug['id'] . '/" class="btn btn-info btn-sm">
                                            <i class="mdi mdi-menu"></i></a>
                                            <a href="detail/' . $drug['id'] . '/" class="btn btn-warning btn-sm">
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


