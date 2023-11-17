<style>
    *{
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<?php

triangle(5);
triangle(20);




function triangle($size){
    for($i=0;$i<$size;$i++){ //行列數
    for($j=0;$j<($size-1-$i);$j++){ //內圈印空格數
        echo "&nbsp;";
    }    
    for($k=0;$k<($i*2+1);$k++){ //內圈印星星
          echo "*";  
    }
     
echo "<br>";
}
}



?>