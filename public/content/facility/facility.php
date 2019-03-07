<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/24/2019
 * Time: 1:04 AM
 */

$db=new \Hda\database\db();
$facilities=$this->getPageVars();
$search=isset($_GET['search'])?$_GET['search']:'';
$location=isset($_GET['location'])?$_GET['location']:'';
$category=isset($_GET['category'])?$_GET['category']:'';
$sector=isset($_GET['sector'])?$_GET['sector']:'';
$section1=isset($_GET['category'])?'open':'closed';
$section2=isset($_GET['sector'])?'open':'closed';

function radio_on($value1,$value2){
    echo $value1==$value2?'on':'off';
}
?>

<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?php echo VENDOR;?>hunt/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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

<section class="overlape">
    <div class="block less-top">
        <div class="container">
            <div class="row">
                <aside class="col-lg-3 column margin_widget">
                    <div class="widget">
                        <div class="search_widget_job">
                            <div class="field_w_search">
                                <input type="text" placeholder="Search Keywords" value="<?php echo $search;?>" id="search" name="search" onkeyup="search_input('search',this.value)" />
                                <i class="la la-search"></i>
                            </div><!-- Search Widget -->
                            <div class="field_w_search">
                                <input type="text" placeholder="All Locations" value="<?php echo $location;?>" id="location" name="location" onkeyup="search_input('location',this.value)"/>
                                <i class="la la-map-marker"></i>
                            </div><!-- Search Widget -->
                        </div>
                    </div>
                    <div class="widget border">
                        <h3 class="sb-title <?php echo $section1;?>">Sector</h3>
                        <div class="posted_widget" style="">
                            <input type="radio" name="sector" value="<?php radio_on($sector,'private')?>" id="sector1"><label for="sector1" onclick="search_page('sector','private')">Private</label><br>
                            <input type="radio" name="sector" value="<?php radio_on($sector,'govt')?>" id="sector2"><label for="sector2" onclick="search_page('sector','govt')">Govt</label><br>
                            <input type="radio" name="sector" value="<?php radio_on($sector,'pnfp')?>" id="sector3"><label for="sector3" onclick="search_page('sector','pnfp')">PNFP</label><br>
                            <input type="radio" name="sector" value="<?php radio_on($sector,'all')?>" id="sector4"><label for="sector4" onclick="search_page('sector','all')">All</label><br>
                        </div>
                    </div>
                    <div class="widget border">
                        <h3 class="sb-title <?php echo $section2;?>">Category</h3>
                        <div class="posted_widget" style="">
                            <input type="radio" name="category" id="category1"><label for="category1" onclick="search_page('category','clinic')">Private</label><br>
                            <input type="radio" name="category" id="category2"><label for="category2" onclick="search_page('category','hospital')">Govt</label><br>
                            <input type="radio" name="category" id="category4"><label for="category4" onclick="search_page('category','all')">All</label><br>
                        </div>
                    </div>
                </aside>
                <div class="col-lg-9 column">
                    <div class="filterbar">
                        <p>Total of <?php echo $db->countFacility();?> facilities</p>
                        <div class="sortby-sec">
                            <span>Sort by</span>
                            <select data-placeholder="20 Per Page" class="chosen" onchange="search_page('limit',this.value)">
                                <option value="30">30 Per Page</option>
                                <option value="40">40 Per Page</option>
                                <option value="50">50 Per Page</option>
                                <option value="60">60 Per Page</option>
                            </select>
                        </div>
                    </div>
                    <div class="emply-list-sec">
                        <div class="row" id="masonry"><?php
                            foreach ($facilities as $facility){
                                echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="emply-list box">
                                    <div class="emply-list-thumb">
                                        <a href="'.BASE_PATH.'facility/detail/'.$facility['id'].'/" title=""><img src="'.VENDOR.'hunt/images/resource/first-aid-kit.png" width="40px" alt="" /></a>
                                    </div>
                                    <div class="emply-list-info">
                                        <div class="emply-pstn">'.$facility['sector'].'</div>
                                        <h3><a href="'.BASE_PATH.'facility/detail/'.$facility['id'].'/" title="">'.$facility['facility'].'</a></h3>
                                        <span>'.$facility['category'].'</span>
                                        <h6><i class="la la-map-marker"></i> '.$facility['address'].'</h6>
                                    </div>
                                </div><!-- Employe List -->
                            </div>';
                            }
                            ?>

                            <div class="col-lg-12">
                                <div class="pagination">
                                    <ul>
                                        <li class="prev"><a href="#"><i class="la la-long-arrow-left"></i> Prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><span class="delimeter">...</span></li>
                                        <li><a href="#">14</a></li>
                                        <li class="next"><a href="#">Next <i class="la la-long-arrow-right"></i></a></li>
                                    </ul>
                                </div><!-- Pagination -->
                            </div>
                        </div>
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
