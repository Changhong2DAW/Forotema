<?php
Class categorie{
    private $cat_id;
    private $cat_name;
    private $cat_description;

    function __construct($cat_id,$cat_name,$cat_description){
        $this->$cat_id=$cat_id;
        $this->$cat_name=$cat_name;
        $this->$cat_description=$cat_description;
    }
}
?>