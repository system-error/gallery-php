<?php

class Comment extends DbClass
{
    protected static $dbTable = "comments";
    protected static $dbTableFields = array('id','photoId','author','body');
    public $id;
    public $photoId;
    public $author;
    public $body;

    public static function createComment($photoId,$author = "John Doe",$body = ""){
        $comment = new Comment();

        if(!empty($photoId) && !empty($author) && !empty($body)){

            $comment->photoId = (int)$photoId;
            $comment->author  = $author;
            $comment->body    = $body;

            return $comment;
        }else{
            return false;
        }
    }

    public static function findTheComment($photoId){
        global $database;

        $sql = "SELECT * FROM ". self::$dbTable;
        $sql.= " WHERE photoId = " . $database->escapeString($photoId);
        $sql.= " ORDER BY photoId ASC";

        return self::doTheQuery($sql);
    }


}