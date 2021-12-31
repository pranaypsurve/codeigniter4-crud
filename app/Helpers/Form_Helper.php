<?php

function display_error($validation,$fieldName){
    if(isset($validation)){
        if($validation->hasError($fieldName)){
            return $validation->getError($fieldName);
        }
    }
}

?>