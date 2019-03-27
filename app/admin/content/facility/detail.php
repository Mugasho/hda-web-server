<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/4/2019
 * Time: 2:16 PM
 */

$facility = $this->getPageVars();
$allHW = $this->getPageVars2();
$db = new Hda\database\db();
$sectionTitles = $db->getSectionTitlesByID($facility['id']);
function getColor($reason)
{
    switch ($reason) {
        case 'Active':
            $color = 'success';
            break;
        case 'Inactive':
            $color = 'info';
            break;
        default:
            $color = 'danger';
            break;
    }
    return $color;
}

?>

<div class="row">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <b><?php echo strtoupper($facility['facility']) ?></b>
                <div class="btn-group pull-right">
                    <a href="#" class="btn btn-themecolor" data-toggle="modal" data-target="#section-modal"><i
                                class="mdi mdi-plus"></i> </a>
                    <a href="#" class="btn btn-themecolor "><i class="mdi mdi-delete"></i> </a>
                    <a href="<?php echo BASE_PATH . 'facility/' ?>" class="btn btn-themecolor "><i
                                class="mdi mdi-view-grid"></i> </a>
                </div>

            </div>
            <!--accordion-->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <!----> <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseOne"
                               aria-expanded="false" aria-controls="collapseOne">
                                Basic information
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <h5>Name of facility</h5><?php echo $facility['facility'] ?>
                            <hr>
                            <h5>Sector</h5><?php echo $facility['sector'] ?>
                            <hr>
                            <h5>Category</h5><?php echo $facility['category'] ?>
                            <hr>
                            <h5>License</h5><?php echo $facility['license'] ?>
                            <hr>
                            <h5>Address</h5><?php echo $facility['address'] ?>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Contact information
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <h5>Contact name</h5><?php echo $facility['contact'] ?>
                            <hr>
                            <h5>Phone</h5><?php echo $facility['phone'] ?>
                            <hr>
                            <h5>email</h5><?php echo $facility['email'] ?>
                            <hr>
                            <h5>Qualification</h5><?php echo $facility['qualification'] ?>
                            <hr>
                            <h5>Address</h5><?php echo $facility['location'] ?>
                        </div>
                    </div>
                </div><?php
                foreach ($sectionTitles as $sectionTitle) {
                    echo '<div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading' . $sectionTitle['id'] . '">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse' . $sectionTitle['id'] . '" aria-expanded="false" aria-controls="collapse' . $sectionTitle['id'] . '">
                                ' . $sectionTitle['section_title'] . '
                            </a>
                        </h4>
                    </div>
                    <div id="collapse' . $sectionTitle['id'] . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $sectionTitle['id'] . '">
                        <div class="panel-body">
                        <a href="#" onclick="setSection('.$sectionTitle['id'].');" class="btn btn-themecolor btn-sm" data-toggle="modal" data-target="#content-modal"><i
                                class="mdi mdi-plus"></i> Add new subsection </a>   
                            <hr>';
                    $subsections = $db->getSectionContentByID($facility['id'], $sectionTitle['id']);
                    foreach ($subsections as $subsection) {
                        echo '
                            <h5>' . $subsection['sub_title'] . '</h5><a href="' . $subsection['id'] . '"><i class="mdi mdi-pencil"></i> </a>
                            ' . $subsection['content'] . '
                            <hr>
                            ';}
                    echo '
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>

            <!--end accordion-->

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-themecolor pull-right" data-toggle="modal" data-target="#hw-modal"><i
                            class="mdi mdi-plus"></i> Add new </a> Health workers
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table .color-table .purple-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allHW as $hw) {
                            $status = !is_null($hw['status']) ? $hw['status'] : 'Active';
                            echo '<tr>
                        <td>
                            ' . $hw['surname'] . '
                        </td>
                        <td>
                            ' . $hw['first_name'] . '
                        </td>
                        <td>
                            ' . $hw['position'] . '
                        </td>
                         <td>
                         <span class="label label-rounded label-' . getColor($status) . ' mb-3 mr-3">
                            ' . $status . '
                         </span>
                        </td>
                        <td ><a href="' . BASE_PATH . 'hw/detail/' . $hw['id'] . '/" ><i class="mdi mdi-pencil"></i> </a></td>
                    </tr>';
                        } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- hw modal -->
    <div id="hw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Health Worker</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="hw-search" class="control-label">Health worker Number:</label>
                            <input type="text" class="form-control" id="hw-search" name="hw-hw-search"
                                   placeholder="Enter HW number" required="required" onkeyup="search(this.value)">
                        </div>
                        <div id="hw-table"></div>
                        <div class="form-group">
                            <label for="hw-search" class="control-label">Position:</label>
                            <input type="text" class="form-control" id="position" name="position"
                                   placeholder="Enter HW Position" required="required" onkeyup="search(this.value)">
                        </div>
                        <input id="hw-id" name="hw-id" hidden="hidden" required="required">
                        <input id="fc-id" name="fc-id" hidden="hidden">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->

    <!-- hw modal -->
    <div id="section-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Section</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="section-title" name="section-title"
                                   placeholder="Enter Section Title" required="required">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
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

    <!-- hw modal -->
    <div id="content-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Sub-Section</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="subsection-title" name="subsection-title"
                                   placeholder="Enter SubSection Title" required="required">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="subsection-content" name="subsection-content"
                                      placeholder="Enter SubSection Content" rows="5" required="required"></textarea>
                        </div>
                        <input name="subsection-id"  id="subsection-id" value="" hidden="hidden">
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

</div>
<script>
    function search(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                var tbl = '<table class="table table-striped">\n' +
                    '\n' +
                    '                                        <tbody>\n' +
                    '                                            <tr>\n' +
                    '                                                <td>' + myArr["hw"]["id"] + '</td>\n' +
                    '                                                <td>' + myArr["hw"]["surname"] + '</td>\n' +
                    '                                                <td>' + myArr["hw"]["first_name"] + '</td>\n' +
                    '                                                <td class="text-nowrap">\n' +
                    '                                                    <a href="<?php echo BASE_PATH?>hw/detail/' + myArr["hw"]["id"] + '/" class="btn btn-primary btn-sm"> <i class="fa fa-search text-white"></i> </a>\n' +
                    '                                                    <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light"><i class="fa fa-plus text-white"></i></button>\n' +
                    '                                                </td>\n' +
                    '                                            </tr>\n' +
                    '                                            \n' +
                    '                                              \n' +
                    '                                        </tbody>\n' +
                    '                                    </table>';
                document.getElementById("hw-id").value = myArr["hw"]['id'];
                document.getElementById("fc-id").value =<?php echo $facility['id'] ?>;
                document.getElementById("hw-table").innerHTML = myArr['error'] === false ? tbl : "Not found";

            }
        };
        xmlhttp.open("GET", "<?php echo BASE_PATH?>hw/api/byID/" + str + "/", true);
        xmlhttp.send();
    }
    function setSection(id){
        document.getElementById('subsection-id').value=id
    }
</script>

