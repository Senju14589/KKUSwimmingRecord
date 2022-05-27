<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">

<?php
include_once('function.php');

$deletedata = new DB_con();
$insertdata = new DB_con();
$updatedata = new DB_con();

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
    $list = $_POST['list'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $statistics = $_POST['statistics'];
    $number = $_POST['number'];
    $style = $_POST['style'];

    if ($number == null && $style == null) {
        //$error = "ไม่พบข้อมูล";
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
    } else {
        $sql = $insertdata->insert($list, $age, $sex, $statistics, $number, $style);
        if ($sql) {
            echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
            //echo "<script>window.location.href='record.php'</script>";
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
            //echo "<script>window.location.href='record.php'</script>";
        }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
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
    </style>

</head>

<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <img src="image/1 KKU new.png" alt="" width="60" height="60" class="d-inline-block align-text-center">
            <a class="navbar-brand py-3 " href="index.php">
                <font color="black">
                    <h4>SATIT KKU Swimming</h4>
                </font>
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div>
            <a href="newuser.php" class="btn btn-block btn-warning">เพิ่มรายชื่อนักกีฬา</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 my-0 d-md-block bg-light sidebar collapse ">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="record.php">
                                <span class="ml-2">บันทึกผลการแข่งขัน</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listprogram.php">
                                <span class="ml-2">รายการแข่งขัน</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="newuser.php">
                                <span class="ml-2">ข้อมูลต่างๆของนักกีฬา</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="record.php">บันทึกผลการแข่งขัน</a></li>
                    </ol>
                </nav>
                <div class="container">
                    <div class="card mb-3">
                        <img src="image/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h1 class="mt-5">บันทึกผลการแข่งขัน</h1>
                            <h3 class="mt-2">Record Match</h3>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                เพิ่มข้อมูล
                            </button>
                            <hr>
                            <div class="container">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <th>ลำดับ</th>
                                        <th>รายการแข่งขัน</th>
                                        <th>รุ่นอายุ</th>
                                        <th>เพศ</th>
                                        <th>สถิติที่ทำได้</th>
                                        <th>อันดับที่ได้</th>
                                        <th>ท่าว่ายน้ำที่ใช้แข่ง</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                            </div>
                            <tbody>
                                <?php

                                include_once('function.php');
                                $fetchdata = new DB_con();
                                $sql = $fetchdata->fetchdata();
                                while ($row = mysqli_fetch_array($sql)) {

                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['list']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['sex']; ?></td>
                                        <td><?php echo $row['statistics']; ?> นาที</td>
                                        <td><?php echo $row['number']; ?></td>
                                        <td><?php echo $row['style']; ?></td>
                                        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleEdit<?php echo $row['id']; ?>">
                                                แก้ไข
                                            </button>
                                            <!--- modal แก้ไขข้อมูล -->
                                            <div class="modal fade" id="exampleEdit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleEdit" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="record.php" method="post">
                                                            <div class="modal-header">
                                                                <div class="container row col-lg-12">
                                                                    <!-- แก้ไขบันทึกการแข่งขัน -->
                                                                    <nav class="navbar bg-light">
                                                                        <div class="container-fluid">
                                                                            <a class="navbar-brand" href="#">
                                                                                <img src="image/1 KKU new.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                                                                                แก้ไขบันทึกการแข่งขัน
                                                                            </a>
                                                                        </div>
                                                                    </nav>
                                                                    <!-- ดึงID -->
                                                                    <div class="mb-4">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                        </input>
                                                                    </div>
                                                                    <!-- แก้ไขรายการแข่งขัน -->
                                                                    <div class="mb-4">
                                                                        <input type="text" class="form-control" name="list" placeholder="รายการแข่งขัน" value="<?php echo $row['list']; ?>" required>
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
                                                                    <!-- แก้ไขบันทึกสถิติ -->
                                                                    <div class="mb-4">
                                                                        <label for="statistics">สถิติที่ทำได้</label>
                                                                        <input type="time" class="form-control" name="statistics" value="<?php echo $row['statistics']; ?>" required>
                                                                    </div>
                                                                    <!-- แก้ไขบันทึกลำดับ -->
                                                                    <div class="mb-4">
                                                                        <input type="number" name="number" class="form-control" placeholder="ลำดับที่ทำได้" value="<?php echo $row['number']; ?>" required>
                                                                    </div>
                                                                    <!-- แก้ไขบันทึกท่าที่ใช้ -->
                                                                    <div class="mb-4">
                                                                        <input type="text" name="style" class="form-control" placeholder="ท่าที่ใช้ในการแข่ง" value="<?php echo $row['style']; ?>" required>
                                                                    </div>
                                                                    <!-- ปุ่มบันทึกการแก้ไข -->
                                                                    <button type="submit" name="update" class="btn btn-success ">แก้ไขข้อมูล</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก!</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="record.php?del=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="Del(this.href);return false;">ลบ</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

        <!--- modal เพิ่มข้อมูล -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container row col-lg-12">
                            <nav class="navbar bg-light">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="#">
                                        <img src="image/1 KKU new.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                                        เพิ่มบึนทึกการแข่งขัน
                                    </a>
                                </div>
                            </nav>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="text" class="form-control mt-4" name="list" placeholder="รายการแข่งขัน" required>
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
                                    <label for="statistics">สถิติที่ทำได้</label>
                                    <input type="time" class="form-control" name="statistics" required>
                                </div>
                                <div class="mb-4">
                                    <input type="number" name="number" class="form-control" placeholder="ลำดับที่ทำได้" required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="style" class="form-control" placeholder="ท่าที่ใช้ในการแข่ง" required>
                                </div>
                                <button type="submit" name="insert" class="btn btn-success">เพิ่มข้อมูล</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
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