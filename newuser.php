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
    $sql = $deletedata->delete2($id);

    if ($sql) {
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location.href='newuser.php'</script>";
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// เพิ่มข้อมูล 
if (isset($_POST['insert2'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $sexbaby = $_POST['sexbaby'];
    $birthday = $_POST['birthday'];
    $agebaby = $_POST['agebaby'];
    //   $image = $_POST['image'];

    $allowed =  array('png', 'PNG', 'jpg', 'jpeg');
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        echo '<script type="text/javascript" language="javascript">
							alert("นามสกุลไฟล์ไม่ถูกต้อง กรุณาอัพโหลดไฟล์ตามนามสกุล .png .PNG .jpg . jpeg ");
							window.history.back()
							</script>';
        exit();
    }

    $result = mysqli_query($selecteddata->dbcon, "SELECT MAX(`id`) as maxid FROM `babydetail` WHERE 1");
    $row = mysqli_fetch_array($result);
    $nameim = $row['maxid'] + 1;
    $path;
    if ($_FILES['file']) {
        $file = $_FILES['file'];
        $path = "Avatar/" . $nameim . "." . $ext;

        if (!move_uploaded_file($file['tmp_name'], $path)) {
            $path = "";
        }
    }

    $namefather = $_POST['namefather'];
    $rsfather = $_POST['rsfather'];
    $phonefather = $_POST['phonefather'];
    $emailfather = $_POST['emailfather'];
    $namemother = $_POST['namemother'];
    $rsmother = $_POST['rsmother'];
    $phonemother = $_POST['phonemother'];
    $emailmother = $_POST['emailmother'];
    $address = $_POST['address'];

    $sql = $insertdata->insert2($name, $lastname, $nickname, $sexbaby, $birthday, $agebaby, $path);
    $sql = $insertdata->insert3($namefather, $rsfather, $phonefather, $emailfather, $namemother, $rsmother, $phonemother, $emailmother, $address);
    if ($sql) {
        echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
        //echo "<script>window.location.href='record.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
        //echo "<script>window.location.href='record.php'</script>";
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// แก้ไขข้อมูล 
if (isset($_POST['update2'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $sexbaby = $_POST['sexbaby'];
    $birthday = $_POST['birthday'];
    $agebaby = $_POST['agebaby'];
    //   $image = $_POST['image'];

    $allowed =  array('png', 'PNG', 'jpg', 'jpeg');
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        echo '<script type="text/javascript" language="javascript">
							alert("นามสกุลไฟล์ไม่ถูกต้อง กรุณาอัพโหลดไฟล์ตามนามสกุล .png .PNG .jpg . jpeg ");
							window.history.back()
							</script>';
        exit();
    }

    $path;
    if ($_FILES['file']) {
        $file = $_FILES['file'];
        $path = "Avatar/001." . $ext;

        if (!move_uploaded_file($file['tmp_name'], $path)) {
            $path = "";
        }
    }

    $sql = $insertdata->update2($id, $name, $lastname, $nickname, $sexbaby, $birthday, $agebaby, $path);
    if ($sql) {
        echo "<script>alert('ข้อมูลบันทึกสำเร็จ!');</script>";
        //echo "<script>window.location.href='record.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่');</script>";
        //echo "<script>window.location.href='record.php'</script>";
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
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div>
            <a href="index.php" class="btn btn-block btn-warning">หน้าหลัก</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="container">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h1 class="mt-5">ใบสมัครเรียน</h1>
                            <h3 class="mt-2">Application Form</h3>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                                เพิ่มข้อมูล
                            </button>
                            <hr>
                            <div class="container">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <th>รูป</th>
                                        <th>ลำดับ</th>
                                        <th>ชื่อจริง</th>
                                        <th>นามสกุล</th>
                                        <th>ชื่อเล่น</th>
                                        <th>เพส</th>
                                        <th>วันเกิด</th>
                                        <th>อายุ</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        include_once('function.php');
                                        $fetchdata = new DB_con();
                                        $sql = $fetchdata->fetchdata2();
                                        while ($row = mysqli_fetch_array($sql)) {

                                        ?>
                                        <tr>
                                            <td><img src="<?php echo $row['image']; ?>" width="100px" height="100px"
                                                    alt="" </td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo $row['nickname']; ?></td>
                                            <td><?php echo $row['sexbaby']; ?></td>
                                            <td><?php echo $row['birthday']; ?></td>
                                            <td><?php echo $row['agebaby']; ?></td>

                                            <td><button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#exampleEdit<?php echo $row['id']; ?>">
                                                    แก้ไข
                                                </button>
                                                <!--- modal แก้ไขข้อมูล -->
                                                <div class="modal fade" id="exampleEdit<?php echo $row['id']; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleEdit"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <nav class="navbar bg-light">
                                                                <div class="container-fluid">
                                                                    <a class="navbar-brand" href="#">
                                                                        <img src="image/1 KKU new.png" alt="" width="30"
                                                                            height="24"
                                                                            class="d-inline-block align-text-top">
                                                                        แก้ไขข้อมูลนักกีฬา
                                                                    </a>
                                                                </div>
                                                            </nav>
                                                            <div class="modal-header">
                                                                <div class="container row col-lg-12">
                                                                    <form action="newuser.php" method="post"
                                                                        enctype="multipart/form-data">
                                                                        <div class="mb-4">
                                                                            <input type="hidden" name="id"
                                                                                value="<?php echo $row['id']; ?>">
                                                                            </input>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control mt-4"
                                                                                name="name"
                                                                                value="<?php echo $row['name']; ?>"
                                                                                required>
                                                                            <input type="text" class="form-control mt-4"
                                                                                name="lastname"
                                                                                value="<?php echo $row['lastname']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <input type="text" class="form-control mt-4"
                                                                                name="nickname"
                                                                                value="<?php echo $row['nickname']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-4">
                                                                            <select class="form-select" name="sexbaby">
                                                                                <option selected>เพศ</option>
                                                                                <option value="ชาย">ชาย</option>
                                                                                <option value="หญิง">หญิง</option>
                                                                            </select>
                                                                            <input type="number" name="agebaby"
                                                                                class="form-control"
                                                                                value="<?php echo $row['agebaby']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="birthday">วันเกิด</label>
                                                                            <input type="date" class="form-control"
                                                                                name="birthday"
                                                                                value="<?php echo $row['birthday']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="image">รูปประจำตัว</label>
                                                                            <input type="file" name="file" id="file"
                                                                                class="form-control" required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <h3>กรอกข้อมูลผู้ปกครอง</h3>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <input type="text" class="form-control"
                                                                                name="namefather"
                                                                                value="<?php echo $row['namefather']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-4">
                                                                            <select class="form-select" name="rsfather">
                                                                                <option selected>ความสัมพันธ์</option>
                                                                                <option value="ยังอยู่ด้วยกัน">
                                                                                    ยังอยู่ด้วยกัน</option>
                                                                                <option value="หย่าร้าง">หย่าร้าง
                                                                                </option>
                                                                                <option value="แยกกันอยู่">แยกกันอยู่
                                                                                </option>
                                                                            </select>
                                                                            <input type="number" name="phonefather"
                                                                                class="form-control"
                                                                                value="<?php echo $row['phonefather']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <input type="email" class="form-control"
                                                                                name="emailfather"
                                                                                value="<?php echo $row['emailfather']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <input type="text" name="namemother"
                                                                                class="form-control"
                                                                                value="<?php echo $row['namemother']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-4">
                                                                            <select class="form-select" name="rsmother">
                                                                                <option selected>ความสัมพันธ์</option>
                                                                                <option value="ยังอยู่ด้วยกัน">
                                                                                    ยังอยู่ด้วยกัน</option>
                                                                                <option value="หย่าร้าง">หย่าร้าง
                                                                                </option>
                                                                                <option value="แยกกันอยู่">แยกกันอยู่
                                                                                </option>
                                                                            </select>
                                                                            <input type="number" class="form-control"
                                                                                name="phonemother"
                                                                                value="<?php echo $row['phonemother']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <input type="email" class="form-control"
                                                                                name="emailmother"
                                                                                value="<?php echo $row['emailmother']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <input type="text" class="form-control"
                                                                                name="address"
                                                                                value="<?php echo $row['address']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <button type="submit" name="update2"
                                                                            class="btn btn-success">เพิ่มข้อมูล</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">ยกเลิก!</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="newuser.php?del=<?php echo $row['id']; ?>"
                                                    class="btn btn-danger" onclick="Del(this.href);return false;">ลบ</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
                                    <a class="navbar-brand" href="#">
                                        <img src="image/1 KKU new.png" alt="" width="30" height="24"
                                            class="d-inline-block align-text-top">
                                        ใบสมัครเรียน
                                    </a>
                                </div>
                            </nav>
                            <form action="newuser.php" method="post" enctype="multipart/form-data">
                                <h3>กรอกข้อมูลนักกีฬา</h3>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control mt-4" name="name" placeholder="ชื่อจริง"
                                        required>
                                    <input type="text" class="form-control mt-4" name="lastname" placeholder="นามสกุล"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control mt-4" name="nickname" placeholder="ชื่อเล่น"
                                        required>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-select" name="sexbaby">
                                        <option selected>เพศ</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                    <input type="number" name="agebaby" class="form-control" placeholder="อายุ"
                                        required>
                                </div>
                                <div class="mb-3" <label for="image">รูปประจำตัว</label>
                                    <input type="file" name="file" id="file" class="form-control" required>
                                </div>
                                <div class="mb-3" <label for="birthday">วันเกิด</label>
                                    <input type="date" class="form-control" name="birthday" placeholder="วันเกิด"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <h3>กรอกข้อมูลผู้ปกครอง</h3>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="namefather"
                                        placeholder="ชื่อ-สกุล บิดา" required>
                                </div>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="rsfather">
                                        <option selected>ความสัมพันธ์</option>
                                        <option value="ยังอยู่ด้วยกัน">ยังอยู่ด้วยกัน</option>
                                        <option value="หย่าร้าง">หย่าร้าง</option>
                                        <option value="แยกกันอยู่">แยกกันอยู่</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <input type="number" name="phonefather" class="form-control"
                                        placeholder="เบอร์โทรศัพท์" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="form-control" name="emailfather" placeholder="E-mail"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="namemother" class="form-control"
                                        placeholder="ชื่อ-สกุล มารดา" required>
                                </div>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="rsmother">
                                        <option selected>ความสัมพันธ์</option>
                                        <option value="ยังอยู่ด้วยกัน">ยังอยู่ด้วยกัน</option>
                                        <option value="หย่าร้าง">หย่าร้าง</option>
                                        <option value="แยกกันอยู่">แยกกันอยู่</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <input type="number" class="form-control" name="phonemother"
                                        placeholder="เบอร์โทรศัพท์" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="form-control" name="emailmother" placeholder="E-mail"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control" name="address" placeholder="ที่อยู่"
                                        required>
                                </div>
                                <button type="submit" name="insert2" class="btn btn-success">เพิ่มข้อมูล</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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