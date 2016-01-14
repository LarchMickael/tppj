<?php 
    function isValSet($array, $val) {
        $ret = false;
        foreach ($array as $value) {
            if($value == $val)  {
                $ret = true;
            }
        }

        return $ret;
    }

    function clean($field){
        $field = trim($field);
        $field = addslashes($field);
        return $field;
    }
 ?>