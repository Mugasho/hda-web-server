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
$current = isset($_GET['pg']) ? $_GET['pg'] : 1;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 30;
$search = isset($_GET['search']) ? $_GET['search'] : null;
$pages = round($db->countHw($search) / $limit, 0);
$allHws = array();

if (!is_null($pages)) {

    $start = $current < 5 ? 1 : $current - 4;
    $last = ($current + 4) > $pages ? $pages : $current + 4;
    $next_id = (($current - 1) * $limit);
    $allHws = $db->get_hws($limit, $next_id, $search);


}

?>

<div class="col-12">
    <div class="card">
        <div class="card-header ">
            Health Workers
            <div class="btn-group mr-2 pull-right" role="group" aria-label="First group">
                <input  placeholder="search" onchange="search_page('search',this.value)"/>
            <a href="<?php echo ADMIN_PATH.'hw/add/'?>" class="btn btn-info pull-right"><i class="mdi mdi-plus"></i>Add new </a>
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <?php echo $limit; ?> per page
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" onclick="search_page('limit',20)">20 per page</a>
                    <a class="dropdown-item" onclick="search_page('limit',30)">30 per page</a>
                    <a class="dropdown-item" onclick="search_page('limit',40)">40 per page</a>
                    <a class="dropdown-item" onclick="search_page('limit',50)">50 per page</a>
                    <a class="dropdown-item" onclick="search_page('limit',60)">60 per page</a>
                </div>

            </div>
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
                    <?php foreach ($allHws as $hw) {
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
            <div class="btn-group mr-2 pull-right" role="group" aria-label="First group"><?php
                echo '<a  class="btn btn-secondary" onclick="search_page(\'pg\',1)"><i class="fa fa-fast-backward"></i></a>';
                for ($i = $start; $i <= $last; $i++) {
                    $status = $i == $current ? 'info text-white' : 'secondary ';
                    echo '<a  class="btn btn-' . $status . '"  onclick="search_page(\'pg\','.$i.')">' . $i . '</a>';
                }
                echo '<a class="btn btn-secondary" onclick="search_page(\'pg\','.$pages.')">
                        <i class="fa fa-fast-forward"></i> 
                        </a>';
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    function search_page(param, value) {
        var searchParams = new URLSearchParams(window.location.search);
        searchParams.set(param, value)
        var newParams = searchParams.toString()
        window.location.href = window.location.href.split('?')[0] + '?' + newParams;
    }
</script>

