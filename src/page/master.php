<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/3/2018
 * Time: 6:20 PM
 */

namespace page;

use utils\error;

class master
{
    public $pageTitle;
    public $copyright;
    public $metaAuthor;
    public $metaViewport;
    public $metaKeywords;
    public $metaDescription;
    public $pageVars;
    public $pageVars2;
    public $styles;
    public $scripts;
    public $pageContent;
    public $menu;
    public $hasError = false;
    public $hasHeader = true;
    public $hasTitle=true;
    public $pageError = null;
    public $hasFooter = true;
    public $hasBreadcrumb = true;
    public $hasMenu = true;
    public $hasSetting=false;

    /**
     * @return mixed
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * @param mixed $styles
     */
    public function setStyles($styles)
    {
        $this->styles = $styles;
    }


    /**
     * master constructor.
     * @param $pageTitle
     */
    public function __construct($pageTitle)
    {
        $this->pageTitle = $pageTitle;


    }

    function getHeader()
    {
        require 'header.php';
    }

    function getBreadcrumb()
    {
        require 'breadcrumb.php';
    }

    /**
     * @param $pageContent
     */
    function getContent($pageContent)
    {
        if (file_exists('../src/content/' . $pageContent)) {
            require '../src/content/' . $pageContent;
        } elseif (file_exists('../../src/content/' . $pageContent)) {
            require '../../src/content/' . $pageContent;
        }

    }

    function getFooter()
    {
        require 'footer.php';
    }

    function getMeta()
    {
        require 'meta.php';
    }

    function addStyle($name, $path)
    {
        $this->styles[$name] = $path;
    }

    function addMenu($name, $path, $icon, $items)
    {
        $this->menu[$name] = array('path' => $path, 'icon' => $icon);
        if ($items != null) {
            $this->menu[$name]['items'] = $items;
        } else {
            $this->menu[$name]['items'] = null;
        }
    }

    function addScripts($name, $path)
    {
        $this->scripts[$name] = $path;
    }

    /**
     * @return bool
     */
    public function isHasSetting()
    {
        return $this->hasSetting;
    }

    /**
     * @param bool $hasSetting
     */
    public function setHasSetting($hasSetting)
    {
        $this->hasSetting = $hasSetting;
    }

    /**
     * @return mixed
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * @param mixed $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    public function setPageError($message, $title, $type)
    {
        $this->hasError = true;
        $this->pageError['message'] = $message;
        $this->pageError['title'] = $title;
        $this->pageError['type'] = $type;
    }

    function setTitle()
    {
        echo '<title>' . $this->getPageTitle() . '- Health Directory Application</title>' . PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function getPageContent()
    {
        return $this->pageContent;
    }

    /**
     * @param mixed $pageContent
     */
    public function setPageContent($pageContent)
    {
        $this->pageContent = $pageContent;
    }

    /**
     * @return bool
     */
    public function isHasMenu()
    {
        return $this->hasMenu;
    }

    /**
     * @return bool
     */
    public function isHasHeader()
    {
        return $this->hasHeader;
    }

    /**
     * @param bool $hasHeader
     */
    public function setHasHeader($hasHeader)
    {
        $this->hasHeader = $hasHeader;
    }

    /**
     * @return mixed
     */
    public function getPageVars2()
    {
        return $this->pageVars2;
    }

    /**
     * @param mixed $pageVars2
     */
    public function setPageVars2($pageVars2)
    {
        $this->pageVars2 = $pageVars2;
    }

    /**
     * @param bool $hasMenu
     */
    public function setHasMenu($hasMenu)
    {
        $this->hasMenu = $hasMenu;
    }

    /**
     * @return bool
     */
    public function isHasBreadcrumb()
    {
        return $this->hasBreadcrumb;
    }

    /**
     * @param bool $hasBreadcrumb
     */
    public function setHasBreadcrumb($hasBreadcrumb)
    {
        $this->hasBreadcrumb = $hasBreadcrumb;
    }


