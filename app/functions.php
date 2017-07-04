<?php

function env($var = null){
    if(!is_null($var)){
      if($var === 'CACHE'){
        return filter_var(getenv($var), FILTER_VALIDATE_BOOLEAN);
      }elseif($var === 'ENV'){
        if(getenv($var) === 'local'){
          return true;
        }else{
          return false;
        }
      }
    } else {
        return false;
    }
}
