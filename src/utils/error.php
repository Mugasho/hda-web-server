<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 9/30/2018
 * Time: 10:51 PM
 */

namespace utils;


class error
{
    public $message;
    public $title;
    public $type;
    public $errorMsg=false;

    /**
     * error constructor.
     * @param $message
     * @param $title
     * @param $type
     */
    public function __construct($message, $title, $type)
    {
        $this->message = $message;
        $this->title = $title;
        $this->type = $type;
       $this->errorMsg=true;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function gettype()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function settype($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * @param mixed $errorMsg
     */
    public function setErrorMsg($errorMsg)
    {
        $this->errorMsg = $errorMsg;
    }

    public function showMessage()
    {
        echo '<div class="sufee-alert alert with-close alert-' . $this->gettype() . ' alert-dismissible fade show">';
        if ($this->getTitle() != null) {
            echo '<span class="badge badge-pill badge-' . $this->gettype() . '">' . $this->getTitle() . '</span>';
        }
        echo $this->getMessage() . '
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>';
    }

}