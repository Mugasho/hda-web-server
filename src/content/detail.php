<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/7/2018
 * Time: 8:35 PM
 */

$drug = $this->getPageVars();
$allBatch = $this->getPageVars2();


function getColor($reason){
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

<div class="row widget-activity">


    <div class="col-lg-6">
        <div class="card" style="height: 80%">
            <div class="card-header">
                <h4 class="card-title"> <?php echo $drug['name_of_drug'] ?></h4>
            </div>
            <div class="card-body">

                <ul class="nav nav-tabs widget-tabs__tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Basic Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Drug details</a>
                    </li>
                </ul>
                <div class="tab-content pl-3 p-1" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel"
                         aria-labelledby="home-tab">

                        <p>

                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-widget-document widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">Generic
                                        Name </a></div>
                                <span class="widget-notifications__date"><?php echo $drug['generic_name_of_drug'] ?></span>
                            </div>
                        </div>
                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-widget-document widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">Strength</a>
                                </div>
                                <span class="widget-notifications__date"><?php echo $drug['strength_of_drug'] ?></span>
                            </div>
                        </div>
                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-widget-document widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">Dosage
                                        form </a></div>
                                <span class="widget-notifications__date"><?php echo $drug['dosage_form'] ?></span>
                            </div>
                        </div>
                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-widget-document widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">Pack
                                        size</a></div>
                                <span class="widget-notifications__date"><?php echo $drug['pack_size'] ?></span>
                            </div>
                        </div>

                        </p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>
                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-widget-document widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">NDA
                                        Registration No </a></div>
                                <span class="widget-notifications__date"><?php echo $drug['nda_registration_no'] ?></span>
                            </div>
                        </div>
                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-widget-document widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">Manufacturer</a>
                                </div>
                                <span class="widget-notifications__date"><?php echo $drug['manufacturer'] ?></span>
                            </div>
                        </div>
                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-cart widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">Local
                                        Distributor </a></div>
                                <span class="widget-notifications__date"><?php echo $drug['local_technical_representative'] ?></span>
                            </div>
                        </div>
                        <div class="widget-notifications__item">
                            <span class="iconfont iconfont-map widget-notifications__item-icon"></span>
                            <div class="widget-notifications__info">
                                <div class="widget-notifications__name"><a href="#" class="widget-notifications__user">Country</a>
                                </div>
                                <span class="widget-notifications__date"><?php echo $drug['country_of_manufacture'] ?></span>
                            </div>
                        </div>

                        </p>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h3>Menu 2</h3>
                        <p>Some content here.</p>
                    </div>
                </div>
                </ul>
            </div>

        </div>
    </div>
    <!--/.col-->


    <div class="col-lg-6">
        <div class="card " style="height: 80%">
            <div class="card-header">
                <h4 class="card-title"> Batch Numbers</h4>
            </div>
            <div class="card-body">
                <p>
                <div class="m-datatable">
                    <table id="datatable" class="table dataTable table-striped">
                        <thead>
                        <tr>
                            <th>Batch</th>
                            <th>DOM</th>
                            <th>EXP</th>
                            <th>Reason</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allBatch as $batch) {
                            $reason=!is_null($batch['reason'])?$batch['reason']:'safe';
                            echo '<tr>
                        <td>
                            ' . $batch['batchno'] . '
                        </td>
                        <td>
                            ' . $batch['made'] . '
                        </td>
                        <td>
                            ' . $batch['expiry'] . '
                        </td>
                         <td>
                         <span class="badge badge-sm badge-outline-'.getColor($reason).' mb-3 mr-3">
                            ' . $reason. '
                         </span>
                        </td>
                        <td class="table__cell-compact"><a href="#" class="iconfont iconfont-download-outline table__cell-actions-icon"></a></td>
                    </tr>';
                        } ?>

                        </tbody>
                    </table>
                </div>

                </p>
            </div>
            <div class="card-footer"><button class="btn btn-rounded float-right">Add batch no</button> </div>
        </div>
    </div>
    <!--/.col-->

    <!--/.col-->


    <!--/.col-->


</div>

