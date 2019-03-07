<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/4/2019
 * Time: 2:16 PM
 */
$db = new Hda\database\db();
$hw = $this->getPageVars();
$id=$this->getPageVars2();
$qualifications=$db->getTrainingsByID($id,1);
$trainings=$db->getTrainingsByID($id,2);
$positions=$db->getHwPositions($id);
?>

<div class="row">
    <div class="col-xl-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-sm pull-right" href="<?php echo ADMIN_PATH.'hw/edit/'.$id.'/'?>"><i class="ti-pencil"></i> Edit</a>
                <h4 class="panel-title"><?php echo $this->getPageTitle() ?></h4>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class=""><img src="<?php echo !empty($hw['profile_pic'])?$hw['profile_pic']:VENDOR.'img/doctor.png' ?>" alt="user"
                                       class="img-circle" width="100"></div>
                    <div class="col-lg-4 b-r">
                        <h3 class="font-medium"><?php echo $hw['surname']. ' '.$hw['first_name'];?></h3>
                        <h6><?php echo $hw['email'] ?></h6>
                        <h6><?php echo $hw['phone'] ?></h6>
                        <h6><?php echo $hw['address'] ?></h6>
                        <hr>
                        <h6><strong><?php echo $hw['council'] ?></strong></h6>

                    </div>

                    <div class="col-lg-6">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <h5><strong>Qualification</strong></h5>
                                <h6><?php echo $hw['qualification'] ?> and economics</h6>
                            </tr>
                            <tr>
                                <h5><strong>License</strong></h5>
                                <h6><?php echo $hw['license'] ?></h6>
                            </tr>
                            <tr>
                                <h5><strong>Registration</strong></h5>
                                <h6><?php echo $hw['reg_no'] ?></h6>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row m-t-40">
                    <div class="col b-r text-center">
                        <h2 class="font-light"><?php echo count($positions)?></h2>
                        <h6>Job Positions</h6></div>
                    <div class="col b-r text-center">
                        <h2 class="font-light"><?php echo count($qualifications)?></h2>
                        <h6>Qualifications</h6></div>
                    <div class="col text-center">
                        <h2 class="font-light"><?php echo count($trainings)?></h2>
                        <h6>Trainings</h6></div>
                </div>
            </div>
            <div class="card-header">
                <h4 class="panel-title">About me</h4>
            </div>
            <div class="card-body">
                <p><?php echo $hw['notes'] ?></p>
            </div>
            <div class="card-header">
                <button class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#training-modal"><i class="mdi mdi-plus"></i> Add</button>
                <h4 class="panel-title">Trainings</h4>
            </div>
            <table class="table table-hover">
                <tbody>
                <?php foreach ($trainings as $training){
                    echo '<tr>
                    <td>
                        <h5><strong>'.$training['school'].'</strong></h5>
                        <h6>'.$training['award'].'</h6>
                        <h6>'.$training['started'].'-'.$training['ended'].'</h6>
                    </td>
                    <td><a href="?act=1e&itm='.$training['id'].'"><i class="mdi mdi-delete"></i> </a></td>
                </tr>';
                }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#qualification-modal"><i class="mdi mdi-plus"></i> Add</button>
                <h4 class="panel-title">Qualifications</h4>
            </div>
            <table class="table table-hover">
                <tbody>
                <?php foreach ($qualifications as $qualification){
                    echo '<tr>
                    <td>
                        <h5><strong>'.$qualification['school'].'</strong></h5>
                        <h6>'.$qualification['award'].'</h6>
                        <h6>'.$qualification['started'].'-'.$qualification['ended'].'</h6>
                    </td>
                    <td><a href="?act=1e&itm='.$qualification['id'].'"><i class="mdi mdi-delete"></i> </a></td>
                </tr>';
                }?>
                </tbody>
            </table>



            <div class="card-header">
                <h4 class="panel-title">Job Positions</h4>
            </div>
            <table class="table table-hover">
                <tbody>
                <?php foreach ($positions as $position){
                    echo '<tr>
                    <td>
                        <h5><strong>'.$position['facility'].'</strong></h5>
                        <h6>'.$position['position'].'</h6>
                    </td>
                    <td>
                    <a href="?act=1e&itm='.$position['id'].'"><i class="mdi mdi-check"></i> </a>
                    <a href="?act=1e&itm='.$position['id'].'"><i class="mdi mdi-delete"></i> </a>
                    </td>
                </tr>';
                }?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- qualification modal -->
<div id="qualification-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Qualification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="award" name="award"
                               placeholder="Award" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="school" name="school"
                               placeholder="Institution" required="required">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control" id="started" name="started"
                                   placeholder="Started" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control" id="ended" name="ended"
                                   placeholder="Ended" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" class="form-control" id="notes" name="notes"
                                  placeholder="notes" required="required"></textarea>
                    </div>
                    <input name="type" id="type" value="1" hidden="hidden" title="type">
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

<!-- training modal -->
<div id="training-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Training</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="award" name="award"
                               placeholder="Training" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="school" name="school"
                               placeholder="Institution" required="required">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control" id="started" name="started"
                                   placeholder="Started" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control" id="ended" name="ended"
                                   placeholder="Ended" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" class="form-control" id="notes" name="notes"
                                  placeholder="notes" required="required"></textarea>
                    </div>
                    <input name="type" id="type" value="2" hidden="hidden" title="type">
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

<!-- Edit hw modal -->
<div id="edit-hw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Health worker</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="award" name="award"
                               placeholder="Training" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="school" name="school"
                               placeholder="Institution" required="required">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control" id="started" name="started"
                                   placeholder="Started" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control" id="ended" name="ended"
                                   placeholder="Ended" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" class="dropify" id="profile-pic" name="profile-pic"
                               placeholder="Profile pic" required="required">
                    </div>
                    <input name="type" id="type" value="2" hidden="hidden" title="type">
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

