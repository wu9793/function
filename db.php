<?php
// all()-給定資料表名後，會回傳整個資料表的資料
// $rows = all('students',['dept'=>'3']);
// dd($rows);


// find()-會回傳資料表指定id的資料
// $row = find('students',['dept'=>'1','graduate_at'=>'23'] );
// echo "<h3>相同條件使用find()</h3>";
// dd($row);
// $rows = all('students',['dept'=>'1','graduate_at'=>'23'] );
// echo "<h3>相同條件使用all()</h3>";
// dd($rows);

// $up=update("students",'3',['dept'=>'16','name'=>'張明珠']);
// dd($up);

// insert('dept',['code'=>'112','name'=>'運管系']);

// del('students',['dept'=>5,'status_code'=>'001']);

date_default_timezone_set("Asia/Taipei");
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

function all($table = null, $where = '', $other = '')
{
    global $pdo;
    $sql = "select * from `$table` ";

    if (isset($table) && !empty($table)) {

        if (is_array($where)) {
            // ['dept'=>'2','graduate_at'=>12] => where `dept`='2' && `graduate_at`='12'
            // $sql="select * from `table` where `dept`='2' && `graduate_at`='12'"

            if (!empty($where)) {
                foreach ($where as $col => $value) {
                    $tmp[] = "`$col`='$value'";
                }
                $sql .= " where " . join(" && ", $tmp);
            }
        } else {
            $sql .= " $where";
        }
        $sql .= $other;
        $rows = $pdo->query($sql)->fetchAll();
        return $rows;
    } else {
        echo "錯誤:沒有指定的資料表名稱";
    }
}


function find($table, $id)
{
    global $pdo;
    $sql = "select * from `$table` ";

    // 判斷是否為陣列
    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= " where " . join(" && ", $tmp);
        // 判斷是否為數字
    } else if (is_numeric($id)) {
        $sql .= " where `id`='$id'";
    } else {
        echo "錯誤:參數的資料型態必須是數字或陣列";
    }
    echo 'find=>' . $sql;
    $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}



function update($table, $id, $cols)
{
    global $pdo;

    $sql = "update `$table` set";

    if (!empty($cols)) {
        foreach ($cols as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
    } else {
        echo "錯誤:缺少要編輯的欄位陣列";
    }

    $sql .= join(",", $tmp);

    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= " where " . join(" && ", $tmp);
    } else if (is_numeric($id)) {
        $sql .= " where `id`='$id'";
    } else {
        echo "錯誤:參數的資料型態必須是數字或陣列";
    }

    echo $sql;
    return $pdo->exec($sql);
}


function insert($table, $values)
{
    global $pdo;
    $sql = "insert into `$table`";
    $cols = "(`" . join("`,`", array_keys($values)) . "`)";
    $vals = "('" . join("','", $values) . "')";

    $sql = $sql . $cols . "values " . $vals;

    return $pdo->exec($sql);
}


function del($table, $id)
{
    global $pdo;
    $sql = "delete from `$table` where ";

    // 判斷是否為陣列
    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= join(" && ", $tmp);
        // 判斷是否為數字
    } else if (is_numeric($id)) {
        $sql .= "`id`='$id'";
    } else {
        echo "錯誤:參數的資料型態必須是數字或陣列";
    }
    // echo $sql;

    return $pdo->exec($sql);
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
