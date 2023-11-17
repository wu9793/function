<?php

$rows = all('students',['dept'=>'3']);

dd($rows);

function all($table=null,$where='',$other=''){

    $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    $pdo = new PDO($dsn, 'root', '');
    $sql = "select * from `$table` ";

    if (isset($table) && !empty($table)) {

        if(is_array($where)){
            
        
        if(!empty($where)){
                foreach($where as $col => $value){
                    $tmp[]="`$col`='$value'";
                }
                $sql .= " where ".join(" && ",$tmp);
            }
        }else{
            $sql .= " $where";
        }
        $sql .=$other;
        $rows = $pdo->query($sql)->fetchAll();
        return $rows;
    }else{
        echo "錯誤:沒有指定的資料表名稱";
    }
}
    function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>