<?php
Class topic{
    private $topic_id;
    private $topic_subject;
    private $topic_date;
    private $topic_cat;
    private $topic_by;

    function __construct($topic_id,$topic_subject,$topic_date,$topic_cat,$topic_by){
        $this->$topic_id=$topic_id;
        $this->$topic_subject=$topic_subject;
        $this->$topic_date=$topic_date;
        $this->$topic_cat=$topic_cat;
        $this->$topic_by=$topic_by;
    }
}
?>