<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 12/27/2018
 * Time: 7:24 PM
 */

namespace Hda\models;


class Drug
{
    public $ndaRegNo;
    public $licenseHolder;
    public $localVendor;
    public $name_of_drug;
    public $genericName;
    public $drugStrength;
    public $manufacturer;
    public $country;
    public $dosage;
    public $packSize;

    /**
     * Drug constructor.
     * @param $name_of_drug
     */
    public function __construct($name_of_drug)
    {
        $this->name_of_drug = $name_of_drug;
    }


    /**
     * @return mixed
     */
    public function getNdaRegNo()
    {
        return $this->ndaRegNo;
    }

    /**
     * @param mixed $ndaRegNo
     */
    public function setNdaRegNo($ndaRegNo)
    {
        $this->ndaRegNo = $ndaRegNo;
    }

    /**
     * @return mixed
     */
    public function getLicenseHolder()
    {
        return $this->licenseHolder;
    }

    /**
     * @param mixed $licenseHolder
     */
    public function setLicenseHolder($licenseHolder)
    {
        $this->licenseHolder = $licenseHolder;
    }

    /**
     * @return mixed
     */
    public function getLocalVendor()
    {
        return $this->localVendor;
    }

    /**
     * @param mixed $localVendor
     */
    public function setLocalVendor($localVendor)
    {
        $this->localVendor = $localVendor;
    }

    /**
     * @return mixed
     */
    public function getNameOfDrug()
    {
        return $this->name_of_drug;
    }

    /**
     * @param mixed $name_of_drug
     */
    public function setNameOfDrug($name_of_drug)
    {
        $this->name_of_drug = $name_of_drug;
    }

    /**
     * @return mixed
     */
    public function getGenericName()
    {
        return $this->genericName;
    }

    /**
     * @param mixed $genericName
     */
    public function setGenericName($genericName)
    {
        $this->genericName = $genericName;
    }

    /**
     * @return mixed
     */
    public function getDrugStrength()
    {
        return $this->drugStrength;
    }

    /**
     * @param mixed $drugStrength
     */
    public function setDrugStrength($drugStrength)
    {
        $this->drugStrength = $drugStrength;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
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

    /**
     * @return mixed
     */
    public function getPackSize()
    {
        return $this->packSize;
    }

    /**
     * @param mixed $packSize
     */
    public function setPackSize($packSize)
    {
        $this->packSize = $packSize;
    }




}