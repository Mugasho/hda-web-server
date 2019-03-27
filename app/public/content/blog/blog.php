<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/7/2019
 * Time: 12:03 PM
 */

$db = new \Hda\database\db();
$posts = $db->getAllPosts(null);
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
                        <h3><?php echo $this->getPageTitle(); ?></h3>
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
                    <div class="bloglist-sec"><?php
                        foreach ($posts as $post) {
                            echo '<div class="blogpost style2">
                            <div class="blog-posthumb"> <a href="'.BASE_PATH.'blog/'.$post['id'].'/" title=""><img src="' . $post['blog_pic'] . '" alt=""></a> </div>
                            <div class="blog-postdetail">
                                <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>' . date("F d, Y", strtotime($post['date_added'])) . '</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>4 comments</a></li></ul>
                                <h3><a href="'.BASE_PATH.'blog/'.$post['id'].'/" title="">' . $post['title'] . '</a></h3>
                                <p>' . $db->limitChars($post['content'],250) . '</p>
                                <a class="bbutton" href="'.BASE_PATH.'blog/'.$post['id'].'/" title="">Read More <i class="la la-long-arrow-right"></i></a>
                            </div>
                        </div>';
                        }

                        ?>
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
