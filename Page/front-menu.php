<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/15/2019
 * Time: 7:24 PM
 */

?>

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
    <div class="container">
        <div class="theme-header clearfix">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                </button>
                <a href="index.html" class="navbar-brand"><img src="<?php echo VENDOR.'img';?>/logo.png" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <?php
                    foreach ($this->getMenu() as $key => $value) {
                        $href=!is_null($value['items'])?'#':BASE_PATH.$value['path'];
                        $classes['li']=!is_null($value['items'])?'nav-item dropdown':'nav-item';
                        $classes['a']=!is_null($value['items'])?'nav-link dropdown-toggle':'nav-link';
                        $classes['b']=!is_null($value['items'])?'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"':'';
                        echo '<li class="'.$classes['li'].'">';
                        echo '<a class="'.$classes['a'].'" href="' .$href . '" '.$classes['b'].'>';
                        echo $key.'</a>';
                        if(!is_null($value['items'])){
                            echo '<ul class="dropdown-menu">';
                            foreach ($value['items'] as $item => $item_value) {
                                echo '<li> <a class="dropdown-item"  href="' .BASE_PATH. $item_value . '">'.$item.'</a></li>';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                    ?>
                   <!-- <li class="nav-item active">
                        <a class="nav-link" href="index.html">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="about.html">About</a></li>
                            <li><a class="dropdown-item" href="job-page.html">Job Page</a></li>
                            <li><a class="dropdown-item" href="job-details.html">Job Details</a></li>
                            <li><a class="dropdown-item" href="resume.html">Resume Page</a></li>
                            <li><a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                            <li><a class="dropdown-item" href="pricing.html">Pricing Tables</a></li>
                            <li><a class="dropdown-item" href="contact.html">Contact</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Candidates
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="browse-jobs.html">Browse Jobs</a></li>
                            <li><a class="dropdown-item" href="browse-categories.html">Browse Categories</a></li>
                            <li><a class="dropdown-item" href="add-resume.html">Add Resume</a></li>
                            <li><a class="dropdown-item" href="manage-resumes.html">Manage Resumes</a></li>
                            <li><a class="dropdown-item" href="job-alerts.html">Job Alerts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Employers
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="post-job.html">Add Job</a></li>
                            <li><a class="dropdown-item" href="manage-jobs.html">Manage Jobs</a></li>
                            <li><a class="dropdown-item" href="manage-applications.html">Manage Applications</a></li>
                            <li><a class="dropdown-item" href="browse-resumes.html">Browse Resumes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a></li>
                            <li><a class="dropdown-item" href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                            <li><a class="dropdown-item" href="blog-full-width.html"> Blog full width</a></li>
                            <li><a class="dropdown-item" href="single-post.html">Blog Single Post</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Sign In</a>
                    </li>-->
                    <li class="button-group">
                        <a href="post-job.html" class="button btn btn-common">Post a Job</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu" data-logo="<?php echo VENDOR.'img';?>/logo-mobile.png"></div>
</nav>
