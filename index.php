<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKU Swimming</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
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
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <img src="image/1 KKU new.png" width="20" height="60" class="card-img-top" alt="..."> &nbsp;&nbsp;&nbsp;
            <a class="navbar-brand py-3 " href="index.php">
                <font color="black">
                    <h4>KKU Swimming</h4>
                </font>
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Hello, John Doe
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 my-3 d-md-block bg-light sidebar collapse ">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="record.php">
                                <span class="ml-2">บันทึกผลการแข่งขัน</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listprogram.php">
                                <span class="ml-2">รายการแข่งขัน</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="ml-2">ข้อมูลต่างๆของนักกีฬา</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </nav>
                <h1 class="h2">Dashboard</h1>
                <p>ข้อมูลต่างๆและรายละเอียดต่างๆ</p>
                <div class="row my-4">

                </div>
                <h3 class="h4">ท่าว่ายน้ำ</h3>
                <p>The card shows the information of each type of swimming posture.</p>
                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <img src="image/freestyle.jpg" class="card-img-top" width="50" height="150" alt="...">
                        <div class="card">
                            <h5 class="card-header">Freestyle</h5>
                            <div class="card-body">
                                <p class="card-text">- Freestyle arm action</p>
                                <p class="card-text text-success">Distance</p>
                                <p>- 50 meters</p>
                                <p>- 100 meters</p>
                                <p>- 200 meters</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <img src="image/Backstroke.jpg" class="card-img-top" width="50" height="150" alt="...">
                        <div class="card">
                            <h5 class="card-header">Backstroke</h5>
                            <div class="card-body">
                                <p class="card-text">- Backstroke arm action</p>
                                <p class="card-text text-success">Distance</p>
                                <p>- 50 meters</p>
                                <p>- 100 meters</p>
                                <p>- 200 meters</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <img src="image/Butterfly.jpg" class="card-img-top" width="50" height="150" alt="...">
                        <div class="card">
                            <h5 class="card-header">Butterfly</h5>
                            <div class="card-body">
                                <p class="card-text">- Butterfly arm action</p>
                                <p class="card-text text-success">Distance</p>
                                <p>- 50 meters</p>
                                <p>- 100 meters</p>
                                <p>- 200 meters</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <img src="image/Breaststroke.jpg" class="card-img-top" width="50" height="150" alt="...">
                        <div class="card">
                            <h5 class="card-header">Breaststroke</h5>
                            <div class="card-body">
                                <p class="card-text">- Breaststroke arm action</p>
                                <p class="card-text text-success">Distance</p>
                                <p>- 50 meters</p>
                                <p>- 100 meters</p>
                                <p>- 200 meters</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-12 mb-4 mb-lg-0 mt-5">
                    <div class="card">
                        <h5 class="card-header">บันทึกผลการแข่งขัน</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="customers">
                                    <thead>
                                        <th>ลำดับ</th>
                                        <th>รายการแข่งขัน</th>
                                        <th>รุ่นอายุ</th>
                                        <th>เพศ</th>
                                        <th>สถิติ</th>
                                        <th>อันดับที่</th>
                                        <th>ท่าว่ายน้ำ</th>
                                    </thead>

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
                                                <td><?php echo $row['statistics']; ?></td>
                                                <td><?php echo $row['number']; ?></td>
                                                <td><?php echo $row['style']; ?></td>
                                            </tr>
                                        <?php

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="record.php" class="btn btn-block btn-success">เพิ่มบันทึกรายการแข่งขัน</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-12 mb-4 mb-lg-0 mt-5">
                    <div class="card">
                        <h5 class="card-header">รายการแข่งขัน</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="customers">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">รายการแข่ง</th>
                                            <th scope="col">รุ่นอายุ</th>
                                            <th scope="col">เพศ</th>
                                            <th scope="col">วันที่แข่ง</th>
                                        </tr>
                                        </tbody>
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
                                                <td><?php echo $row['age']; ?></td>
                                                <td><?php echo $row['sex']; ?></td>
                                                <td><?php echo $row['dateprogram']; ?></td>
                                            </tr>
                                        <?php

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="listprogram.php" class="btn btn-block btn-success">เพิ่มรายการการแข่งขัน</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8 mb-4 mb-lg-0 mt-5">
                    <div class="card">
                        <h5 class="card-header">ข้อมูลต่างๆของนักกีฬา</h5>
                        <h9 class="card-header mt-2">กราฟแสดงข้อมูลโดยรวมของนักกีฬา</h9>
                        <div class="card-body">
                            <div id="traffic-chart"></div>
                        </div>
                    </div>
                </div>
        </div>
        <footer class="pt-5 d-flex justify-content-between" align="center">
            <span>Copyright © 2022 <a href="https://www.facebook.com/ciskku"> CIS IS KKU#3 </a></span>
        </footer>
        </main>
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