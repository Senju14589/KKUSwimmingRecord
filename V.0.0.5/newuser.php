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

//ลบข้อมูล ผู้ปกครอง
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


    $result = mysqli_query($selecteddata->dbcon, "SELECT MAX(`id`) as maxid FROM `parentdetail` WHERE 1");
    $row = mysqli_fetch_array($result);
    $parent_id = $row['maxid'] + 1;


    $study = $_POST['study'];
    $location = $_POST['location'];
    $anytime = $_POST['anytime'];
    $level = $_POST['level'];
    $pool = $_POST['pool'];
    $disease = $_POST['disease'];
    $details = $_POST['details'];

    $result = mysqli_query($selecteddata->dbcon, "SELECT MAX(`id`) as aid FROM `parentdetail` WHERE 1");
    $row = mysqli_fetch_array($result);
    $quiry_id = $row['aid'] + 1;

    $sql = $insertdata->insert2($name, $lastname, $nickname, $sexbaby, $birthday, $agebaby, $path, $parent_id);
    $sql = $insertdata->insert3($namefather, $rsfather, $phonefather, $emailfather, $namemother, $rsmother, $phonemother, $emailmother, $address, $quiry_id);
    $sql = $insertdata->insert4($study, $location, $anytime, $level, $pool, $disease, $details);

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
        $path = "Avatar/" . $id . "." . $ext;

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


    $result = mysqli_query($selecteddata->dbcon, "SELECT MAX(`id`) as maxid FROM `parentdetail` WHERE 1");
    $row = mysqli_fetch_array($result);
    $parent_id = $row['maxid'] + 1;


    $quiry_id = $_POST['id'];
    $study = $_POST['study'];
    $location = $_POST['location'];
    $anytime = $_POST['anytime'];
    $level = $_POST['level'];
    $pool = $_POST['pool'];
    $disease = $_POST['disease'];
    $details = $_POST['details'];


    $sql = $updatedata->update2($id, $name, $lastname, $nickname, $sexbaby, $birthday, $agebaby, $path);
    $sql = $updatedata->update3($id, $namefather, $rsfather, $phonefather, $emailfather, $namemother, $rsmother, $phonemother, $emailmother, $address);
    $sql = $updatedata->update4($quiry_id, $study, $location, $anytime, $level, $pool, $disease, $details);

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
            <nav id="sidebar" class="col-md-3 col-lg-2 my-0 d-md-block bg-light sidebar collapse ">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="record.php">
                                <span class="ml-2">บันทึกผลการซ้อม</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listprogram.php">
                                <span class="ml-2">รายการแข่งขัน</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="newuser.php">
                                <span class="ml-2">ข้อมูลต่างๆของนักกีฬา</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="container">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h1 class="mt-5">ข้อมูลนักกีฬา</h1>
                            <h3 class="mt-2">Application Form</h3> <br>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                                เพิ่มนักกีฬา
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
                                        <th>เพศ</th>
                                        <th>วันเกิด</th>
                                        <th>อายุ</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        include_once('function.php');
                                        $fetchdata = new DB_con();
                                        $sql = $fetchdata->fetchdata4();
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
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleShow<?php echo $row['id']; ?>">
                                                    ดูข้อมูล
                                                </button>
                                                <!--- โชว์ข้อมูล --->
                                                <div class="modal fade" id="exampleShow<?php echo $row['id']; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleShow"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <p>
                                                            <nav class="navbar bg-light">
                                                                <div class="container-fluid">
                                                                    <a class="navbar-brand" href="#">
                                                                        <img src="image/1 KKU new.png" alt="" width="30"
                                                                            height="24"
                                                                            class="d-inline-block align-text-top">
                                                                        ข้อมูลนักกีฬา
                                                                    </a>
                                                                </div>
                                                            </nav>
                                                            </p>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-6 img">
                                                                        <img src="<?php echo $row['image']; ?>"
                                                                            width="200px" height="200px" alt=""
                                                                            class="img-rounded">
                                                                    </div>
                                                                    <div class="col-md-6 details">
                                                                        <blockquote>
                                                                            <h5><?php echo $row['name'] . " " . $row['lastname']; ?>
                                                                            </h5>
                                                                            <small><cite title="Source Title">ชื่อเล่น :
                                                                                </cite><?php echo $row['nickname']; ?></small>
                                                                        </blockquote>
                                                                        <p>
                                                                            <small>เพศ :
                                                                                <?php echo $row['sexbaby']; ?><br></small>
                                                                            <small>วันเกิด :
                                                                                <?php echo $row['birthday']; ?><br></small>
                                                                            <small>อายุ :
                                                                                <?php echo $row['agebaby']; ?><br></small>
                                                                            <small>คุณพ่อชื่อ :
                                                                                <?php echo $row['namefather']; ?><br></small>
                                                                            <small>คุณแม่ชื่อ :
                                                                                <?php echo $row['namemother']; ?><br></small>
                                                                            <small>ที่อยู่ :
                                                                                <?php echo $row['address']; ?><br></small>
                                                                            <small>เบอร์โทรศัพท์คุณพ่อ :
                                                                                <?php echo $row['phonefather']; ?><br></small>
                                                                            <small>เบอร์โทรศัพท์คุณแม่ :
                                                                                <?php echo $row['phonemother']; ?><br></small>
                                                                            <small>เคยเรียนว่ายน้ำมาบ้างไหม? :
                                                                                <?php echo $row['study']; ?><br></small>
                                                                            <small>ระดับในการว่ายน้ำ :
                                                                                <?php echo $row['level']; ?><br></small>
                                                                            <small>มีโรคประจำตัวไหม :
                                                                                <?php echo $row['disease']; ?><br></small>
                                                                            <small>รายละเอียดอื่นๆ :
                                                                                <?php echo $row['details']; ?><br></small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    <button type="button" class="btn btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleEdit<?php echo $row['id']; ?>">
                                                                        แก้ไขข้อมูลนักกีฬา
                                                                    </button>
                                                                    <!--- modal แก้ไขข้อมูล -->
                                                                </p>
                                                                <div class="container">
                                                                    <div class="modal fade"
                                                                        id="exampleEdit<?php echo $row['id']; ?>"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleEdit"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <nav class="navbar bg-light">
                                                                                    <div class="container-fluid">
                                                                                        <a class="navbar-brand"
                                                                                            href="#">
                                                                                            <img src="image1 KKU new.png"
                                                                                                alt="" width="30"
                                                                                                height="24"
                                                                                                class="d-inline-block align-text-top">
                                                                                            แก้ไขข้อมูลนักกีฬา
                                                                                        </a>
                                                                                    </div>
                                                                                </nav>
                                                                                <div class="modal-header">
                                                                                    <div
                                                                                        class="container row col-lg-12">
                                                                                        <form action="newusery.php"
                                                                                            method="post"
                                                                                            enctype="multipart/form-data">
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-2">
                                                                                                    <p>
                                                                                                    <h3>แก้ไขข้อมูลนักกีฬา
                                                                                                    </h3>
                                                                                                    </p>
                                                                                                    <div class="mb-1">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="id"
                                                                                                            value="<?php echo $row['id']; ?>">
                                                                                                        </input>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="input-group mb-3">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control mt-4"
                                                                                                            name="name"
                                                                                                            value="<?php echo $row['name']; ?>"
                                                                                                            required>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control mt-4"
                                                                                                            name="lastname"
                                                                                                            value="<?php echo $row['lastname']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control mt-4"
                                                                                                            name="nickname"
                                                                                                            value="<?php echo $row['nickname']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="input-group mb-4">
                                                                                                        <select
                                                                                                            class="form-select"
                                                                                                            name="sexbaby">
                                                                                                            <option
                                                                                                                <?php if ($row['sexbaby'] == "ชาย") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="ชาย">
                                                                                                                ชาย
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['sexbaby'] == "หญิง") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="หญิง">
                                                                                                                หญฺิง
                                                                                                            </option>
                                                                                                        </select>
                                                                                                        <input
                                                                                                            type="number"
                                                                                                            name="agebaby"
                                                                                                            class="form-control"
                                                                                                            value="<?php echo $row['agebaby']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <label
                                                                                                            for="birthday">วันเกิด</label>
                                                                                                        <input
                                                                                                            type="date"
                                                                                                            class="form-control"
                                                                                                            name="birthday"
                                                                                                            value="<?php echo $row['birthday']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <label
                                                                                                            for="image">รูปประจำตัว</label>
                                                                                                        <input
                                                                                                            type="file"
                                                                                                            name="file"
                                                                                                            id="file"
                                                                                                            class="form-control"
                                                                                                            value="<?php echo $row['image']; ?>"
                                                                                                            <p>
                                                                                                        <img src="<?php echo $row['image']; ?>"
                                                                                                            height="100"
                                                                                                            width="100"
                                                                                                            alt="">
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-4">
                                                                                                    <div class="mb-4">
                                                                                                        <h3>แก้ไขข้อมูลผู้ปกครอง
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="id"
                                                                                                            value="<?php echo $row['id']; ?>">
                                                                                                        </input>
                                                                                                    </div>
                                                                                                    <div class="mb-3">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="namefather"
                                                                                                            value="<?php echo $row['namefather']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="input-group mb-4">
                                                                                                        <select
                                                                                                            class="form-select"
                                                                                                            name="rsfather">
                                                                                                            <option
                                                                                                                <?php if ($row['rsfather'] == "ยังอยู่ด้วยกัน") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="ยังอยู่ด้วยกัน">
                                                                                                                ยังอยู่ด้วยกัน
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['rsfather'] == "หย่าร้าง") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="หย่าร้าง">
                                                                                                                หย่าร้าง
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['rsfather'] == "แยกกันอยู่") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="แยกกันอยู่">
                                                                                                                แยกกันอยู่
                                                                                                            </option>
                                                                                                        </select>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="phonefather"
                                                                                                            class="form-control"
                                                                                                            value="<?php echo $row['phonefather']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <input
                                                                                                            type="email"
                                                                                                            class="form-control"
                                                                                                            name="emailfather"
                                                                                                            value="<?php echo $row['emailfather']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="namemother"
                                                                                                            class="form-control"
                                                                                                            value="<?php echo $row['namemother']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="input-group mb-4">
                                                                                                        <select
                                                                                                            class="form-select"
                                                                                                            name="rsmother">
                                                                                                            <option
                                                                                                                <?php if ($row['rsmother'] == "ยังอยู่ด้วยกัน") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="ยังอยู่ด้วยกัน">
                                                                                                                ยังอยู่ด้วยกัน
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['rsmother'] == "หย่าร้าง") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="หย่าร้าง">
                                                                                                                หย่าร้าง
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['rsmother'] == "แยกกันอยู่") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="แยกกันอยู่">
                                                                                                                แยกกันอยู่
                                                                                                            </option>
                                                                                                        </select>
                                                                                                        <input
                                                                                                            type="number"
                                                                                                            class="form-control"
                                                                                                            name="phonemother"
                                                                                                            value="<?php echo $row['phonemother']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <input
                                                                                                            type="email"
                                                                                                            class="form-control"
                                                                                                            name="emailmother"
                                                                                                            value="<?php echo $row['emailmother']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-4">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="address"
                                                                                                            value="<?php echo $row['address']; ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12">
                                                                                                    <p>
                                                                                                    <h3>ข้อซักถามเพิ่มเติม
                                                                                                    </h3>
                                                                                                    </p>
                                                                                                    <div class="mb-4">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="id"
                                                                                                            value="<?php echo $row['quiry_id']; ?>">
                                                                                                        </input>
                                                                                                    </div>
                                                                                                    <p>
                                                                                                        1.น้องเคยเรียนว่ายน้ำมาก่อนหรือไม่
                                                                                                        ?
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="study"
                                                                                                            value="YES"
                                                                                                            <?php if ($row['study'] == "YES") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                                                        Y
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="study"
                                                                                                            value="NO"
                                                                                                            <?php if ($row['study'] == "NO") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                                                                        N
                                                                                                        <br>
                                                                                                    <div
                                                                                                        class="input-group">
                                                                                                        <span
                                                                                                            class="input-group-text">สถานที่</span>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="location"
                                                                                                            class="form-control"
                                                                                                            value="<?php echo $row['location']; ?>">
                                                                                                        <span
                                                                                                            class="input-group-text">เมื่อใด</span>
                                                                                                        <input
                                                                                                            type="date"
                                                                                                            name="anytime"
                                                                                                            class="form-control"
                                                                                                            value="<?php echo $row['anytime']; ?>">


                                                                                                        <select
                                                                                                            class="form-select"
                                                                                                            name="level">
                                                                                                            <option
                                                                                                                <?php if ($row['level'] == "learn to swim") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="learn to swim">
                                                                                                                learn to
                                                                                                                swim
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['level'] == "aeg group swimming") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="aeg group swimming">
                                                                                                                aeg
                                                                                                                group
                                                                                                                swimming
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['level'] == "senior swimming") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="senior swimming">
                                                                                                                senior
                                                                                                                swimming
                                                                                                            </option>
                                                                                                            <option
                                                                                                                <?php if ($row['level'] == "elite level swimming") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>
                                                                                                                value="elite level swimming">
                                                                                                                elite
                                                                                                                level
                                                                                                                swimming
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    </p>
                                                                                                    <p>
                                                                                                        2.น้องคุ้นเคยกับการเล่นน้ำในอ่างน้ำ/สระน้ำในระดับใด
                                                                                                        <br>
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="pool"
                                                                                                            value="กลัวมาก"
                                                                                                            <?php if ($row['pool'] == "กลัวมาก") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                                                        กลัวมาก
                                                                                                        <br>
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="pool"
                                                                                                            value="ค่อนข้างกลัวน้ำ"
                                                                                                            <?php if ($row['pool'] == "ค่อนข้างกลัวน้ำ") {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                                                                                        ค่อนข้างกลัวน้ำ
                                                                                                        <br>
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="pool"
                                                                                                            value="ปานกลาง"
                                                                                                            <?php if ($row['pool'] == "ปานกลาง") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                                                        ปานกลาง
                                                                                                        <br>
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="pool"
                                                                                                            value="คุ้นเคย"
                                                                                                            <?php if ($row['pool'] == "คุ้นเคย") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                                                        คุ้นเคย
                                                                                                        <br>
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="pool"
                                                                                                            value="ชอบน้ำมาก"
                                                                                                            <?php if ($row['pool'] == "ชอบน้ำมาก") {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                                                                                        ชอบน้ำมาก
                                                                                                        <br>
                                                                                                    </p>
                                                                                                    <p>
                                                                                                        3.น้องมีโรคประจำตัวหรือไม่
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="disease"
                                                                                                            value="YES"
                                                                                                            <?php if ($row['disease'] == "YES") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                                                        Y
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="disease"
                                                                                                            value="NO"
                                                                                                            <?php if ($row['disease'] == "NO") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                                                        N
                                                                                                        <br><br>
                                                                                                        รายละเอียด
                                                                                                    <div
                                                                                                        class="input-group">
                                                                                                        <textarea
                                                                                                            class="form-control"
                                                                                                            name="details"
                                                                                                            aria-label="With textarea"><?php echo $row['details']; ?>
                                                                                                        </textarea>
                                                                                                    </div>
                                                                                                    </p>
                                                                                                    <button
                                                                                                        type="submit"
                                                                                                        name="update2"
                                                                                                        class="btn btn-success">เพิ่มข้อมูล</button>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-danger"
                                                                                                        data-dismiss="modal">ยกเลิก!</button>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
    </div>

    <!--- modal เพิ่มข้อมูล -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container row col-lg-20">
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
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-2">
                                    <p>
                                    <h3>กรอกข้อมูลนักกีฬา</h3>
                                    </p>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control mt-4" name="name" placeholder="ชื่อจริง"
                                            required>
                                        <input type="text" class="form-control mt-4" name="lastname"
                                            placeholder="นามสกุล" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control mt-4" name="nickname"
                                            placeholder="ชื่อเล่น" required>
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
                                </div>
                                <div class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-4">
                                    <p>
                                    <h3>กรอกข้อมูลผู้ปกครอง</h3>
                                    </p>
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
                                        <input type="text" name="phonefather" class="form-control"
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
                                        <input type="text" class="form-control" name="phonemother"
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
                                </div>
                                <div class="center">
                                    <div class="col-12">
                                        <p>
                                        <h3>ข้อซักถามเพิ่มเติม</h3>
                                        </p>
                                        <p>
                                            1.น้องเคยเรียนว่ายน้ำมาก่อนหรือไม่ ?
                                            <input type="radio" name="study" required value="YES"> Y
                                            <input type="radio" name="study" required value="NO"> N
                                            <br>
                                        <div class="input-group">
                                            <span class="input-group-text">สถานที่</span>
                                            <input type="text" name="location" class="form-control">
                                            <span class="input-group-text">เมื่อใด</span>
                                            <input type="date" name="anytime" class="form-control">
                                            <select class="form-select" name="level">
                                                <option selected>ระดับการว่ายน้ำ</option>
                                                <option value="learn to swim">learn to swim</option>
                                                <option value="aeg group swimming">aeg group swimming</option>
                                                <option value="senior swimming">senior swimming</option>
                                                <option value="elite level swimming">elite level swimming</option>
                                            </select>
                                        </div>
                                        </p>
                                        <p>
                                            2.น้องคุ้นเคยกับการเล่นน้ำในอ่างน้ำ/สระน้ำในระดับใด <br>
                                            <input type="radio" name="pool" required value="กลัวมาก"> กลัวมาก
                                            <br>
                                            <input type="radio" name="pool" required value="ค่อนข้างกลัวน้ำ">
                                            ค่อยข้างกลัวน้ำ
                                            <br>
                                            <input type="radio" name="pool" required value="ปานกลาง"> ปานกลาง
                                            <br>
                                            <input type="radio" name="pool" required value="คุ้นเคย"> คุ้นเคย
                                            <br>
                                            <input type="radio" name="pool" required value="ชอบน้ำมาก"> ชอบน้ำมาก
                                            <br>
                                        </p>
                                        <p>
                                            3.น้องมีโรคประจำตัวหรือไม่
                                            <input type="radio" name="disease" required value="YES"> Y
                                            <input type="radio" name="disease" required value="NO"> N
                                            <br><br>
                                            รายละเอียด
                                        <div class="input-group">
                                            <textarea class="form-control" name="details"
                                                aria-label="With textarea"></textarea>
                                        </div>
                                        </p>
                                    </div>
                                </div>
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