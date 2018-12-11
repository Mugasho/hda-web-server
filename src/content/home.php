<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/4/2018
 * Time: 11:28 PM
 */

?>

<!-- STATISTIC-->

    <div class="content-description">Welcome to Health Directory App</div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="widget widget-alpha widget-alpha--color-amaranth">
                <div>
                    <div class="widget-alpha__amount"><?php echo $this->getPageVars()['drug_count'];?></div>
                    <div class="widget-alpha__description">Drugs</div>
                </div>
                <span class="widget-alpha__icon iconfont iconfont-helpdesk-insights"></span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="widget widget-alpha widget-alpha--color-green-jungle">
                <div>
                    <div class="widget-alpha__amount">156</div>
                    <div class="widget-alpha__description">Health Workers</div>
                </div>
                <span class="widget-alpha__icon iconfont iconfont-user-outline"></span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="widget widget-alpha widget-alpha--color-orange widget-alpha--donut">
                <div>
                    <div class="widget-alpha__amount"><?php echo $this->getPageVars()['facilities'];?></div>
                    <div class="widget-alpha__description">Facilities</div>
                </div>
                <span class="widget-alpha__icon iconfont iconfont-helpdesk-newsroom"></span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
                <div>
                    <div class="widget-alpha__amount">425</div>
                    <div class="widget-alpha__description">Support Tickets</div>
                </div>
                <span class="widget-alpha__icon iconfont iconfont-help-outline"></span>
            </div>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="widget widget-tabs widget-index-chart">
                <div class="widget-tabs__header">
                    <div>
                        Weight vs weather
                    </div>
                    <ul class="nav nav-tabs widget-tabs__tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#widget-ww-all-accounts">All Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#widget-ww-all-account2">Account 2</a>
                        </li>
                    </ul>
                </div>
                <div class="widget-tabs__content">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="widget-ww-all-accounts">
                            <div class="dropdown widget-index-chart__select-date">
                                <button class="btn btn-select btn-rounded dropdown-toggle" type="button" data-toggle="dropdown">Jan-Feb 2017</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Jan-Feb 2017</a>
                                    <a class="dropdown-item" href="#">Feb-Apr 2017</a>
                                    <a class="dropdown-item" href="#">Apr-Dec 2017</a>
                                </div>
                            </div>
                            <div id="widget-index-chart-container" class="widget-index-chart__container"></div>
                            <div class="widget-index-chart__items">
                                <div class="widget-index-chart__item widget-index-chart__item--yellow">
                                    <span>Your index</span>
                                    <span>17%</span>
                                </div>
                                <div class="widget-index-chart__item widget-index-chart__item--green">
                                    <span>Another index</span>
                                    <span>25%</span>
                                </div>
                                <div class="widget-index-chart__item widget-index-chart__item--grey">
                                    <span>Foreign</span>
                                    <span>10%</span>
                                </div>
                                <div class="widget-index-chart__item widget-index-chart__item--orange">
                                    <span>US Bond</span>
                                    <span>7%</span>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="widget-ww-all-account2">Widget tab content</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12">
            <div class="widget widget-controls widget-table widget-summary">
                <div class="widget-controls__header">
                    <div>
                        Portfolio Summary
                    </div>
                    <div class="widget-controls__header-controls">
                        <span class="widget-controls__header-control iconfont iconfont-settings"></span>
                    </div>
                </div>
                <div class="progress progress-lg">
                    <div class="progress-bar bg-emerland" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">55%</div>
                    <div class="progress-bar bg-kournikova" role="progressbar" style="width: 35%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">35%</div>
                    <div class="progress-bar bg-coral-light" role="progressbar" style="width: 10%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">10%</div>
                </div>
                <div class="widget-controls__content js-scrollable">
                    <table class="table table-no-border table-striped">
                        <thead>
                        <tr>
                            <th>Assets class</th>
                            <th>Goals</th>
                            <th>Amount</th>
                            <th>Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="table__tag table__tag--green">Cash</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--orange">International Bonds</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--orange">US Bonds</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--yellow">International Stocks</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--blue">International Stocks</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--green">Cash</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--orange">International Bonds</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--orange">US Bonds</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--yellow">International Stocks</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        <tr>
                            <td><span class="table__tag table__tag--blue">International Stocks</span></td>
                            <td>17%</td>
                            <td>23%</td>
                            <td>$12,423</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>-->
<!-- END PAGE CONTAINER-->
