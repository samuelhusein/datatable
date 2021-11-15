<?php

function getData($param){
    $data = file_get_contents('data.json');
    if($param==0){
        $ret =  json_decode($data);
    }else{
        $ret = array_filter(json_decode($data), function($value) use ($param){
            return $value->usia == $param;
        });
    }
    echo json_encode(array_values($ret));
}
if (isset($_POST['callFunction'])) {
    echo getData($_POST['param']);
}