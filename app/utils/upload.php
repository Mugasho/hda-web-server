<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/12/2019
 * Time: 5:28 PM
 */
namespace Hda\utils;

class upload{
    public $uploadDir;
    public $uploadStatus=1;
    public $imageFileType;
    public $fileSize;
    public $fileName;
    public $tmpName;
    public $files;

    /**
     * upload constructor.
     * @param $uploadDir
     * @param $files
     */
    public function __construct($uploadDir, $files)
    {
        $this->uploadDir = !is_null($uploadDir)?$uploadDir:APP_ROOT.'public/uploads/';
        $this->files = $files;
        $this->uploadStatus=Array();
        if(!is_null($files)){
            $this->setFileName($files['name']);
            $this->setFileSize($files['size']);
            $this->setTmpName($files['tmp_name']);
        }else{
            $this->uploadStatus['error']=true;
        }

    }


    /**
     * @return mixed
     */
    public function getUploadDir()
    {
        return $this->uploadDir;
    }

    /**
     * @param mixed $uploadDir
     */
    public function setUploadDir($uploadDir)
    {
        $this->uploadDir = $uploadDir;
    }

    /**
     * @return mixed
     */
    public function getUploadStatus()
    {
        return $this->uploadStatus;
    }

    /**
     * @param mixed $uploadStatus
     */
    public function setUploadStatus($uploadStatus)
    {
        $this->uploadStatus = $uploadStatus;
    }

    /**
     * @return mixed
     */
    public function getImageFileType()
    {
        return $this->imageFileType;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }


    /**
     * @param mixed $imageFileType
     */
    public function setImageFileType($imageFileType)
    {
        $this->imageFileType = $imageFileType;
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param mixed $fileSize
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
    }



    public function checkFakeImage(){
        $check = getimagesize($this->getTmpName());
        if($check !== false) {
            $this->setImageFileType($check["mime"]);
            $this->uploadStatus['error']=false;
            $this->uploadStatus['mime']=$check["mime"];
            return true;
        } else {
            $this->setImageFileType(null);
            $this->uploadStatus['error']=true;
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getTmpName()
    {
        return $this->tmpName;
    }

    /**
     * @param mixed $tmpName
     */
    public function setTmpName($tmpName)
    {
        $this->tmpName = $tmpName;
    }



    /**
     * @param $imageFileType
     * @return bool
     */
    public function isAllowedFormats($imageFileType)
    {
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->setUploadStatus(0);
            return false;
        }
    }


    public function startUpload(){
        $target_dir = $this->getUploadDir();
        $target_file = $target_dir .$this->getFileName();
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $this->checkFakeImage();

// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($this->getFileSize() > 500000) {
            $this->uploadStatus['error'] = true;
            $this->uploadStatus['msg'] = "Sorry, your file is too large";
        }
// Allow certain file formats
        $this->isAllowedFormats($imageFileType);
// Check if $uploadOk is set to 0 by an error
        if ($this->uploadStatus['error'] == true) {
            $this->uploadStatus['code'] = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($this->getTmpName(), $target_file)) {
                $this->uploadStatus['name']=BASE_PATH.'app/public/uploads/'.$this->getFileName();
                $this->uploadStatus['size']=$this->getFileSize();
            }
        }
        return $this->uploadStatus;
    }
}