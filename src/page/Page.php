<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/3/2018
 * Time: 6:31 PM
 * @property string pageTitle
 */

require 'master.php';

class Page extends \page\master
{

    /**
     * Page constructor.
     * @param $pageTitle
     */
    public function __construct($pageTitle)
    {
        if (file_exists('../src/loader.php')) {
            require '../src/loader.php';
        } else {
            require '../../src/loader.php';
        }
        $this->setPageTitle($pageTitle);
        $this->setMetaAuthor('Lincoln');
        $this->setMetaDescription('HDA project');
        $this->setMetaViewport('width=device-width, initial-scale=1, shrink-to-fit=no');
        $this->setMetaKeywords('Health,directory,application');
        require 'styles.php';
        require 'scripts.php';

        $this->addMenu('Home', '', 'fa fa-fw fa-envelope-open', null);
        $this->addMenu('Drugs', null, 'fa fa-fw fa-flask', array(
            'add drug' => 'drugs/add.php',
            'drug list' => 'drugs/',
            'reports'=>'drugs/report/'));
        $this->addMenu('Hospitals', 'hospital/', 'fa fa-fw fa-hospital', null);
        $this->addMenu('Doctors', 'hw.php', 'fa fa-fw fa-user-md', null);
        $this->addMenu('Users', 'users/', 'fa fa-fw fa-users', null);
        $this->addMenu('Login', 'login.php', 'fa fa-fw fa-lock', null);

        $this->setCopyright('Copyright © 2018 HDA All rights reserved.');
    }

}