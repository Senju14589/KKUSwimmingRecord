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
    $sql = $deletedata->delete($id);

    if ($sql) {
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location.href='record.php'</script>";
    }
}

$error = null;
// เพิ่มข้อมูล
if (isset($_POST['insert'])) {
    $babydetail_id = $_POST['id'];
    $day = $_POST['day'];
    $poise = $_POST['poise'];
    $distance = $_POST['distance'];
    $timer = $_POST['timer'];




    $sql = $insertdata->insert($day, $poise, $distance, $timer, $babydetail_id);
    if ($sql) {
        echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
        //echo "<script>window.location.href='record.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
        //echo "<script>window.location.href='record.php'</script>";
    }
}


//แก้ไขข้อมูล
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $list = $_POST['list'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $statistics = $_POST['statistics'];
    $number = $_POST['number'];
    $style = $_POST['style'];

    $sql = $updatedata->update($id, $list, $age, $sex, $statistics, $number, $style);
    if ($sql) {
        echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
        echo "<script>window.location.href='record.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
        echo "<script>window.location.href='record.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกผลการแข่งขัน</title>
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
                    <div class="card-header">
                        <h1 class="mt-5 text-right">บันทึกผลการซ้อม</h1>
                        <h5 class="mt-2 text-right">รายชื่อนักกีฬา</h5>
                        <hr>

                        <div class="row">
                            <?php

                            include_once('function.php');
                            $fetchdata = new DB_con();
                            $sql = $fetchdata->fetchdata2();
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>

                            <div class="col-sm-4">
                                <div class="card card-block">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="<?php echo $row['image']; ?>" width="200px" height="290px"
                                                alt="" />
                                        </div> <br>
                                        <div class="card-inner">
                                            <div class="header">
                                                <h4>ชื่อ :<?php echo $row['name'] . " " . $row['lastname']; ?>
                                                </h4>
                                                <p>ชื่อเล่น :<?php echo $row['nickname']; ?></p>
                                            </div>
                                            <div class="content">
                                                <button type="button" class="btn btn-success sm btn-block"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal<?php echo $row['id']; ?>">
                                                    เพิ่มข้อมูลการซ้อม
                                                </button> <br>
                                                <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="container row col-lg-12">
                                                                    <nav class="navbar bg-light">
                                                                        <div class="toast-header">
                                                                            <strong
                                                                                class="me-auto">เพิ่มข้อมูลการซ้อม</strong>
                                                                        </div>
                                                                    </nav>
                                                                    <form action="" method="post">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-2">
                                                                                <p>
                                                                                <h3>กรอกข้อมูลการซ้อม</h3>
                                                                                </p>
                                                                                <p>
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?php echo $row['id']; ?>">
                                                                                </p>
                                                                                <div class="input-group">
                                                                                    <label
                                                                                        class="input-group">วันที่ซ้อม</label>
                                                                                    <input type="date"
                                                                                        class="form-control" name="day"
                                                                                        required>
                                                                                    <select class="form-select"
                                                                                        name="poise">
                                                                                        <option selected>
                                                                                            ท่าที่ใช้ซ้อม</option>
                                                                                        <option value="Freestyle">
                                                                                            Freestyle</option>
                                                                                        <option value="Backstroke">
                                                                                            Backstroke</option>
                                                                                        <option value="Butterfly">
                                                                                            Butterfly</option>
                                                                                        <option value="Breaststroke">
                                                                                            Breaststroke</option>
                                                                                        <option value="IM">IM
                                                                                        </option>
                                                                                    </select>
                                                                                </div> <br>
                                                                                <div class="input-group mb-3">
                                                                                    <label
                                                                                        class="input-group">ระยะทาง/เวลาที่ทำได้
                                                                                    </label>
                                                                                    <select class="form-select"
                                                                                        name="distance">
                                                                                        <option selected>ระยะทาง
                                                                                        </option>
                                                                                        <option value="50">50
                                                                                            เมตร</option>
                                                                                        <option value="100">100
                                                                                            เมตร</option>
                                                                                        <option value="200">200
                                                                                            เมตร</option>
                                                                                    </select>
                                                                                    <input type="time" step="1"
                                                                                        name="timer"
                                                                                        class="form-control"
                                                                                        placeholder="เวลาที่ทำได้"
                                                                                        required>
                                                                                </div>
                                                                            </div> <br>
                                                                            <div
                                                                                class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-2">
                                                                                <div class="card bg-light text-black">
                                                                                    <img src="image/kkulogo.png"
                                                                                        class="card-img" alt="...">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <button type="submit" name="insert"
                                                                            class="btn btn-success">เพิ่มข้อมูล</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">ยกเลิก!</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="showrecord.php?id=<?php echo $row['id']; ?>&sex=<?php echo $row['sexbaby']; ?>&age=<?php echo $row['agebaby']; ?>"
                                                    class="btn btn-primary d-sm-block ">ดูบันทึกผลการซ้อม</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>







    </div>
    </div>
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