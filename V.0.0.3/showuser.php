<?php

include_once('function.php');

$deletedata = new DB_con();
$insertdata = new DB_con();
$updatedata = new DB_con();
$selecteddata = new DB_con();

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

    $sql = $insertdata->update3($id, $namefather, $rsfather, $phonefather, $emailfather, $namemother, $rsmother, $phonemother, $emailmother, $address);
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
            <p>
            <div class="container">
                <div class="row">
                    <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                        <A href="edit.html">Edit Profile</A>

                        <A href="edit.html">Logout</A>
                        <br>
                        <p class=" text-info">May 05,2014,03:00 pm </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sheena Shrestha</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $row['image']; ?>" class="img-circle img-responsive"> </div>

                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>ชื่อ:</td>
                                                    <td><?php echo $row['name'] . "  " . $row['lastname']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ชื่อเล่น :</td>
                                                    <td><?php echo $row['nickname']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>เพศ :</td>
                                                    <td><?php echo $row['sexbaby']; ?></td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <td>วันเกิด :</td>
                                                    <td><?php echo $row['birthday']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>คุณพ่อชื่อ:</td>
                                                    <td><?php echo $row['namefather']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>คุณแม่ชื่อ :</td>
                                                    <td><?php echo $row['namemother']; ?></td>
                                                </tr>
                                                <td>เบอร์โทรศัพทร์</td>
                                                <td><?php echo $row['phonefather']; ?>(เบอร์คุณพ่อ)<br>
                                                    <?php echo $row['phonemother']; ?>(เบอร์คุณแม่)<br>
                                                </td>

                                                </tr>

                                            </tbody>



                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleEdit<?php echo $row['id']; ?>">
                                                แก้ไขข้อมูลนักกีฬา
                                            </button>
                                            <!------->
                                            <div class="modal fade" id="exampleEdit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleEdit" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <nav class="navbar bg-light">
                                                            <div class="container-fluid">
                                                                <a class="navbar-brand" href="#">
                                                                    <img src="image/1 KKU new.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                                                                    แก้ไขข้อมูลนักกีฬา
                                                                </a>
                                                            </div>
                                                        </nav>
                                                        <div class="modal-header">
                                                            <div class="container row col-lg-12">
                                                                <form action="newuser.php" method="post" enctype="multipart/form-data">
                                                                    <p>
                                                                    <h3>แก้ไขข้อมูลนักกีฬา</h3>
                                                                    </p>
                                                                    <div class="mb-1">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                        </input>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control mt-4" name="name" value="<?php echo $row['name']; ?>" required>
                                                                        <input type="text" class="form-control mt-4" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <input type="text" class="form-control mt-4" name="nickname" value="<?php echo $row['nickname']; ?>" required>
                                                                    </div>
                                                                    <div class="input-group mb-4">
                                                                        <select class="form-select" name="sexbaby">
                                                                            <option <?php if ($row['sexbaby'] == "ชาย") {
                                                                                        echo "selected";
                                                                                    } ?> value="ชาย">
                                                                                ชาย
                                                                            </option>
                                                                            <option <?php if ($row['sexbaby'] == "หญิง") {
                                                                                        echo "selected";
                                                                                    } ?> value="หญิง">
                                                                                หญฺิง
                                                                            </option>
                                                                        </select>
                                                                        <input type="number" name="agebaby" class="form-control" value="<?php echo $row['agebaby']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label for="birthday">วันเกิด</label>
                                                                        <input type="date" class="form-control" name="birthday" value="<?php echo $row['birthday']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label for="image">รูปประจำตัว</label>
                                                                        <input type="file" name="file" id="file" class="form-control" value="<?php echo $row['image']; ?>" required>
                                                                        <p>
                                                                            <img src="Avatar/<?php echo $row['image']; ?>" height="100" width="100" alt="">
                                                                        </p>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <h3>แก้ไขข้อมูลผู้ปกครอง
                                                                        </h3>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                        </input>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" name="namefather" value="<?php echo $row['namefather']; ?>" required>
                                                                    </div>
                                                                    <div class="input-group mb-4">
                                                                        <select class="form-select" name="rsfather">
                                                                            <option <?php if ($row['rsfather'] == "ยังอยู่ด้วยกัน") {
                                                                                        echo "selected";
                                                                                    } ?> value="ยังอยู่ด้วยกัน">
                                                                                ยังอยู่ด้วยกัน
                                                                            </option>
                                                                            <option <?php if ($row['rsfather'] == "หย่าร้าง") {
                                                                                        echo "selected";
                                                                                    } ?> value="หย่าร้าง">
                                                                                หย่าร้าง
                                                                            </option>
                                                                            <option <?php if ($row['rsfather'] == "แยกกันอยู่") {
                                                                                        echo "selected";
                                                                                    } ?> value="แยกกันอยู่">
                                                                                แยกกันอยู่
                                                                            </option>
                                                                        </select>
                                                                        <input type="text" name="phonefather" class="form-control" value="<?php echo $row['phonefather']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <input type="email" class="form-control" name="emailfather" value="<?php echo $row['emailfather']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <input type="text" name="namemother" class="form-control" value="<?php echo $row['namemother']; ?>" required>
                                                                    </div>
                                                                    <div class="input-group mb-4">
                                                                        <select class="form-select" name="rsmother">
                                                                            <option <?php if ($row['rsmother'] == "ยังอยู่ด้วยกัน") {
                                                                                        echo "selected";
                                                                                    } ?> value="ยังอยู่ด้วยกัน">
                                                                                ยังอยู่ด้วยกัน
                                                                            </option>
                                                                            <option <?php if ($row['rsmother'] == "หย่าร้าง") {
                                                                                        echo "selected";
                                                                                    } ?> value="หย่าร้าง">
                                                                                หย่าร้าง
                                                                            </option>
                                                                            <option <?php if ($row['rsmother'] == "แยกกันอยู่") {
                                                                                        echo "selected";
                                                                                    } ?> value="แยกกันอยู่">
                                                                                แยกกันอยู่
                                                                            </option>
                                                                        </select>
                                                                        <input type="number" class="form-control" name="phonemother" value="<?php echo $row['phonemother']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <input type="email" class="form-control" name="emailmother" value="<?php echo $row['emailmother']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
                                                                    </div>
                                                                    <button type="submit" name="update2" class="btn btn-success">เพิ่มข้อมูล</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก!</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </p>

            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
            <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>