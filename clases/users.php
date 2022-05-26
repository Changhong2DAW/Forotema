<?php
Class user{
    private $user_id;
    private $user_name;
    private $user_pass;
    private $user_email;
    private $user_date;
    private $user_level;

    function __construct($user_id,$user_name,$user_pass,$user_email,$user_date,$user_level){
        $this->$user_id=$user_id;
        $this->$user_name=$user_name;
        $this->$user_pass=$user_pass;
        $this->$user_email=$user_date;
        $this->$user_level=$user_level;
    }
}
?>