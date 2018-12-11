<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 11:07 PM
 */

$db = new \database\db();
$active = '';
?>


<div class="m-datatable">
    <table class="table dataTable table-hover " id="datatable">
        <thead>
        <tr>
            <td>
                <label class="au-checkbox">
                    <input type="checkbox">
                    <span class="au-checkmark"></span>
                </label>
            </td>
            <td>name</td>
            <td>email</td>
            <td>role</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->getAllUsers() as $user) {
            if ($user['status'] == 1) {
                $active = 'checked';
            }
            echo '<tr>
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox" >
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>
                            ' . $user['name'] . '
                        </td>
                        <td>
                            ' . $user['email'] . '
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            <label class="switch switch-text switch-primary">
                                <input type="checkbox" class="switch-input" ' . $active . '>
                                <span data-on="On" data-off="Off" class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </td>
                    </tr>';
        } ?>

        </tbody>
    </table>
</div>


