<?php


class Photo extends DbClass
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
    public $placeHolder = "https://via.placeholder.com/150";


    public function imagePath(){
        return empty($this->filename) ? $this->placeHolder : $this->uploadDirectory.DS.$this->filename;


    }

    public function save(){
        if($this->id){
           $this->update();
        }else{


            if(!empty($this->customErrors)){
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