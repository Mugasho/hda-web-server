<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/22/2019
 * Time: 12:00 AM
 */
$db=new \Hda\database\db();
$id=$this->getPageVars();
/** @var integer $hw */
$hw=$db->getHwByID($id);
$qualifications=$db->getTrainingsByID($id,1);
$trainings=$db->getTrainingsByID($id,2);
$positions=$db->getHwPositions($id);
?>
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?php echo VENDOR?>hunt/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="skills-btn">
                                        <a href="#" title=""><?php echo $hw['reg_no'];?></a>
                                        <a href="#" title=""><?php echo $hw['title'];?></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="action-inner">
                                        <a href="#" title=""><i class="la la-paper-plane"></i>Save Resume</a>
                                        <a href="#" title=""><i class="la la-envelope-o"></i>
                                            Contact <?php echo $hw['surname'].' '.$hw['first_name'].' '.$hw['other_names'];?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overlape">
    <div class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cand-single-user">
                        <div class="share-bar circle">
                            <a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="can-detail-s">
                            <div class="cst"><img src="<?php echo !empty($hw['profile_pic'])?$hw['profile_pic']:VENDOR.'img/doctor.png';?>" alt="" /></div>
                            <h3><?php echo $hw['surname'].' '.$hw['first_name'].' '.$hw['other_names'];?></h3>
                            <span><i><?php echo $hw['qualification'];?></i></span>
                            <p><a href="<?php echo BASE_PATH;?>email-protection" class="__cf_email__" data-cfemail="mugalink2@gmail.com">[email&#160;protected]</a></p>
                            <p>Member Since, <?php echo date('Y',strtotime($hw['reg_date']));?></p>
                            <p><i class="la la-map-marker"></i><?php echo $hw['address'];?></p>
                        </div>
                        <div class="download-cv">
                            <a href="#" title="">Download CV <i class="la la-download"></i></a>
                        </div>
                    </div>
                    <ul class="cand-extralink"><?php
                        echo !empty($hw['notes'])?'<li><a href="#about" title="">About</a></li>':'';
                        echo !empty($qualifications)?'<li><a href="#education" title="">Education</a></li>':'';
                        echo !empty($trainings)?'<li><a href="#experience" title="">Professional awards</a></li>':'';
                        echo !empty($positions)?'<li><a href="#employers" title="">Employers</a></li>':'';
                        ?>
                    </ul>
                    <div class="cand-details-sec">
                        <div class="row">
                            <div class="col-lg-8 column">
                                <div class="cand-details" id="about"><?php
                                    if(!empty($hw['notes'])){
                                        echo '<h2>About Health worker</h2>';
                                        echo '<p>'.$hw['notes'].'</p>';
                                    }
                                    if(!empty($qualifications)){?>
                                        <div class="edu-history-sec" id="education">
                                            <h2>Education</h2><?php
                                            foreach ($qualifications as $qualification){
                                               echo '<div class="edu-history">
                                                <i class="la la-graduation-cap"></i>
                                                <div class="edu-hisinfo">
                                                    <h3>'.$qualification['award'].'</h3>
                                                    <i>'.date('Y',strtotime($qualification['started'])).' - '.date('Y',strtotime($qualification['ended'])).'</i>
                                                    <span>'.$qualification['school'].' </span>
                                                    <p>'.$qualification['notes'].' </p>
                                                </div>
                                            </div>';
                                            }?>

                                        </div><?php }
                                    if(!empty($trainings)){?>
                                    <div class="edu-history-sec" id="experience">
                                        <h2>Professional awards</h2><?php
                                        foreach ($trainings as $training){
                                            echo '<div class="edu-history style2">
                                            <i></i>
                                            <div class="edu-hisinfo">
                                                <h3>'.$training['award'].'</h3>
                                                <i>'.date('Y',strtotime($training['started'])).' - '.date('Y',strtotime($training['ended'])).'</i>
                                                <span>'.$training['school'].'</span>
                                                <p>'.$training['notes'].'</p>
                                            </div>
                                        </div>';
                                        }?>
                                    </div><?php }
                                    if(!empty($positions)){
                                    ?>
                                    <div class="companyies-fol-sec" id="employers">
                                        <h2>Employers</h2>
                                        <div class="cmp-follow">
                                            <div class="row"><?php
                                                foreach ($positions as $position){
                                                    echo '<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <a href="'.BASE_PATH.'facility/detail/'.$position['id'].'/" title=""><img src="'.VENDOR.'hunt/images/resource/icon-hospital-1.png" alt="" /><span>'.$db->limitChars($position['facility'],10).'</span></a>
                                                </div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div><?php }?>
                                </div>
                            </div>
                            <div class="col-lg-4 column">
                                <div class="quick-form-job">
                                    <h3>Contact</h3>
                                    <form>
                                        <input type="text" placeholder="Enter your Name *" />
                                        <input type="text" placeholder="Email Address*" />
                                        <input type="text" placeholder="Phone Number" />
                                        <textarea placeholder="Message should have more than 50 characters"></textarea>
                                        <button class="submit">Send Email</button>
                                        <span>You accepts our <a href="#" title="">Terms and Conditions</a></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
