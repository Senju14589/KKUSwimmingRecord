<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satit KKU Swimming</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">

    <style>
    tbody {
        text-align: center;
    }

    #customers thead {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #7AA1D2;
        color: white;
    }
    </style>
    <style>
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
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="image/profile.jpg" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <h5 class="my-3">พุฒิพงศ์ สักแสน</h5>
                            <p class="text-muted mb-1">นักกีฬาว่ายน้ำ</p>
                            <p class="text-muted mb-4">โรงเรียน สาธิตมหาวิทยาลัยขอนแก่น</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ชื่อ - นามสกุล</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Johnatan Smith</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ทักษะการว่ายน้ำ</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">example@example.com</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">เบอร์ติดต่อ</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">(097) 234-5678</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ที่อยู่</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card">
                                <h5 class="card-header">ข้อมูลต่างๆของนักกีฬา</h5>
                                <h9 class="card-header mt-2">กราฟแสดงข้อมูลโดยรวมของนักกีฬา</h9>
                                <div class="card-body">
                                    <div id="traffic-chart"></div>
                                </div>
                            </div>
                            <a href="sportuser.php" class="card-link">ข้อมูลโดยรวมของนักกีฬา</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">บันทึกการฝึกซ้อม</h2>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal<?php echo $row['id']; ?>">
                                เพิ่มข้อมูลการซ้อม
                            </button>
                        </div>
                        <div class="container">
                            <h3 class="card-header my-2">ตารางการซ้อม</h3>
                            <div class="row my-4">
                                <div class="table-responsive">
                                    <table class="table">
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

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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
    <script>
    new Chartist.Line('#traffic-chart', {
        labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
        series: [
            [23000, 25000, 19000, 34000, 56000, 64000]
        ]
    }, {
        low: 0,
        showArea: true
    });
    </script>
</body>

</html>