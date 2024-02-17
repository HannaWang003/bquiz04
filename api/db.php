<?php
date_default_timezone_set('Asia/Taipei');
session_start();

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url)
{
    header("location:$url");
}
class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db33";
    protected $pdo;
    protected $table;
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    function all($where = '', $other = '')
    {
        if (isset($this->table) && !empty($this->table)) {
            $sql = "select * from `$this->table` ";
            $sql = $this->sql_all($sql, $where, $other);
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return  $this->pdo->query($sql)->fetchColumn();
    }
    private function math($math, $col, $array = '', $other = '')
    {
        $sql = "select $math(`$col`)  from `$this->table` ";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col = '', $where = '', $other = '')
    {
        return  $this->math('sum', $col, $where, $other);
    }
    function max($col, $where = '', $other = '')
    {
        return  $this->math('max', $col, $where, $other);
    }
    function min($col, $where = '', $other = '')
    {
        return  $this->math('min', $col, $where, $other);
    }
    function find($where)
    {
        $sql = "select * from $this->table ";
        if (is_array($where)) {
            $tmp = $this->a2s($where);
            $sql .= " where " . join(" && ", $tmp);
        } elseif (is_numeric($where)) {
            $sql .= " where `id`=" . $where;
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set ";
            if (!empty($array)) {
                $tmp = $this->a2s($array);
            }
            $sql .= join(",", $tmp);
            $sql .= " where `id`='{$array['id']}'";
        } else {
            $sql = "insert into `$this->table`";
            $tmp = array_keys($array);
            $col = "`" . join("`,`", $tmp) . "`";
            $val = "'" . join("','", $array) . "'";
            $sql .= " ($col) VALUES ($val)";
        }
        return $this->pdo->exec($sql);
    }
    function del($where)
    {
        $sql = "delete from `$this->table` where ";
        if (is_array($where)) {
            $tmp = $this->a2s($where);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($where)) {
            $sql .= " `id`='$where'";
        }
        return $this->pdo->exec($sql);
    }
    private function a2s($where)
    {
        foreach ($where as $key => $val) {
            $tmp[] = "`$key`='$val'";
        }
        return $tmp;
    }
    private function sql_all($sql, $where, $other)
    {
        if (is_array($where)) {
            if (!empty($where)) {
                $sql .= " where " . join(" && ", $this->a2s($where));
            }
        } else {
            $sql .= $where;
        }
        $sql .= $other;
        return $sql;
    }
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
$Bottom = new DB('bottom');
$Mem = new DB('mem');
$Admin = new DB('admin');
$Type = new DB('type');
$Goods = new DB('goods');
//資料表

//判斷是否瀏覽過