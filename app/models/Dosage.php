<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 12/27/2018
 * Time: 3:07 PM
 */

namespace Hda\models;


class Dosage
{
public $id;
public $drugID;
public $adultDose;
public $childDose;
public $dosingForm;
public $dosage;

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
    public function getAdultDose()
    {
        return $this->adultDose;
    }

    /**
     * @param mixed $adultDose
     */
    public function setAdultDose($adultDose)
    {
        $this->adultDose = $adultDose;
    }

    /**
     * @return mixed
     */
    public function getChildDose()
    {
        return $this->childDose;
    }

    /**
     * @param mixed $childDose
     */
    public function setChildDose($childDose)
    {
        $this->childDose = $childDose;
    }


    /**
     * @return mixed
     */
    public function getDosingForm()
    {
        return $this->dosingForm;
    }

    /**
     * @param mixed $dosingForm
     */
    public function setDosingForm($dosingForm)
    {
        $this->dosingForm = $dosingForm;
    }

    /**
     * @return mixed
     */
    public function getDosage()
    {
        return $this->dosage;
    }

    /**
     * @param mixed $dosage
     */
    public function setDosage($dosage)
    {
        $this->dosage = $dosage;
    }

}