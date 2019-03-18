<?php

function pickColor($percent){
    if ($percent >= 100) {
        $rgb[0] = 0;
        $rgb[1] = 200;
        $rgb[2] = 0;
    }elseif ($percent >50) {
        $rgb[0] = (-5.1*$percent)+510;
        $rgb[1] = 200;
        $rgb[2] = 0;
    }elseif ($percent >20) {
        $rgb[0] = 255;
        $rgb[1] = (6.67*$percent)-133;
        $rgb[2] = 0;
    }else {
        $rgb[0] = 255;
        $rgb[1] = 0;
        $rgb[2] = 0;
    }
    return $rgb;
}








 ?>
