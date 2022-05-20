<?php
/*ข้อมูลรับรองฐานข้อมูล สมมติว่าคุณใช้งาน MySQL
เซิร์ฟเวอร์ที่มีการตั้งค่าเริ่มต้น (ผู้ใช้ 'root' โดยไม่มีรหัสผ่าน) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kkuswim');

/* พยายามเชื่อมต่อกับฐานข้อมูล MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// ตรวจสอบการเชื่อมต่อ
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

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
        $result = mysqli_query($this->dbcon, "SELECT * FROM listprogram");
        return $result;
    }

    public function fetchonerecord($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM listprogram WHERE id = '$id'");
        return $result;
    }
    //ลบข้อมูล
    public function delete($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM listprogram WHERE id = '$id'");
        return $deleterecord;
    }
    //เพิ่มข้อมูล
    public function insert($list, $age, $sex, $dateprogram)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO listprogram(list, age, sex, dateprogram) 
        VALUES('$list', '$age', '$sex', '$dateprogram')");
        return $result;
    }
    //อัพเดตข้อมูล

    //------------------------------------------------------------------------------------------------------------------------------------
}
