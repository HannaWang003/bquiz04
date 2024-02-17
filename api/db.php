<?php
date_default_timezone_set("Asia/Taipei");
session_start();
function dd($ary)
{
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
function to($url)
{
    header("location:$url");
}
class DB
{
    protected $table;
    // protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db3304";
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db33";
    protected $pdo;
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    private function a2s($ary)
    {
        foreach ($ary as $idx => $val) {
            $tmp[] = "`$idx`='$val'";
        }
        return $tmp;
    }
    private function sql_all($sql, $where, $other)
    {
        if (is_array($where)) {
            $sql .= " where " . join(" && ", $this->a2s($where));
        } else {
            $sql .= " $where";
        }
        $sql .= " $other";
        return $sql;
    }
    private function math($math, $col, $where, $other)
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        if (isset($this->table) && !empty($this->table)) {
            $sql = $this->sql_all($sql, $where, $other);
            return $this->pdo->query($sql)->fetchColumn();
        }
    }
    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        if (isset($this->table) && !empty($this->table)) {
            $sql = $this->sql_all($sql, $where, $other);
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        if (isset($this->table) && !empty($this->table)) {
            $sql = $this->sql_all($sql, $where, $other);
            return $this->pdo->query($sql)->fetchColumn();
        }
    }
    function sum($col, $where = '', $other = '')
    {
        return $this->math("sum", $col, $where, $other);
    }
    function max($col, $where = '', $other = '')
    {
        return $this->math("max", $col, $where, $other);
    }
    function min($col, $where = '', $other = '')
    {
        return $this->math("min", $col, $where, $other);
    }
    function avg($col, $where = '', $other = '')
    {
        return $this->math("avg", $col, $where, $other);
    }
    function find($where)
    {
        $sql = "select * from `$this->table` ";
        if (is_array($where)) {
            $sql .= " where " . join(" && ", $this->a2s($where));
        } elseif (is_numeric($where)) {
            $sql .= " where `id`=" . $where;
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function save($ary)
    {
        if (isset($ary['id'])) {
            $sql = "update `$this->table` set ";
            if (!empty($ary)) {
                $tmp = $this->a2s($ary);
                $sql .= join(",", $tmp);
                $sql .= " where `id`={$ary['id']}";
            }
        } else {
            $sql = "insert into `$this->table` ";
            $col = "(`" . join("`,`", array_keys($ary)) . "`)";
            $val = "('" . join("','", $ary) . "')";
            $sql .= " $col VALUES $val";
        }
        return $this->pdo->exec($sql);
    }
    function del($ary = '')
    {
        $sql = "delete from $this->table";
        if (is_array($ary)) {
            $sql .= " where " . join(" && ", $this->a2s($ary));
        } elseif (is_numeric($ary)) {
            $sql .= " where `id`=" . $ary;
        }
        return $this->pdo->exec($sql);
    }
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
$Bot = new DB('bottom');
$Admin = new DB('admin');
$Mem = new DB('mem');
$Type = new DB('type');
$Goods = new DB('goods');
