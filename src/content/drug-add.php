<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/19/2018
 * Time: 12:09 AM
 */
?>

<form name="form1" action="add.php" method="post">
    <div id="form-wizard-b" class="main-container form-wizard-b">
        <ul class="form-wizard-b__steps">
            <li class="form-wizard-b__step is-current" data-step="1">
        <span class="form-wizard-b__step-point">
          <span class="form-wizard-b__step-point-value">1</span>
          <span class="iconfont iconfont-circle-check form-wizard-b__step-point-completed-icon"></span>
        </span>
                <span class="form-wizard-b__step-info">
          <span class="form-wizard-b__step-name">Company</span>
          <span class="form-wizard-b__step-desc">Details of Origin</span>
        </span>
            </li>
            <li class="form-wizard-b__step" data-step="2">
        <span class="form-wizard-b__step-point">
          <span class="form-wizard-b__step-point-value">2</span>
          <span class="iconfont iconfont-circle-check form-wizard-b__step-point-completed-icon"></span>
        </span>
                <span class="form-wizard-b__step-info">
          <span class="form-wizard-b__step-name">Basic</span>
          <span class="form-wizard-b__step-desc">Drug information</span>
        </span>
            </li>
            <li class="form-wizard-b__step" data-step="3">
        <span class="form-wizard-b__step-point">
          <span class="form-wizard-b__step-point-value">3</span>
          <span class="iconfont iconfont-circle-check form-wizard-b__step-point-completed-icon"></span>
        </span>
                <span class="form-wizard-b__step-info">
          <span class="form-wizard-b__step-name">Detailed information</span>
        </span>
            </li>
        </ul>
        <div class="form-wizard-b__body">
            <div class="form-wizard-b__step-content is-current" data-step-content="1">

                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="product-title">NDA Registration</label>
                                <input type="text" class="form-control" id="nda_registration_no"
                                       placeholder="NDA Registration" required>
                            </div>
                            <div class="form-group">
                                <label for="product-subtitle">Local Distributor</label>
                                <input type="text" class="form-control" id="local_technical_representative"
                                       placeholder="Local distributor" value="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="product-type">Licence holder</label>
                                <input type="text" class="form-control" id="license_holder"
                                       placeholder="Licence holder">
                            </div>
                            <div class="form-group">
                                <label for="product-year">Country of origin</label>
                                <input type="text" class="form-control" id="country_of_manufacture"
                                       placeholder="country of origin">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="product-desc">Manufacturer</label>
                                <textarea id="manufacturer" rows="5" class="form-control"
                                          placeholder="Address of the manufacturer"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-wizard-b__step-content" data-step-content="2">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="product-title">Name of Drug</label>
                                <input type="text" class="form-control" id="name_of_drug" placeholder="Brand name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="product-subtitle">Generic Name</label>
                                <input type="text" class="form-control" id="generic_name_of_drug"
                                       placeholder="Drug composition" value="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="product-type">Dosage form</label>
                                <input type="text" class="form-control" id="dosage_form" placeholder="Dispensed as">
                            </div>
                            <div class="form-group">
                                <label for="product-year">Pack size</label>
                                <input type="text" class="form-control" id="pack_size" placeholder="Size of pack">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="product-desc">Strength of drug</label>
                                <textarea id="strength_of_drug" rows="5" class="form-control"
                                          placeholder="Strength of drug"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-wizard-b__step-content " data-step-content="3"><h1>content 3</h1></div>
        </div>
        <div class="form-wizard-b__controls">
            <div class="form-wizard-b__tip">
                <a href="#" class="link-info">Tips</a><br>
                <span class="text-muted">Choose a more detailed name of your product, but keep it short.</span>
            </div>
            <div>
                <a href="#" class="btn btn-secondary form-wizard-b__control-prev disabled" data-step-control-prev="">Back</a>
                <a href="#" class="btn btn-info form-wizard-b__control-next " data-step-control-next="">Next</a>
                <button class="btn btn-success" type="button" name="btn_submit" onclick="formhash(this.form)">Submit
                </button>
            </div>
        </div>
    </div>
</form>
