<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/7/2018
 * Time: 8:35 PM
 */

$drug = $this->getPageVars();
$allBatch = $this->getPageVars2();


function getColor($reason)
{
    switch ($reason) {
        case 'safe':
            $color = 'success';
            break;
        case 'trial':
            $color = 'lasur';
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
                <b><?php echo strtoupper($drug['name_of_drug']) ?></b>
                <div class="btn-group pull-right">
                    <a href="#" class="btn btn-themecolor"><i class="mdi mdi-pencil"></i> </a>
                    <a href="#" class="btn btn-themecolor "><i class="mdi mdi-delete"></i> </a>
                    <a href="<?php echo BASE_PATH . 'drugs/' ?>" class="btn btn-themecolor "><i
                                class="mdi mdi-view-grid"></i> </a>
                </div>

            </div>
            <!--accordion-->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading1">
                        <!----> <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1"
                               aria-expanded="false" aria-controls="collapse1">
                                Basic information
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body">
                            <h5>Name of Drug</h5><?php echo $drug['name_of_drug'] ?>
                            <hr>
                            <h5>Strength</h5><?php echo $drug['strength_of_drug'] ?>
                            <hr>
                            <h5>Name of Drug</h5><?php echo $drug['name_of_drug'] ?>
                            <hr>
                            <h5>Strength</h5><?php echo $drug['strength_of_drug'] ?>
                            <hr>
                            <h5>Dosage form</h5><?php echo $drug['dosage_form'] ?>
                            <hr>
                            <h5>Pack size</h5><?php echo $drug['pack_size'] ?>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading2">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                Manufacturer
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body">
                            <h5>Registration Number</h5><?php echo $drug['nda_registration_no'] ?>
                            <hr>
                            <h5>Manufacturer</h5><?php echo $drug['manufacturer'] ?>
                            <hr>
                            <h5>Dosage form</h5> <?php echo $drug['dosage_form'] ?>
                            <hr>
                            <h5>Country of origin</h5><?php echo $drug['country_of_manufacture'] ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading3">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                Medicine Description
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading3">
                        <div class="panel-body">
                            <p>content</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseFour" aria-expanded="false" aria-controls="collapse3">
                                Dose & Frequency
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading3">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading5">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                Pharmacology
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading5">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading6">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                Administration
                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading6">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading7">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                Contraindications
                            </a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading7">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading8">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                Interactions
                            </a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading8">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading9">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                Pregnancy & Breastfeeding
                            </a>
                        </h4>
                    </div>
                    <div id="collapse9" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading9">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading10">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                Side effects
                            </a>
                        </h4>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading3">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading11">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                               Precautions during use
                            </a>
                        </h4>
                    </div>
                    <div id="collapse11" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading11">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading12">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                Storage
                            </a>
                        </h4>
                    </div>
                    <div id="collapse12" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading12">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading13">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                Pharmacists advice
                            </a>
                        </h4>
                    </div>
                    <div id="collapse13" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="heading13">
                        <div class="panel-body">
                            <p>tab contents</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--end accordion-->

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-themecolor pull-right" data-toggle="modal" data-target="#batch-modal"><i
                            class="mdi mdi-plus"></i> Add new </a> Batch Numbers
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table .color-table .purple-table">
                        <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Date</th>
                            <th>Expiry</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allBatch as $batch) {
                            $reason = !is_null($batch['reason']) ? $batch['reason'] : 'safe';
                            echo '<tr>
                        <td>
                            ' . $batch['batchno'] . '
                        </td>
                        <td>
                            ' . date("Y", strtotime($batch['made'])) . '
                        </td>
                        <td>
                            ' . date("Y", strtotime($batch['expiry'])) . '
                        </td>
                         <td>
                         <span class="label label-rounded label-' . getColor($reason) . ' mb-3 mr-3">
                            ' . $reason . '
                         </span>
                        </td>
                        <td ><a href="#" ><i class="mdi mdi-download"></i> </a></td>
                    </tr>';
                        } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Batch modal -->
    <div id="batch-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Batch Number</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="batch-no" class="control-label">Batch Number:</label>
                            <input type="text" class="form-control" id="batch-no" name="batch-no" required="required">
                        </div>
                        <div class="form-group">
                            <label for="dom" class="control-label">Manufacture date</label>
                            <input type="date" class="form-control" id="dom" name="dom">
                        </div>
                        <div class="form-group">
                            <label for="expiry" class="control-label">Expiry</label>
                            <input type="date" class="form-control bootstrapMaterialDatePicker" id="expiry"
                                   name="expiry">
                        </div>
                        <div class="form-group">
                            <label for="notes" class="control-label">Reason:</label>
                            <textarea class="form-control" id="reason" name="reason"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->


</div>

