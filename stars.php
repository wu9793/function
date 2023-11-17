<style>
    * {
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<?php
stars('正三角形',9);
stars('菱形',9);
stars('矩形',9);
stars('變形矩形',9);



function stars($shape,$size){
    switch($shape){
        case'正三角形';
            triangle($size);
        break;
        case'菱形';
            diamond($size);
        break;
        case'矩形';
            retangle($size);
        break;
        case'變形矩形';
            trapezoid($size);
        break;
    }
}

// triangle(5);
// triangle(20);

// 正三角形
function triangle($size){
    for ($i = 0; $i < $size; $i++) { //行列數
        for ($j = 0; $j < ($size - 1 - $i); $j++) { //內圈印空格數
            echo "&nbsp;";
        }
        for ($k = 0; $k < ($i * 2 + 1); $k++) { //內圈印星星
            echo "*";
        }

        echo "<br>";
    }
}


// diamond(7);
// 菱形
function diamond($size){
    $mid = floor(($size * 2 - 1) / 2);
    $temp = 0;
    for ($i = 0; $i < ($size * 2 - 1); $i++) {

        if ($i <= $mid) {
            $temp = $i;
        } else {
            $temp--;
        }

        for ($j = 0; $j < ($mid - $temp); $j++) {
            echo "&nbsp;";
        }
        for ($k = 0; $k < ($temp * 2 + 1); $k++) {
            echo "*";
        }

        echo "<br>";
    }
}

// retangle(5);
// retangle(7);
// retangle(9);

// 矩形
function retangle($size){
    for($i=0;$i<$size;$i++){

    for($j=0;$j<$size;$j++){
        if($i==0 || $i==($size-1)){
        echo "*";
        }else if($j==0 || $j==($size-1)){
            echo "*";
        }else{
            echo "&nbsp;";
        }
    
    }
    echo "<br>";
}
}

function trapezoid($size){
    for($i=0;$i<$size;$i++){

    for($j=0;$j<$size;$j++){
        if($i==0 || $i==($size-1)){
        echo "*";
        }else if($i==$j || $i+$j==($size-1)){
            echo "<span style='color:red'>*</span>";
        }
        else if($j==0 || $j==($size-1)){
            echo "*";
        }else{
            echo "&nbsp;";
        }
    
    }
    echo "<br>";
}

}

?>