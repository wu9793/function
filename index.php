<h1>自訂含式</h1>
<?php

function sum($a, $b)
{

    $sum = $a + $b;
    echo "輸入:" . $a . "、" . $b;
    echo "<br>";
    return $sum;
}

$sum = sum(10, 20);
echo "總和是:" . $sum;
echo "<hr>";

echo "總和是:" . sum(90, 30);
echo "<hr>";
echo "總和是:" . sum(50, 60);
?>

<h2>不定參數</h2>
<?php
function sum2(...$arg){
    $sum=0;
    foreach($arg as $num){
        // 判斷是否為數字
        if(is_numeric($num)){
            $sum +=$num;
        }
    }
    return $sum;
}

echo sum2(1,2);
echo "<hr>";
echo sum2(23,45,67);
echo "<hr>";


?>

<h2>自訂函式預設值</h2>

<?php
function sum3($a,$b,$c=5){
    $sum=($a+$b)*$c;
    echo "$a 、 $b ,倍數 $c <br>";
    return $sum;
}

echo "總和是".sum3(10,20);
echo "<hr>";
echo "總和是".sum3(10,20,30);
echo "<hr>";

?>