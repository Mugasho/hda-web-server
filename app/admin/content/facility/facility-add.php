<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 1/28/2019
 * Time: 11:40 PM
 */

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-primary">
                Registration Information <a href="<?php echo ADMIN_PATH . 'facility/' ?>"
                                            class="btn btn-info pull-right"><i class="mdi mdi-view-list"></i> Facilities </a>
            </div>
            <form action="<?php echo ADMIN_PATH . 'facility/add/' ?>" method="post">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="facility">Name of Facility</label>
                            <input type="text" class="form-control" id="facility" name="facility" required="required" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="license">License</label>
                            <input type="text" class="form-control" id="license" name="license">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required="required">
                                <option value="">--Select category--</option>
                                <option>Hospital</option>
                                <option>Clinic</option>

                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="product-type">Sector</label>
                            <select  class="form-control" id="sector" name="sector" required="required">
                                <option value="">--Select sector--</option>
                                <option>Govt</option>
                                <option>Private</option>
                                <option>PNFP</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="address">Detailed Address</label>
                            <textarea id="address" name="address" rows="5"
                                      class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-header text-primary">
                    Contact information
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="contact">Contact Name</label>
                            <input type="text" class="form-control" id="contact" name="contact">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="qualification">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="location">Address</label>
                            <textarea id="location" name="location" rows="5"
                                      class="form-control"></textarea>
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

