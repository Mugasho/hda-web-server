<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 11:07 PM
 */

$db = new Hda\database\db();
$active = '';

function getRole($role){
    switch ($role) {
        case 0:
            $user_role = 'Admin';
            break;
        case 1:
            $user_role = 'hw';
            break;
        default:
            $user_role='doctor';
            break;
    }
    return $user_role;
}

?>

<div class="card">
<div class="card-header">
    System Users
</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" >
                <thead>
                <tr>
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
                            ' . $user['name'] . '
                        </td>
                        <td>
                            ' . $user['email'] . '
                        </td>
                        <td>
                            <span class="label label-success">'.getRole($user['role']).'</span>
                        </td>
                        <td>
                           <a class="label label-info" href="#"><i class="mdi mdi-pencil"></i> </a>
                        </td>
                    </tr>';
                } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>




