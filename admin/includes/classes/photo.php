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
}