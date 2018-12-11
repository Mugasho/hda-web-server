<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 11/27/2018
 * Time: 8:07 AM
 */
?>

<div class="p-front__content">

    <div class="p-signup">
        <form class="p-signup__form" method="post" action="register.php">
            <input hnameden name="mobile">
            <h2 class="p-signup__form-heading">Register for HDA</h2>
            <div class="p-signup__form-content">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="first-name">First Name</label>
                        <input  class="form-control" name="first-name" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p-signup-last-name">Last Name</label>
                        <input  class="form-control" name="last-name" placeholder="Last Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="email">Work Email</label>
                        <input type="email" class="form-control" name="email" placeholder="you@yourcompany.com" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="password">Set Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password (min 8 characters)" required>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="repeat-password" >Repeat Password</label>
                    <input type="password" class="form-control" name="repeat-password" placeholder="Repeat Password (min 8 characters)" required>
                  </div>
                </div>

                <ul class="form-group p-signup__form-password-hints">
                    <li>One lowercase character</li>
                    <li>One number</li>
                    <li>One uppercase character</li>
                    <li>8 characters minimum</li>
                </ul>

                <div>
                    <button  class="btn btn-info btn-block btn-lg p-signup__form-submit">Get Started!</button>
                </div>

                <div class="p-signup__form-links">
                    <div class="p-signup__form-link">
                        By creating an account, you agree to our <a href="#" class="link-info">Terms</a>
                    </div>
                    <div class="p-signup__form-link">
                        Already have an account? <a href="login.php" class="link-info">Sign In</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
