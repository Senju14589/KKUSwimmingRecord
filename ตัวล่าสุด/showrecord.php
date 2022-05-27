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
                                <span class="ml-2">บันทึกผลการซ้อม</span>
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
                <div class="container mt-3">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-header my-2">ตารางการซ้อม</h3>
                                <p>The card shows the information of each type of swimming posture.</p>
                                <div class="row my-4">
                                    <div class="table-responsive">
                                        <table class="table" id="customers">
                                            <thead>
                                                <th>ลำดับ</th>
                                                <th>วันที่</th>
                                                <th>ท่าที่ซ้อม</th>
                                                <th>ระยะทาง</th>
                                                <th>เวลา</th>
                                                <th>รายการแข่งที่ใช้เปรียบเที่ยบ</th>
                                                <th>ลำดับความใกล้เคียง</th>
                                                <th>ความต่างของเวลา</th>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>


            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
                integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
                crossorigin="anonymous">
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