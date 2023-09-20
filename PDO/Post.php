<?php
class Post{
    public $id;
    public $username;
    public $message;
    public $createDate;

    public function __construct()
    {
        if(is_int($this->createDate) || is_string($this->createDate)){
        $this->createDate = new DateTime(is_string($this->createDate) ? $this->createDate : "@".$this->createDate);
    }
    }
    // public function getExcerpt(){
    //     return substr($this->message, 150);
    // }
}