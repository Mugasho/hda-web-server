<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/19/2019
 * Time: 12:26 AM
 */

$db=new \Hda\database\db();
$next_id = null;
$search = null;
$allhws = array();
$limit=isset($_GET['limit'])?$_GET['limit']:30;
if (isset($_POST['next_id'])) {
    $next_id = $_POST['next_id'];
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
$hws = $db->get_hws($limit, $next_id, $search);
if (!empty($allhws)) {
    $next_id = $allhws[count($allhws) - 1]['id'];
}
?>

<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?php echo VENDOR ;?>hunt/images/resource/section_bg_health_large.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><?php echo $this->getPageTitle();?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
            <div class="row no-gape">
                <aside class="col-lg-4 column border-right">
                    <form method="get" name="search_form">
                    <div class="widget">
                        <div class="search_widget_job">
                            <div class="field_w_search">
                                <input type="text" placeholder="Search Keywords" id="search" name="search" onkeyup="search_input('search',this.value)" />
                                <i class="la la-search"></i>
                            </div><!-- Search Widget -->
                            <div class="field_w_search">
                                <input type="text" placeholder="All Locations" id="location" name="location" onkeyup="search_input('search',this.value)"/>
                                <i class="la la-map-marker"></i>
                            </div><!-- Search Widget -->
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="sb-title open">Status</h3>
                        <div class="type_widget">
                            <p class="flchek"><input type="checkbox" name="choosetype" id="33r"><label for="33r">Inactive (9)</label></p>
                            <p class="ftchek"><input type="checkbox" name="choosetype" id="dsf"><label for="dsf">Active (8)</label></p>
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="sb-title closed">Speciality</h3>
                        <div class="specialism_widget">
                            <div class="field_w_search">
                                <input type="text" placeholder="Search Spaeciality" />
                            </div><!-- Search Widget -->
                            <div class="simple-checkbox scrollbar">
                                <p><input type="checkbox" name="spealism" id="as"><label for="as">Accountancy (2)</label></p>
                                <p><input type="checkbox" name="spealism" id="asd"><label for="asd">Banking (2)</label></p>
                                <p><input type="checkbox" name="spealism" id="errwe"><label for="errwe">Charity & Voluntary (3)</label></p>
                                <p><input type="checkbox" name="spealism" id="fdg"><label for="fdg">Digital & Creative (4)</label></p>
                                <p><input type="checkbox" name="spealism" id="sc"><label for="sc">Estate Agency (3)</label></p>
                                <p><input type="checkbox" name="spealism" id="aw"><label for="aw">Graduate (2)</label></p>
                                <p><input type="checkbox" name="spealism" id="ui"><label for="ui">IT Contractor (7)</label></p>
                                <p><input type="checkbox" name="spealism" id="saas"><label for="saas">Charity & Voluntary (3)</label></p>
                                <p><input type="checkbox" name="spealism" id="rrrt"><label for="rrrt">Digital & Creative (4)</label></p>
                                <p><input type="checkbox" name="spealism" id="eweew"><label for="eweew">Estate Agency (3)</label></p>
                                <p><input type="checkbox" name="spealism" id="bnbn"><label for="bnbn">Graduate (2)</label></p>
                                <p><input type="checkbox" name="spealism" id="ffd"><label for="ffd">IT Contractor (7)</label></p>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="sb-title closed">Gender</h3>
                        <div class="specialism_widget">
                            <div class="simple-checkbox">
                                <p><input type="checkbox" name="smplechk" id="13"><label for="13">Male</label></p>
                                <p><input type="checkbox" name="smplechk" id="14"><label for="14">Female</label></p>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="sb-title closed">Qualification</h3>
                        <div class="specialism_widget">
                            <div class="simple-checkbox">
                                <p><input type="checkbox" name="phd" id="phd"><label for="phd">Phd</label></p>
                                <p><input type="checkbox" name="masters" id="masters"><label for="masters">Masters</label></p>
                                <p><input type="checkbox" name="bachelors" id="bachelors"><label for="bachelors">Bachelors</label></p>
                                <p><input type="checkbox" name="certificate" id="certificate"><label for="certificate">Certificate</label></p>

                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="widget">
                        <div class="subscribe_widget">
                            <h3>Still Need Help ?</h3>
                            <p>Let us now about your issue and a Professional will reach you out.</p>
                            <form>
                                <input placeholder="Enter Valid Email Address" type="text">
                                <button type="submit"><i class="la la-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </aside>
                <div class="col-lg-8 column">
                    <div class="modrn-joblist">
                        <div class="tags-bar">
                            <span>Full Time<i class="close-tag">x</i></span>
                            <span>UX/UI Design<i class="close-tag">x</i></span>
                            <span>Istanbul<i class="close-tag">x</i></span>
                            <div class="action-tags">
                                <a href="#" title=""><i class="la la-cloud-download"></i> Save</a>
                                <a href="#" title=""><i class="la la-trash-o"></i> Clean</a>
                            </div>
                        </div><!-- Tags Bar -->
                        <div class="filterbar">
                            <span class="emlthis"><a href="<?php echo BASE_PATH?>" title=""><i class="la la-envelope-o"></i> Email me this List</a></span>
                            <div class="sortby-sec">
                                <span>Sort by</span>
                                <select data-placeholder="Most Recent" class="chosen">
                                    <option>Most Recent</option>
                                    <option>Most Recent</option>
                                    <option>Most Recent</option>
                                    <option>Most Recent</option>
                                </select>
                                <select data-placeholder="20 Per Page" class="chosen" onchange="search_page('limit',this.value)">
                                    <option value="30">30 Per Page</option>
                                    <option value="40">40 Per Page</option>
                                    <option value="50">50 Per Page</option>
                                    <option value="60">60 Per Page</option>
                                </select>
                            </div>
                            <h5><?php echo count($hws);?> Health workers</h5>
                        </div>
                    </div><!-- MOdern Job LIst -->
                    <div class="job-list-modern">
                        <div class="job-listings-sec"><?php

                            foreach ($hws as $hw){
                                $status_color=$hw['status']=='Active'?'ft':'fl';
                                $status=!empty($hw['status'])?$hw['status']:'Active';
                                $profile_pic=!empty($hw['profile_pic'])?$hw['profile_pic']:VENDOR.'img/doctor.png';
                                echo'<div class="job-listing wtabs">
                                <div class="job-title-sec">
                                    <div class="c-logo"> <img src="'.$profile_pic.'" width="60px" alt="" /> </div>
                                    <h3><a href="detail/'.$hw['id'].'/" title="">'.$hw['surname'].' '.$hw['first_name'].'</a></h3>
                                    <span>'.$hw['qualification'].'</span>
                                    <div class="job-lctn"><i class="la la-map-marker"></i>'.$hw['address'].'</div>
                                </div>
                                <div class="job-style-bx">
                                    <span class="job-is '.$status_color.'">'.$status.'</span>
                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                    <i>'.$db->time_ago(new DateTime($hw['date_added']),new DateTime('now')).'</i>
                                </div>
                            </div>';
                            }?>
                        </div>
                        <div class="viewmore"><span><i></i><i></i><i></i>View More</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function search_page(param,value) {
        var searchParams = new URLSearchParams(window.location.search);
        searchParams.set(param,value)
        var newParams = searchParams.toString()
        window.location.href=window.location.href.split('?')[0]+'?'+newParams;
    }
    function search_input(param,value) {
        if (event.keyCode === 13) {
            search_page(param,value)
        }
    }
</script>