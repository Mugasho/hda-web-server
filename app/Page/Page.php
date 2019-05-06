<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/3/2018
 * Time: 6:31 PM
 * @property string pageTitle
 */

namespace Hda\Page;

use Hda\utils\error;

class Page extends Master
{

    /**
     * Page constructor.
     * @param $pageTitle
     */
    public function __construct($pageTitle)
    {
        $this->setPageTitle($pageTitle);
        $this->setMetaAuthor('Lincoln');
        $this->setMetaDescription('HDA project');
        $this->setMetaViewport('width=device-width, initial-scale=1, shrink-to-fit=no');
        $this->setMetaKeywords('Health,directory,application');

        $this->addStyle('bootstrap.min.css', CONTENT_PATH . 'vendor/bootstrap-4.1/');
        $this->addStyle('style.min.css', CONTENT_PATH . 'vendor/css/');
        $this->addStyle('fontawesome-all.min.css', CONTENT_PATH . 'vendor/font-awesome-5/css/');
        $this->addStyle('styles.min.css', CONTENT_PATH . 'vendor/fonts/open-sans/');
        $this->addStyle('iconfont.css', CONTENT_PATH . 'vendor/fonts/iconfont/');
        $this->addStyle('flatpickr.min.css', CONTENT_PATH . 'vendor/flatpickr/');
        $this->addStyle('select2.min.css', CONTENT_PATH . 'vendor/select2/');
        $this->addStyle('datatables.min.css', CONTENT_PATH . 'vendor/datatables/');


        require 'Styles.php';
        require 'scripts.php';

        $this->addMenu('Home', '', 'mdi mdi-view-dashboard', null);
        $this->addMenu('Drugs', null, 'mdi mdi-pill', array(
            'add drug' => 'drugs/add/',
            'drug list' => 'drugs/',
            'reports'=>'drugs/report/'));
        $this->addMenu('Facilities', null, 'mdi mdi-medical-bag', array(
            'Add new'=>'facility/add/',
            'Facilities'=>'facility/'
        ));
        $this->addMenu('Health Workers', 'hw/', 'mdi mdi-account-multiple', array(
            'Add new'=>'hw/add/',
            'Health Workers'=>'hw/'
        ));
        $this->addMenu('Blog', 'post/', 'mdi mdi-book', array(
            'Add new'=>'blog/add/',
            'Blog'=>'blog/',
            'Categories'=>'blog/categories/'
        ));
        $this->addMenu('Users', 'users/', 'mdi mdi-account', null);
        $this->addMenu('Login', 'login/', 'mdi mdi-lock', null);


        $this->setCopyright('Copyright © 2018 HDA All rights reserved.');
        $this->pageTitle = $pageTitle;
    }

    /**
     *Render the page in browser
     */
    public function makePage()
    {
        echo '<html lang="en"><head>' . PHP_EOL;
        $this->makeMeta();
        $this->setTitle();
        $this->makeStyles();
        echo '</head>' . PHP_EOL;
        $body_class = $this->isHasMenu() ? 'fix-header card-no-border' : 'mini-sidebar';
        echo '<body class="' . $body_class . '">' . PHP_EOL;

        echo '<div class="preloader">
                    <svg class="circular" viewBox="25 25 50 50">
                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                     </svg>
               </div>';

        if ($this->hasMenu) {
            echo '<div id="main-wrapper">';

            $this->isHasHeader() ? $this->getHeader() : null;
            $this->isHasMenu() ? require 'menu.php' : null;

            echo ' <div class="page-wrapper">';

            $this->isHasBreadcrumb() ? $this->getBreadcrumb() : null;
            echo ' <div class="container-fluid">';

            $this->getContent($this->getPageContent() . '.php');

            echo '    </div>
                </div>
            </div>';

            /*login pages*/
        } else {
            echo '<section id="wrapper">';
            $this->getContent($this->getPageContent() . '.php');
            echo '</section>';
        }

        if ($this->getScripts() != null) {
            foreach ($this->getScripts() as $key => $value) {
                echo '<script src="' . $value . $key . '"></script>' . PHP_EOL;
            }
        }
        if ($this->isHasError()) {
            $error = new error($this->pageError['message'],
                $this->pageError['title'], $this->pageError['type']);
            $error->showMessage();
        }
        echo '</body>';
        echo '</html>';
    }
}