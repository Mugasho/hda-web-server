<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/3/2018
 * Time: 6:46 PM
 */
?>

<!-- HEADER DESKTOP-->

<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo ADMIN_PATH;?>" style="margin: 5px;">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well //  //-->
                    <!-- Dark Logo icon -->
                    <img src="<?php echo CONTENT_PATH; ?>uploads/images/icon/cells.png" alt="homepage"
                         class="dark-logo">


                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span style="display: none;">
                         <!-- dark Logo text -->
                         <img src="<?php echo CONTENT_PATH; ?>uploads/images/icon/hda-logo-text.png" alt="homepage"
                              class="dark-logo">
                    <img src="<?php echo CONTENT_PATH; ?>uploads/images/icon/hda-logo-text.png" alt="homepage"
                         class="light-logo">
                    </span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                        href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                <li class="nav-item m-l-10"><a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="mdi mdi-message"></i>

                    </a>
                    <div class="dropdown-menu mailbox animated slideInUp">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li style="overflow: visible;">
                                <div class="slimScrollDiv"
                                     style="position: relative; overflow: visible hidden; width: auto; height: 250px;">
                                    <div class="message-center" style="overflow: hidden; width: auto; height: 250px;">
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span
                                                        class="mail-desc">Just see the my new admin!</span> <span
                                                        class="time">9:30 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span>
                                                <span class="time">9:10 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span>
                                                <span class="time">9:08 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:02 AM</span></div>
                                        </a>
                                    </div>
                                    <div class="slimScrollBar"
                                         style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                                    <div class="slimScrollRail"
                                         style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                        notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box"><a
                            class="nav-link hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search" >
                        <input type="text" class="form-control" name="search" placeholder="Search &amp; enter"> <a class="srh-btn"><i
                                    class="ti-close"></i></a></form>
                </li>

                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="flag-icon flag-icon-us"></i></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up"><a class="dropdown-item" href="#"><i
                                    class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i
                                    class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i
                                    class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i
                                    class="flag-icon flag-icon-de"></i> Dutch</a></div>
                </li>
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="<?php echo CONTENT_PATH . 'uploads/images/me.jpg'; ?>" alt="user"
                                class="profile-pic"></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="<?php echo CONTENT_PATH . 'uploads/images/me.jpg'; ?>"
                                                            alt="user"></div>
                                    <div class="u-text">
                                        <h4><?php echo $_SESSION['username']; ?></h4>
                                        <p class="text-muted">varun@gmail.com</p><a href="pages-profile.html"
                                                                                    class="btn btn-rounded btn-danger btn-sm">View
                                            Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo CONTENT_PATH ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- END HEADER DESKTOP-->
