<style>
    * {
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<?php

triangle(5);
triangle(20);




function triangle($size)
{
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


diamond(7);

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

reangle(5);
reangle(7);
reangle(9);


function reangle($size){
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



?>