    /**
     * @return mixed
     */
    public function getMetaAuthor()
    {
        return $this->metaAuthor;
    }

    /**
     * @param mixed $metaAuthor
     */
    public function setMetaAuthor($metaAuthor)
    {
        $this->metaAuthor = $metaAuthor;
    }

    /**
     * @return mixed
     */
    public function getMetaViewport()
    {
        return $this->metaViewport;
    }

    /**
     * @return mixed
     */
    public function getScripts()
    {
        return $this->scripts;
    }

    /**
     * @param mixed $scripts
     */
    public function setScripts($scripts)
    {
        $this->scripts = $scripts;
    }


    /**
     * @param mixed $metaViewport
     */
    public function setMetaViewport($metaViewport)
    {
        $this->metaViewport = $metaViewport;
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param mixed $metaKeywords
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @param mixed $menu
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param mixed $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return bool
     */
    public function isHasFooter()
    {
        return $this->hasFooter;
    }

    /**
     * @param bool $hasFooter
     */
    public function setHasFooter($hasFooter)
    {
        $this->hasFooter = $hasFooter;
    }

    /**
     * @return bool
     */
    public function isHasTitle()
    {
        return $this->hasTitle;
    }

    /**
     * @param bool $hasTitle
     */
    public function setHasTitle($hasTitle)
    {
        $this->hasTitle = $hasTitle;
    }

    /**
     * @return mixed
     */
    public function getPageVars()
    {
        return $this->pageVars;
    }

    /**
     * @param mixed $pageVars
     */
    public function setPageVars($pageVars)
    {
        $this->pageVars = $pageVars;
    }

    /**
     * @return mixed
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @param mixed $copyright
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * @return bool
     */
    public function isHasError()
    {
        return $this->hasError;
    }

    /**
     * @param bool $hasError
     */
    public function setHasError($hasError)
    {
        $this->hasError = $hasError;
    }


    public function makePage()
    {
        echo '<html lang="en"><head>' . PHP_EOL;
        $this->makeMeta();
        $this->setTitle();
        if ($this->getStyles() != null) {
            foreach ($this->getStyles() as $key => $value) {
                echo '<link href="' . $value . $key . '" rel="stylesheet" media="all">' . PHP_EOL;
            }
        }
        echo '</head>' . PHP_EOL;
        $body_class= $this->isHasMenu() ?'':'p-front';
        echo '<body class="'.$body_class.'">' . PHP_EOL;;

        $this->isHasHeader() ? $this->getHeader() : null;

        echo '<div class="page-wrap">';

        $this->isHasMenu() ? require 'menu.php' : null;

        echo ' <div class="page-content"><div class="container-fluid">';

        $this->isHasBreadcrumb()?$this->getBreadcrumb():null;

        if ($this->isHasError()) {
            $error = new error($this->pageError['message'],
                $this->pageError['title'], $this->pageError['type']);
            $error->showMessage();
        }
        echo $this->isHasTitle()?'<h2 class="content-heading">'.$this->getPageTitle().'</h2>':'';
        $this->getContent($this->getPageContent() . '.php');
        echo '</div></div></div>';
        if ($this->getScripts() != null) {
            foreach ($this->getScripts() as $key => $value) {
                echo '<script src="' . $value . $key . '"></script>' . PHP_EOL;
            }
        }
        $this->isHasSetting()?require 'settings-panel.php':null;
        echo '</body>';
        echo '</html>';
    }

    function makeMeta()
    {
        echo
            '<meta charset="UTF-8">' . PHP_EOL .
            '<meta name="viewport" content="' . $this->getMetaViewport() . '">' . PHP_EOL .
            '<meta name="description" content="' . $this->getMetaDescription() . '">' . PHP_EOL .
            '<meta name="author" content="' . $this->getMetaAuthor() . '">' . PHP_EOL .
            '<meta name="keywords" content="' . $this->getMetaKeywords() . '">' . PHP_EOL;
    }


}