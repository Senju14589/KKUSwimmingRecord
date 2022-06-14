<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">

<?php
include_once('function.php');

$deletedata = new DB_con();
$insertdata = new DB_con();
$updatedata = new DB_con();
$selecteddata = new DB_con();

//ลบข้อมูล
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $deletedata = new DB_con();
    $sql = $deletedata->deletelist($id);

    if ($sql) {
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location.href='listprogram.php'</script>";
    }
}

// เพิ่มข้อมูล
if (isset($_POST['insert'])) {
    $list = $_POST['list'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $dateprogram = $_POST['dateprogram'];

    $sql = $insertdata->insertlist($list, $age, $sex, $dateprogram);
    if ($sql) {
        echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
        //echo "<script>window.location.href='listprogram.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
        //echo "<script>window.location.href='listprogram.php'</script>";
    }
}

// เพิ่มข้อมูล2
if (isset($_POST['insert2'])) {

    $result = mysqli_query($selecteddata->dbcon, "SELECT MAX(`id`) as list_id FROM `detailslist` WHERE 1");
    $row = mysqli_fetch_array($result);
    $listprogram_id = $row['list'];

    $poise = $_POST['poise'];
    $distance = $_POST['distance'];
    if ($_POST['b8_b9'] == '' || $_POST['b8_b9'] == null) {
        $b8_b9 = NULL;
    } else {
        $b8_b9 = $_POST['b8_b9'];
    }

    $b10_b11 = $_POST['b10_b11'];
    $b1213 = $_POST['b12_b13'];
    $b1415 = $_POST['b14_b15'];
    $g8_g9 = $_POST['g8_g9'];
    $g10_g11 = $_POST['g10_g11'];
    $g12_g13 = $_POST['g12_g13'];
    $g14_g15 = $_POST['g14_g15'];

    $sql = $insertdata->insert6($listprogram_id, $poise, $distance, $b8_b9, $b10_b11, $b1213, $b1415, $g8_g9, $g10_g11, $g12_g13, $g14_g15);
    if ($sql) {
        echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
        //echo "<script>window.location.href='listprogram.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด!');</script>";

        //echo "<script>window.location.href='listprogram.php'</script>";
    }
}

//แก้ไขข้อมูล
if (isset($_POST['updatelist'])) {
    $id = $_POST['id'];
    $list = $_POST['list'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $dateprogram = $_POST['dateprogram'];

    $sql = $updatedata->updatelist($id, $list, $age, $sex, $dateprogram);
    if ($sql) {
        echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
        echo "<script>window.location.href='listprogram.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
        echo "<script>window.location.href='listprogram.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการการแข่งขัน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
    <style>
    /* Note: Try to remove the following lines to see the effect of CSS positioning */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 90px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        z-index: 99;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 11.5rem;
            padding: 0;
        }
    }

    .navbar {
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
    }

    @media (min-width: 767.98px) {
        .navbar {
            top: 0;
            position: sticky;
            z-index: 999;
        }
    }

    .sidebar .nav-link {
        color: #333;
    }

    .sidebar .nav-link.active {
        color: #0d6efd;
    }

    body {
        background: #eeeded;
    }

    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.2s ease-in-out;
        box-sizing: border-box;
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: #FFF;
    }

    .card:hover {
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    .card>.card-inner {
        padding: 10px;
    }

    .card .header h2,
    h3 {
        margin-bottom: 0px;
        margin-top: 0px;
    }

    .card .header {
        margin-bottom: 5px;
    }

    .card img {
        width: 100%;
    }
    </style>

</head>

<body style="background-color:LightGray;">
    <nav class="navbar navbar-light bg-dark p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-0 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <img src="image/1 KKU new.png" alt="" width="60" height="60" class="d-inline-block align-text-center">
            <a class="navbar-brand py-3 " href="index.php">
                <font color="white">
                    <h4>SATIT KKU Swimming</h4>
                </font>
            </a>
        </div>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">หน้าหลัก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="record.php">บันทึกผลการซ้อม</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listprogram.php">รายการแข่งขัน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newuser.php">ข้อมูลของนักกีฬา</a>
            </li>
        </ul>
    </nav>
    <div class="container" align="center">
        <main class="col-md-9  col-lg-10 ">
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1 class="mt-5">รายการการแข่งขัน</h1>
                        <h3 class="mt-2">Competition program</h3> <br>
                        <div align="left">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                เพิ่มรายการแข่ง
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#examplescore">
                                เพิ่มสถิติแต่ละรายการแข่งขัน
                            </button>
                        </div>
                        <hr>
                        <table id="example" class="table table table-hover">
                            <thead>
                                <th>ลำดับ</th>
                                <th>รายการแข่งขัน</th>
                                <th></th>
                                <th></th>
                            </thead>

                            <tbody>
                                <?php

                                include_once('function.php');
                                $fetchdata = new DB_con();
                                $sql = $fetchdata->fetchdata1();
                                while ($row = mysqli_fetch_array($sql)) {

                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['list']; ?></td>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleEdit<?php echo $row['id']; ?>">
                                            แก้ไข
                                        </button>
                                        <!--- modal แก้ไขข้อมูล -->
                                        <div class="modal fade" id="exampleEdit<?php echo $row['id']; ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleEdit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <form action="listprogram.php" method="post">
                                                            <div class="container row col-lg-12">
                                                                <!-- แก้ไขบันทึกการแข่งขัน -->
                                                                <nav class="navbar bg-light">
                                                                    <div class="container-fluid">
                                                                        <div class="toast-header">
                                                                            <strong
                                                                                class="me-auto">แก้ไขรายการแข่ง</strong>
                                                                        </div>
                                                                    </div>
                                                                </nav>
                                                                <!-- ดึงID -->
                                                                <div class="mb-4">
                                                                    <input type="hidden" name="id"
                                                                        value="<?php echo $row['id']; ?>">
                                                                    </input>
                                                                </div>
                                                                <!-- แก้ไขรายการแข่งขัน -->
                                                                <div class="mb-4">
                                                                    <input type="text" class="form-control" name="list"
                                                                        placeholder="รายการแข่งขัน"
                                                                        value="<?php echo $row['list']; ?>" required>
                                                                    </input>
                                                                </div>
                                                                <!-- แก้ไขบันทึกอายุ -->
                                                                <div class="input-group mb-4">
                                                                    <select class="form-select" name="age">

                                                                        <option <?php if ($row['age'] == "ไม่เกิน 12 ปี") {
                                                                                        echo "selected";
                                                                                    } ?> value="ไม่เกิน 12 ปี">
                                                                            ไม่เกิน 12 ปี
                                                                        </option>
                                                                        <option <?php if ($row['age'] == "ไม่เกิน 15 ปี") {
                                                                                        echo "selected";
                                                                                    } ?> value="ไม่เกิน 15 ปี">
                                                                            ไม่เกิน 15 ปี
                                                                        </option>
                                                                        <option <?php if ($row['age'] == "ไม่เกิน 18 ปี") {
                                                                                        echo "selected";
                                                                                    } ?> value="ไม่เกิน 18 ปี">
                                                                            ไม่เกิน 18 ปี
                                                                        </option>
                                                                        <option <?php if ($row['age'] == "รุ่นประชาชน") {
                                                                                        echo "selected";
                                                                                    } ?> value="รุ่นประชาชน">
                                                                            รุ่นประชาชน
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <!-- แก้ไขบันทึกเพศ -->
                                                                <div class="input-group mb-4">
                                                                    <select class="form-select" name="sex">
                                                                        <option <?php if ($row['sex'] == "ชาย") {
                                                                                        echo "selected";
                                                                                    } ?> value="ชาย">
                                                                            ชาย
                                                                        </option>
                                                                        <option <?php if ($row['sex'] == "หญิง") {
                                                                                        echo "selected";
                                                                                    } ?> value="หญิง">
                                                                            หญิง
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <!-- แก้ไขบันทึกวันแข่ง -->
                                                                <div class="mb-4">
                                                                    <input type="date" name="dateprogram"
                                                                        class="form-control"
                                                                        placeholder="วันที่มีการแข่งขัน"
                                                                        value="<?php echo $row['dateprogram']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <!-- ปุ่มบันทึกการแก้ไข -->
                                                            <button type="submit" name="updatelist"
                                                                class="btn btn-success ">แก้ไขข้อมูล</button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">ยกเลิก!</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="listprogram.php?del=<?php echo $row['id']; ?>" class="btn btn-danger"
                                            onclick="Del(this.href);return false;">ลบ</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!--- modal เพิ่มข้อมูล -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container row col-lg-12">
                        <nav class="navbar bg-light">
                            <div class="container-fluid">
                                <div class="toast-header">
                                    <strong class="me-auto">เพิ่มรายการแข่ง</strong>
                                </div>
                            </div>
                        </nav>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control mt-4" name="list" placeholder="รายการแข่งขัน"
                                    required>
                            </div>
                            <div class="input-group mb-4">
                                <select class="form-select" name="age">
                                    <option selected>รุ่นอายุ</option>
                                    <option value="ไม่เกิน 12 ปี">ไม่เกิน 12 ปี</option>
                                    <option value="ไม่เกิน 15 ปี">ไม่เกิน 15 ปี</option>
                                    <option value="ไม่เกิน 18 ปี">ไม่เกิน 18 ปี</option>
                                    <option value="รุ่นประชาชน">รุ่นประชาชน</option>
                                </select>
                            </div>
                            <div class="input-group mb-4">
                                <select class="form-select" name="sex">
                                    <option selected>เพศ</option>
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="dateprogram">วันที่จัดการแข่งขัน</label>
                                <input type="date" class="form-control" name="dateprogram" required>
                            </div>
                            <button type="submit" name="insert" class="btn btn-success">เพิ่มข้อมูล</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- modal เพิ่มสถิติข้อมูล -->
    <div class="modal fade" id="examplescore" tabindex="-1" role="dialog" aria-labelledby="examplescore"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container row col-lg-12">
                        <nav class="navbar bg-light">
                            <div class="container-fluid">
                                <div class="toast-header">
                                    <strong class="me-auto">เพิ่มสถิติแต่ละรายการแข่งขัน</strong>
                                </div>
                            </div>
                        </nav>
                        <form action="listprogram.php" method="post">
                            <div class="row">
                                <p>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="list">
                                        <option value="">
                                            รายการแข่งที่ใช้เปรียบเที่ยบ
                                        </option>
                                        <?php
                                        $sql4 = "SELECT list FROM listprogram WHERE list != '' GROUP BY list";
                                        $result4 = mysqli_query($fetchdata->dbcon, $sql4);
                                        while ($row4 = mysqli_fetch_array($result4)) {
                                            echo '<option value="' . $row4['list'] . '"> ' . $row4['list'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select class="form-select" name="poise">
                                        <option selected>ท่าการแข่งขัน</option>
                                        <option value="Freestyle">Freestyle</option>
                                        <option value="Breaststroke">Breaststroke</option>
                                        <option value="Backstroke">Backstroke</option>
                                        <option value="Butterfly">Butterfly</option>
                                        <option value="IM">IM</option>
                                    </select>
                                    <select class="form-select" name="distance">
                                        <option selected>ระยะทาง</option>
                                        <option value="50">50เมตร</option>
                                        <option value="100">100เมตร</option>
                                        <option value="200">200เมตร</option>
                                    </select>
                                </div>
                                </p>
                                <h3>ประเภทชาย/หญิง</h3>
                                <h9>กรุณากรอกสถิติสูงสุดที่ทำได้ในแต่ละรุ่นอายุที่กำหนด กรณีช่องที่ว่างในใส่เครื่องหมาย
                                    " - " </h9>

                                <p></p>
                                <h5>ประเภทชาย</h5>
                                <div class="input-group">
                                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 8-9 ปี</label>
                                            <input type="time" step="1" class="form-control" name="b8_b9">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 10-11 ปี</label>
                                            <input type="time" step="1" class="form-control" name="b10_b11">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 12-13 ปี</label>
                                            <input type="time" step="1" class="form-control" name="b12_b13">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 14-15 ปี</label>
                                            <input type="time" step="1" class="form-control" name="b14_b15">
                                        </div>
                                    </div>
                                </div>
                                <p>
                                <h5>ประเภทหญิง</h5>
                                <div class="input-group">
                                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 8-9 ปี</label>
                                            <input type="time" step="1" class="form-control" name="g8_g9">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 10-11 ปี</label>
                                            <input type="time" step="1" class="form-control" name="g10_g11">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 12-13 ปี</label>
                                            <input type="time" step="1" class="form-control" name="g12_g13">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="form-control mt-4">อายุ 14-15 ปี</label>
                                            <input type="time" step="1" class="form-control" name="g14_g15">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </p>
                            <button type="submit" name="insert2" class="btn btn-success">เพิ่มข้อมูล</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--- modal แก้ไขข้อมูล -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.jqueryui.min.js"></script>
    <script type="text/javascript">
    $('#example').DataTable();
    </script>
</body>


</html>


<script language="JavaScript">
function Del(mypage) {
    var agree = confirm("คุณต้องการลบข้อมูลนี้หรือไม่");
    if (agree) {
        window.location = mypage;
    }

}
</script>