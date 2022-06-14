<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'kkuswim');

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
    public function insert($day, $poise, $distance, $timer, $babydetail_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO record(day, poise, distance, timer, babydetail_id) 
        VALUES('$day', '$poise', '$distance', '$timer', '$babydetail_id')");
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

    //ดึงข้อมูลในdatabaseของ babydetail
    public function fetchdata2()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM `babydetail` WHERE babydetail.status = '1'");
        return $result;
    }

    //เพิ่มข้อมูล babydetail
    public function insert2($name, $lastname, $nickname, $sexbaby, $birthday, $agebaby, $path, $parent_id, $status)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO babydetail(name, lastname, nickname, sexbaby, birthday, agebaby, image, parent_id, status) 
        VALUES('$name', '$lastname', '$nickname', '$sexbaby', '$birthday', '$agebaby', '$path', '$parent_id', '$status')");
        return $result;
    }
    //ลบข้อมูล babydetail
    public function delete2($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "UPDATE `babydetail` SET `status`= '0' WHERE id = '$id'");
        return $deleterecord;
    }
    //อัพเดตข้อมูลlistprpgram
    public function update2($id, $name, $lastname, $nickname, $sexbaby, $birthday, $agebaby, $path)
    {
        $result = mysqli_query($this->dbcon, "UPDATE babydetail SET 
             name = '$name',
             lastname = '$lastname',
             nickname = '$nickname',
             sexbaby = '$sexbaby',
             birthday = '$birthday',
             agebaby = '$agebaby',
             image = '$path'
             WHERE id = '$id'
         ");
        return $result;
    }

    //parentdetail
    public function fetchdata3()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM parentdetail");
        return $result;
    }

    //เพิ่มข้อมูล parentdetail
    public function insert3($namefather, $rsfather, $phonefather, $emailfather, $namemother, $rsmother, $phonemother, $emailmother, $address, $quiry_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO parentdetail(namefather, rsfather, phonefather, emailfather, namemother, rsmother, phonemother, emailmother, address, quiry_id) 
        VALUES('$namefather', '$rsfather', '$phonefather', '$emailfather', '$namemother', '$rsmother', '$phonemother', '$emailmother', '$address', '$quiry_id')");
        return $result;
    }

    //อัพเดตข้อมูล parentdetail
    public function update3($id, $namefather, $rsfather, $phonefather, $emailfather, $namemother, $rsmother, $phonemother, $emailmother, $address)
    {
        $result = mysqli_query($this->dbcon, "UPDATE parentdetail SET 
              namefather = '$namefather',
              rsfather = '$rsfather',
              phonefather = '$phonefather',
              emailfather = '$emailfather',
              namemother = '$namemother',
              rsmother = '$rsmother',
              phonemother = '$phonemother',
              emailmother = '$emailmother',
              address = '$address'
              WHERE id = '$id'
          ");
        return $result;
    }
    //ลบข้อมูล babydetail
    public function delete3($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM babydetail WHERE id = '$id'");
        return $deleterecord;
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //ดึงสองตารางมาโชว์
    public function fetchdata4()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM `babydetail`, parentdetail, inquiry 
        WHERE babydetail.parent_id = parentdetail.id 
        AND parentdetail.quiry_id = inquiry.inquiry_id  
        AND babydetail.status = '1'");
        return $result;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //โชว์ข้อมูล inquiry
    public function fetchdata5()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM inquiry");
        return $result;
    }

    //เพิ่มข้อมูล inquiry
    public function insert4($study, $location, $anytime, $level, $pool, $disease, $details)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO inquiry(study, location, anytime, level, pool, disease, details) 
        VALUES('$study', '$location', '$anytime', '$level', '$pool', '$disease', '$details')");
        return $result;
    }

    //อัพเดตข้อมูลของ inquiry
    public function update4($inquiry_id, $study, $location, $anytime, $level, $pool, $disease, $details)
    {
        $result = mysqli_query($this->dbcon, "UPDATE inquiry SET 
             study = '$study',
             location = '$location',
             anytime = '$anytime',
             level = '$level',
             pool = '$pool',
             disease = '$disease',
             details = '$details'
             WHERE quiry_id = '$inquiry_id'
         ");
        return $result;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //ดึงสองตารางมาโชว์ของหน้า showrecord.php
    public function fetchdata6()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM babydetail
        WHERE 1");
        return $result;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function insert6($listprogram_id, $poise, $distance, $b8_b9, $b10_b11, $b1213, $b1415, $g8_g9, $g10_g11, $g12_g13, $g14_g15)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO detailslist(listprogram_id, poise, distance, b8_b9, b10_b11, b1213, b1415, g8_g9, g10_g11, g12_g13, g14_g15)  
        VALUES('$listprogram_id', '$poise', '$distance', '$b8_b9', '$b10_b11', '$b1213', '$b1415', '$g8_g9', '$g10_g11', '$g12_g13', '$g14_g15')");
        return $result;
    }

    public function signin($phonemother)
    {
        $signinquery = mysqli_query($this->dbcon, "SELECT phonemother FROM parentdetail WHERE phonemother = '$phonemother'");
        return $signinquery;
    }
}