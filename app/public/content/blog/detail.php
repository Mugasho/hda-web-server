<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/27/2019
 * Time: 3:52 PM
 */

$db=new \Hda\database\db();
$post=$this->getPageVars();
$categories = $db->getPostCategories(null);
$recents=$db->getAllPosts(5);
?>

<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1"
             style="background: url(<?php echo VENDOR; ?>hunt/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;"
             class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><?php echo $db->limitChars($this->getPageTitle(),50); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 column">
                    <div class="blog-single">
                        <div class="bs-thumb"><img src="<?php echo $post['blog_pic'];?>" alt="" /></div>
                        <ul class="post-metas"><li><a href="#" title=""><img src="images/resource/admin.jpg" alt="" />Ali TUFAN</a></li><li><a href="#" title=""><i class="la la-calendar-o"></i>November 23, 2017</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>4 comments</a></li><li><a href="#" title=""><i class="la la-file-text"></i>Travel, Skill, Jobs</a></li></ul>
                        <h2><?php echo $post['title'];?></h2>
                        <p><?php echo $post['content'];?></p>
                        <div class="tags-share">
                            <div class="tags_widget">
                                <span>Tags</span>
                                <a href="#" title="">Adwords</a>
                                <a href="#" title="">Sales</a>
                                <a href="#" title="">Travel</a>
                            </div>
                            <div class="share-bar">
                                <a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a><a href="#" title="" class="share-google"><i class="la la-google"></i></a><span>Share</span>
                            </div>
                        </div>
                        <div class="post-navigation ">
                            <div class="post-hist prev">
                                <a href="#" title=""><i class="la la-arrow-left"></i><span class="post-histext">Prev Post<i>Hey Job Seeker, It’s Time</i></span></a>
                            </div>
                            <div class="post-hist next">
                                <a href="#" title=""><span class="post-histext">Next Post<i>11 Tips to Help You Get New</i></span><i class="la la-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="comment-sec">
                            <h3>4 Comments</h3>
                            <ul>
                                <li>
                                    <div class="comment">
                                        <div class="comment-avatar"> <img src="images/resource/err1.jpg" alt="" /> </div>
                                        <div class="comment-detail">
                                            <h3>Ali TUFAN</h3>
                                            <div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>Jan 16, 2016 07:48 am</a></div>
                                            <p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement tantaneously eel valiantly petted this along across highhandedly much. </p>
                                            <a href="#" title=""><i class="la la-reply"></i>Reply</a>
                                        </div>
                                    </div>
                                    <ul class="comment-child">
                                        <li>
                                            <div class="comment">
                                                <div class="comment-avatar"> <img src="images/resource/err2.jpg" alt="" /> </div>
                                                <div class="comment-detail">
                                                    <h3>Rachel LOIS</h3>
                                                    <div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>Jan 16, 2016 07:48 am</a></div>
                                                    <p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement tantaneously eel valiantly petted this along across highhandedly much. </p>
                                                    <a href="#" title=""><i class="la la-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment-avatar"> <img src="images/resource/err3.jpg" alt="" /> </div>
                                        <div class="comment-detail">
                                            <h3>Kate ROSELINE</h3>
                                            <div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>Jan 16, 2016 07:48 am</a></div>
                                            <p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement tantaneously eel valiantly petted this along across highhandedly much. </p>
                                            <a href="#" title=""><i class="la la-reply"></i>Reply</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment-avatar"> <img src="images/resource/err4.jpg" alt="" /> </div>
                                        <div class="comment-detail">
                                            <h3>Luis DANIEL</h3>
                                            <div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>Jan 16, 2016 07:48 am</a></div>
                                            <p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement tantaneously eel valiantly petted this along across highhandedly much. </p>
                                            <a href="#" title=""><i class="la la-reply"></i>Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="commentform-sec">
                            <h3>Leave a Reply</h3>
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="pf-title">Description</span>
                                        <div class="pf-field">
                                            <textarea></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="pf-title">Full Name</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="ALi TUFAN" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="pf-title">Email</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="pf-title">Phone</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-3 column">
                    <div class="widget">
                        <div class="search_widget_job no-margin">
                            <div class="field_w_search">
                                <input placeholder="Search Keywords" type="text">
                                <i class="la la-search"></i>
                            </div><!-- Search Widget -->
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Categories</h3>
                        <div class="sidebar-links"><?php
                            echo '<a href="' . BASE_PATH . 'blog/?category=0" title=""><i class="la la-angle-right"></i>uncategorized</a>';
                            foreach ($categories as $category) {
                                echo '<a href="' . BASE_PATH . 'blog/?category=' . $category['category'] . '" title=""><i class="la la-angle-right"></i>' . $category['category'] . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Recent Posts</h3>
                        <div class="post_widget"><?php
                            foreach ($recents as $recent){
                                echo '<div class="mini-blog">
                                <span><a href="#" title=""><img src="' . $recent['blog_pic'] . '" alt=""></a></span>
                                <div class="mb-info">
                                    <h3><a href="#" title="">' . $recent['title'] . '</a></h3>
                                    <span>' . date("F d, Y", strtotime($recent['date_added'])) . '</span>
                                </div>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Archives</h3>
                        <div class="sidebar-links">
                            <a href="#" title=""><i class="la la-angle-right"></i>April 2017</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>March 2016</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>February 2015</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>July 2013</a>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Meta</h3>
                        <div class="sidebar-links">
                            <a href="#" title=""><i class="la la-angle-right"></i>Log in</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Entries RSS</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Comments RSS</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>WordPress.org</a>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Our Photo</h3>
                        <div class="photo-widget">
                            <div class="row">
                                <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6"> <a href="#" title=""><img src="images/resource/op1.jpg" alt="" /></a> </div>
                                <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6"> <a href="#" title=""><img src="images/resource/op2.jpg" alt="" /></a> </div>
                                <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6"> <a href="#" title=""><img src="images/resource/op3.jpg" alt="" /></a> </div>
                                <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6"> <a href="#" title=""><img src="images/resource/op4.jpg" alt="" /></a> </div>
                                <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6"> <a href="#" title=""><img src="images/resource/op5.jpg" alt="" /></a> </div>
                                <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6"> <a href="#" title=""><img src="images/resource/op6.jpg" alt="" /></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Tags</h3>
                        <div class="tags_widget">
                            <a href="#" title="">Adwords</a>
                            <a href="#" title="">Sales</a>
                            <a href="#" title="">Travel</a>
                            <a href="#" title="">Our Blog</a>
                            <a href="#" title="">Trade</a>
                            <a href="#" title="">Traffic</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
