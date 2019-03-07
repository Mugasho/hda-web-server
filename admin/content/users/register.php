<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 5:58 PM
 */
?>

<section id="wrapper">
    <div class="login-register" style="background-image:url(<?php echo BASE_PATH.'vendor/img/login-register.jpg';?>);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="<?php echo ADMIN_PATH.'register/'?>" method="post">
                    <h3 class="box-title m-b-20">Sign Up for Free</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control"  required="required" placeholder="Username" id="username" name="username"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control"  required="required" placeholder="Phone Number" id="phone" name="phone"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="required" placeholder="Email" id="email" name="email"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" id="password" name="password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Repeat Password" id="repeat-password" name="repeat-password"> </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <div>Already have an account? <a href="<?php echo ADMIN_PATH?>login/" class="text-info m-l-5"><b>Sign in</b></a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>