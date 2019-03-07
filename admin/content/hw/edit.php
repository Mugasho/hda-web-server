<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/12/2019
 * Time: 5:38 PM
 */
$db=new \Hda\database\db();
$hw=$db->getHwByID($this->getPageVars());

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-primary">
                Contact Information <a href="<?php echo ADMIN_PATH . 'hw/' ?>"
                                       class="btn btn-info pull-right"><i class="mdi mdi-view-list"></i> Health
                    workers </a>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="names">Surname</label>
                            <input type="text" value="<?php echo $hw['surname']?>" class="form-control" id="surname" name="surname" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="names">First Name</label>
                            <input type="text" value="<?php echo $hw['surname']?>" class="form-control" id="first_name" name="first_name" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="names">Other Names</label>
                            <input type="text" value="<?php echo $hw['other_names']?>" class="form-control" id="other_names" name="other_names" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="title">Title</label>
                            <select class="form-control" id="title" name="title">
                                <option selected><?php echo $hw['title']?></option>
                                <option value="">--select title--</option>
                                <option>Dr</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Miss</option>
                                <option>Prof</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="phone">Phone</label>
                            <input type="text" value="<?php echo $hw['phone']?>" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">email</label>
                            <input type="email" value="<?php echo $hw['email']?>" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="address">Address</label>
                            <textarea value="<?php echo $hw['address']?>" id="address" name="address" rows="5"
                                      class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-header text-primary">
                    Registration information
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-lg-6">
                            <label for="reg_no">RegNo</label>
                            <input type="text" value="<?php echo $hw['reg_no']?>" class="form-control" id="reg_no" name="reg_no" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="qualification">Qualification</label>
                            <input type="text" value="<?php echo $hw['qualification']?>" class="form-control" id="qualification" name="qualification">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="council">Professional Council</label>
                            <input type="text" value="<?php echo $hw['council']?>" class="form-control" id="council" name="council">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="license">License No</label>
                            <input type="text" value="<?php echo $hw['license']?>" class="form-control" id="license" name="license">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="reg_date">Registration date</label>
                            <input type="date" value="<?php echo $hw['reg_date']?>" class="form-control" id="reg_date" name="reg_date">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required="required">
                                <option selected><?php echo $hw['status']?></option>
                                <option value="">--select status--</option>
                                <option>Active</option>
                                <option>Inactive</option>

                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="notes">About me</label>
                            <textarea value="<?php echo $hw['notes']?>" id="notes" name="notes" rows="5"
                                      class="form-control"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="profile-pic">Profile Picture</label>
                            <input type="file" class="dropify" id="profile-pic" name="profile-pic" value="<?php echo $hw['profile_pic']?>"
                                   data-default-file="<?php echo $hw['profile_pic']?>" placeholder="Profile pic" >
                        </div>
                        <input hidden value="<?php echo $hw['profile_pic']?>" title="profile_pic" name="profile-pic" id="profile-pic">
                    </div>

                </div>
                <div class="card-footer text-lg-center">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
