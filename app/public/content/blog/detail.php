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
$pic=!is_null($post['blog_pic'])?$post['blog_pic']:VENDOR.'hunt/images/resource/picture.png';
$postCategory=$db->getPostCategoryByID($post['category']);
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
                        <h3><?php echo $db->limitChars($this->getPageTitle(),70); ?></h3>
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
                        <div class="bs-thumb"><img src="<?php echo $pic;?>" alt="" /></div>
                        <ul class="post-metas"><li><a href="#" title=""><img src="images/resource/admin.jpg" alt="" />Ali TUFAN</a></li><li><a href="#" title=""><i class="la la-calendar-o"></i><?php echo date("F d, Y", strtotime($post['date_added']))?></a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>4 comments</a></li><li><a href="#" title=""><i class="la la-file-text"></i><?php echo $postCategory['category']?></a></li></ul>
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
                        <div class="commentform-sec">
                            <h3>Leave a comment</h3>
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="pf-title">Description</span>
                                        <div class="pf-field">
                                            <textarea id="comment-description" name="comment-description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="pf-title">Full Name</span>
                                        <div class="pf-field">
                                            <input type="text" name="comment-names" id="comment-names" placeholder="Your names" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="pf-title">Email</span>
                                        <div class="pf-field">
                                            <input type="text" name="comment-email" id="comment-email" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="pf-title">Phone</span>
                                        <div class="pf-field">
                                            <input type="text" name="comment-phone" id="comment-phone" placeholder="" />
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
                                $pic=!is_null($recent['blog_pic'])?$recent['blog_pic']:VENDOR.'hunt/images/resource/picture.png';
                                echo '<div class="mini-blog">
                                <span><a href="#" title=""><img src="' . $pic. '" alt=""></a></span>
                                <div class="mb-info">
                                    <h3><a href="' . BASE_PATH . 'blog/' . $recent['id'] . '/" title="">' .$db->limitChars( $recent['title'],70) . '</a></h3>
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
