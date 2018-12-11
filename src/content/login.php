<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 5:58 PM
 */
?>

<div class="p-front__content">

    <div class="p-signin">
        <form class="p-signin__form" method="post">

            <h2 class="p-signin__form-heading">Login</h2>
            <div class="p-signin__form-content">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="p-signin-work-email">Work Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@yourcompany.com">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="p-signin-set-password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div>
                    <button  class="btn btn-info btn-block btn-lg p-signin__form-submit">Get Started!</button>
                </div>
                <div class="p-signin__form-links">
                    <div class="p-signin__form-link">
                        Don't have an account? <a href="register.php" class="link-info">Sign Up</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>