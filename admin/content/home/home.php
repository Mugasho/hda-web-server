<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/4/2018
 * Time: 11:28 PM
 */

?>

<!-- STATISTIC-->

<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-pill text-info"></i></h2>
                    <h3 class=""><?php echo $this->getPageVars()['drug_count'];?></h3>
                    <h6 class="card-subtitle">Drugs</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-hospital-building text-success"></i></h2>
                    <h3 class=""><?php echo $this->getPageVars()['facilities'];?></h3>
                    <h6 class="card-subtitle">Facilities</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-account-multiple text-purple"></i></h2>
                    <h3 class=""><?php echo $this->getPageVars()['hw_count'];?></h3>
                    <h6 class="card-subtitle">Health Workers</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-account-settings-variant text-warning"></i></h2>
                    <h3 class="">20</h3>
                    <h6 class="card-subtitle">Users</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
