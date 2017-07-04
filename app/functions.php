<?php

function env($var = null){
    if(!is_null($var)){
        return filter_var(getenv($var), FILTER_VALIDATE_BOOLEAN);
    } else {
        return false;
    }
}