<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'kkuswim', 'listprogram');

class DB_con
{

    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    //ดึงข้อมูลในdatabaseของrecord
    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM record");
        return $result;
    }

    //ลบข้อมูล record
    public function delete($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM record WHERE id = '$id'");
        return $deleterecord;
    }


    //เพิ่มข้อมูล record
    public function insert($list, $age, $sex, $statistics, $number, $style)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO record(list, age, sex, statistics, number, style) 
        VALUES('$list', '$age', '$sex', '$statistics', '$number', '$style')");
        return $result;
    }

    //อัพเดตข้อมูล record
    public function update($id, $list, $age, $sex, $statistics, $number, $style)
    {
        $result = mysqli_query($this->dbcon, "UPDATE record SET 
            list = '$list',
            age = '$age',
            sex = '$sex',
            statistics = '$statistics',
            number = '$number',
            style = '$style'
            WHERE id = '$id'
        ");
        return $result;
    }

    //------------------------------------------------------------------------------------------------------------------------------------

    //ดึงข้อมูลในdatabaseของ listprogram
    public function fetchdata1()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM listprogram");
        return $result;
    }

    //ลบข้อมูล listprogram
    public function deletelist($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM listprogram WHERE id = '$id'");
        return $deleterecord;
    }

    //เพิ่มข้อมูล listprogram
    public function insertlist($list, $age, $sex, $dateprogram)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO listprogram(list, age, sex, dateprogram) 
        VALUES('$list', '$age', '$sex', '$dateprogram')");
        return $result;
    }

    //อัพเดตข้อมูลlistprpgram
    public function updatelist($id, $list, $age, $sex, $dateprogram)
    {
        $result = mysqli_query($this->dbcon, "UPDATE listprogram SET 
            list = '$list',
            age = '$age',
            sex = '$sex',
            dateprogram = '$dateprogram'
            WHERE id = '$id'
        ");
        return $result;
    }

    //------------------------------------------------------------------------------------------------------------------------------------
}