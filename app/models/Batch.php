<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 1/28/2019
 * Time: 8:11 AM
 */

namespace Hda\models;


class Batch
{
    protected $id;
    protected $drugID;
    protected $batch;
    protected $dom;
    protected $expiry;
    protected $reason;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDrugID()
    {
        return $this->drugID;
    }

    /**
     * @param mixed $drugID
     */
    public function setDrugID($drugID)
    {
        $this->drugID = $drugID;
    }

    /**
     * @return mixed
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * @param mixed $batch
     */
    public function setBatch($batch)
    {
        $this->batch = $batch;
    }

    /**
     * @return mixed
     */
    public function getDom()
    {
        return $this->dom;
    }

    /**
     * @param mixed $dom
     */
    public function setDom($dom)
    {
        $this->dom = $dom;
    }

    /**
     * @return mixed
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * @param mixed $expiry
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }




}