<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 1/28/2019
 * Time: 11:21 PM
 */

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-primary">
                Contact Information <a href="<?php echo ADMIN_PATH .'hw/' ?>"
                                       class="btn btn-info pull-right"><i class="mdi mdi-view-list"></i> Health
                    workers </a>
            </div>
            <form action="<?php echo ADMIN_PATH . 'hw/add/' ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="names">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="names">Other Names</label>
                            <input type="text" class="form-control" id="other_names" name="other_names">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="title">Title</label>
                            <select class="form-control" id="title" name="title">
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
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="5"
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
                            <input type="text" class="form-control" id="reg_no" name="reg_no" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="qualification">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="council">Professional Council</label>
                            <input type="text" class="form-control" id="council" name="council">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="license">License No</label>
                            <input type="text" class="form-control" id="license" name="license">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="reg_date">Registration date</label>
                            <input type="date" class="form-control" id="reg_date" name="reg_date">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required="required">
                                <option value="">--select status--</option>
                                <option>Active</option>
                                <option>Inactive</option>

                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="reg_date">Institution</label>
                            <input type="text"  class="form-control" id="institution" name="institution">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="status">Nationality</label>
                            <select class="form-control" id="nationality" name="nationality"  >
                                <option value="">--select nationality--</option>
                                <option>Uganda</option>
                                <option>Kenya</option>

                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="notes">Notes</label>
                            <textarea id="notes" name="notes" rows="5"
                                      class="form-control"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="profile-pic">Profile Picture</label>
                            <input type="file" class="dropify" id="profile-pic" name="profile-pic"
                                   placeholder="Profile pic" required="required">
                        </div>
                    </div>

                </div>
                <div class="card-footer text-lg-center">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
