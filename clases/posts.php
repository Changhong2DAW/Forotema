<?php
Class post{
    private $post_id;
    private $post_content;
    private $post_date;
    private $post_topic;
    private $post_by;

    function __construct($post_id,$post_content,$post_date,$post_topic,$post_by){
        $this->$post_id=$post_id;
        $this->$post_content=$post_content;
        $this->$post_date=$post_date;
        $this->$post_topic=$post_topic;
        $this->$post_by=$post_by;
    }
}
?>