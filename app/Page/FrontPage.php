<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/15/2019
 * Time: 7:28 PM
 */

namespace Hda\Page;


use Hda\utils\error;

class FrontPage extends Master
{
    public $isHasSearch = false;
    public $isHome = false;

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

        $this->addStyle('bootstrap-grid.css', VENDOR . 'hunt/css/');
        $this->addStyle('icons.css', VENDOR . 'hunt/css/');
        $this->addStyle('animate.min.css', VENDOR . 'hunt/css/');
        $this->addStyle('style.css', VENDOR . 'hunt/css/');
        $this->addStyle('responsive.css', VENDOR . 'hunt/css/');
        $this->addStyle('chosen.css', VENDOR . 'hunt/css/');
        $this->addStyle('colors.css', VENDOR . 'hunt/css/colors/');
        $this->addStyle('bootstrap.css', VENDOR . 'hunt/css/');
        $this->addStyle('font-awesome.min.css', VENDOR . 'font-awesome-4/css/');


        $this->addScripts('jquery.min.js', VENDOR . 'hunt/js/');
        $this->addScripts('modernizr.js', VENDOR . 'hunt/js/');
        $this->addScripts('script.js', VENDOR . 'hunt/js/');
        $this->addScripts('bootstrap.min.js', VENDOR . 'hunt/js/');
        $this->addScripts('wow.min.js', VENDOR . 'hunt/js/');
        $this->addScripts('slick.min.js', VENDOR . 'hunt/js/');
        $this->addScripts('parallax.js', VENDOR . 'hunt/js/');
        $this->addScripts('select-chosen.js', VENDOR . 'hunt/js/');
        $this->addScripts('jquery.scrollbar.min.js', VENDOR . 'hunt/js/');


        $this->addMenu('Home', '', 'mdi mdi-view-dashboard', null);
        $this->addMenu('Drugs', null, 'mdi mdi-pill', array(
            'add drug' => 'drugs/add/',
            'drug list' => 'drugs/',
            'reports' => 'drugs/report/'));
        $this->addMenu('Facilities', null, 'mdi mdi-medical-bag', array(
            'Add new' => 'facility/add/',
            'Facilities' => 'facility/'
        ));
        $this->addMenu('Health Workers', 'hw/', 'mdi mdi-account-multiple', array(
            'Add new' => 'hw/add/',
            'Health Workers' => 'hw/'
        ));


        $this->setCopyright('Copyright © 2018 HDA All rights reserved.');
    }

    /**
     * @return bool
     */
    public function isHasSearch()
    {
        return $this->isHasSearch;
    }

    /**
     * @param bool $isHasSearch
     */
    public function setIsHasSearch($isHasSearch)
    {
        $this->isHasSearch = $isHasSearch;
    }

    /**
     * @return bool
     */
    public function isHome()
    {
        return $this->isHome;
    }

    /**
     * @param bool $isHome
     */
    public function setIsHome($isHome)
    {
        $this->isHome = $isHome;
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
        echo '<body>' . PHP_EOL;
        /*echo '<div class="page-loading">
	            <img src="'.VENDOR . 'hunt/images/loader.gif" alt="" />
	            <span>Skip Loader</span>
               </div>';*/
        echo '<div class="theme-layout" id="scrollup">';
        $this->isHasMenu() ? require 'responsive-header.php' : null;
        $this->isHome() ? null : require 'page-header.php';
        $this->getFrontContent($this->getPageContent() . '.php');
        require 'front-footer.php';
        echo '</div>';
        require 'account-popup.php';
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