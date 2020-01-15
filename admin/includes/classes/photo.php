<?php


class photo extends dbClass
{
    protected static $dbTable = "photos";
    protected static $dbTableFields = array('id','title','caption','description','filename','alternateText','type','size','uploadedAt');
    public $id;
    public $title;
    public $description;
    public $alternateText;
    public $caption;
    public $uploadedAt;
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
            $this->tmpPath  = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];

        }
    }

    public function imagePath(){
        return $this->uploadDirectory.DS.$this->filename;
    }

    public function save(){
        if($this->id){
           $this->update();
        }else{

            if(!empty($customErrors)){
                return false;
            }
            if(empty($this->filename) || empty($this->tmpPath)){
                $this->customErrors[] = "The file was not available ";
                return false;
            }

            $photoPath = IMAGES_PATH.DS.$this->filename;
            if(file_exists($photoPath)){
                $this->customErrors[] = "The file {$this->filename} already exists";
                return false;
            }

            if(move_uploaded_file($this->tmpPath,$photoPath)){
                if($this->create()){
                    unset($this->tmpPath);
                    return true;
                }
            }else{
                $this->customErrors[] = "The file directory propably does not have permisions";
                return false;
            }
        }
    }

    public function deleteImage(){

        if($this->delete()){
            $targetPath = IMAGES_PATH.DS.$this->filename;
            return unlink($targetPath) ? true : false;
        }else{
            return false;
        }

    }


}