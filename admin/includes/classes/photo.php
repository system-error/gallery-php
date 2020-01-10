<?php


class photo extends dbClass
{
    protected static $dbTable = "photos";
    protected static $dbTableFields = array('id','title','description','filename','type','size');
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $tmpPath;
    public $uploadDirectory = "images";
    public $customErrors = array();
    public $uploadErrors = array(
        UPLOAD_ERR_OK         => "There is no error",
        UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_file_size directive",
        UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder. Introduced in PHP 5.0.3",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk. Introduced in PHP 5.1.0",
        UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload"
    );

    public function setFile($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->customErrors[] = "There was no file uploaded here";
            return false;
        }elseif ($file['error'] !=0){
            $this->customErrors[] = $this->uploadErrors[$file['error']];
            return false;
        }else {
            $this->filename = basename($file['name']);
            $this->tmpPath  = $file['tmpPath'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];

        }
    }

}