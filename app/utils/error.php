<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 9/30/2018
 * Time: 10:51 PM
 */

namespace Hda\utils;


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

        echo '<script>toastr.'.$this->gettype().'("'.$this->getMessage().'", "'.$this->getTitle().'");</script>';

    }

}