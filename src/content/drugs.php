<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 3:36 PM
 */

$db = new \database\db();
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

<div class="m-datatable">
    <table id="datatable" class="dataTable table-hover table table-striped">
        <thead>
        <tr>
            <th>

            </th>
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
                            <input  type="checkbox" class="login-checkbox">
                        </td>
                        <td>
                            ' . $db->limitChars($drug['name_of_drug'], 25) . '
                        </td>
                        <td>
                            ' . $db->limitChars($drug['strength_of_drug'], 15) . '
                        </td>
                        <td>
                            ' . $db->limitChars($drug['local_technical_representative'], 25) . '
                        </td>
                        <td>
                            ' . $db->limitChars($drug['country_of_manufacture'], 15) . '
                        </td>
                        <td><a href="detail.php?drug=' . $drug['id'] . '" class="btn btn-success btn-sm">
                                            <span class="iconfont iconfont-export"></span>
                                        </a></td>
                    </tr>';
        } ?>

        </tbody>
    </table>
</div>

