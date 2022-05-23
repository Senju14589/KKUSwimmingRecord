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

// เพิ่มข้อมูล
if (isset($_POST['insert2'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $sexbaby = $_POST['sexbaby'];
    $birthday = $_POST['birthday'];
    $agebaby = $_POST['agebaby'];
    $image = $_POST['image'];

    $sql = $insertdata->insert2($name, $lastname, $nickname, $sexbaby, $birthday, $agebaby, $image);
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
                                            <td><?php echo $row['image']; ?></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo $row['nickname']; ?></td>
                                            <td><?php echo $row['sexbaby']; ?> นาที</td>
                                            <td><?php echo $row['birthday']; ?></td>
                                            <td><?php echo $row['agebaby']; ?></td>

                                            <td><button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#exampleEdit<?php echo $row['id']; ?>">
                                                    แก้ไข
                                                </button>
                                                <!--- modal แก้ไขข้อมูล -->
                                            </td>
                                            <td><a href="record.php?del=<?php echo $row['id']; ?>"
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" class="form-control mt-4" name="name" placeholder="ชื่อจริง"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control mt-4" name="lastname" placeholder="นามสกุล"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control mt-4" name="nickname" placeholder="ชื่อเล่น"
                                        required>
                                </div>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="sexbaby">
                                        <option selected>เพศ</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="birthday">วันเกิด</label>
                                    <input type="date" class="form-control" name="birthday" placeholder="วันเกิด"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <input type="number" name="agebaby" class="form-control" placeholder="อายุ"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="image">รูปประจำตัว</label>
                                    <input type="file" name="image" class="form-control" required>
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