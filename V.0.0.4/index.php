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
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-0 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
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
            <a href="newuser.php" class="btn btn-block btn-warning">?????????????????????????????????????????????????????????</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 my-0 d-md-block bg-light sidebar collapse ">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="record.php">
                                <span class="ml-2">?????????????????????????????????????????????</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listprogram.php">
                                <span class="ml-2">???????????????????????????????????????</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="newuser.php">
                                <span class="ml-2">???????????????????????????????????????????????????????????????</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    </ol>
                </nav>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="h2">Dashboard</h1>
                                    <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">
                                        <h5 class="card-header">???????????????????????????????????????????????????????????????</h5>
                                        <h9 class="card-header mt-2">??????????????????????????????????????????????????????????????????????????????????????????</h9>
                                        <div class="card-body">
                                            <div id="traffic-chart"></div>
                                        </div>
                                    </div>
                                    <a href="sportuser.php" class="card-link">??????????????????????????????????????????????????????????????????</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-3">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-header my-2">??????????????????????????????</h3>
                                <p>The card shows the information of each type of swimming posture.</p>
                                <div class="row my-4">
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <img src="image/freestyle.jpg" class="card-img-top" width="50" height="150"
                                            alt="...">
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
                                        <img src="image/Backstroke.jpg" class="card-img-top" width="50" height="150"
                                            alt="...">
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
                                        <img src="image/Butterfly.jpg" class="card-img-top" width="50" height="150"
                                            alt="...">
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
                                        <img src="image/Breaststroke.jpg" class="card-img-top" width="50" height="150"
                                            alt="...">
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-12 mb-4 mb-lg-0 mt-5">
                    <div class="card">
                        <h5 class="card-header">??????????????????????????????????????????????????????</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="customers">
                                    <thead>
                                        <th>???????????????</th>
                                        <th>???????????????????????????????????????</th>
                                        <th>????????????????????????</th>
                                        <th>?????????</th>
                                        <th>???????????????</th>
                                        <th>???????????????????????????</th>
                                        <th>??????????????????????????????</th>
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
                            <a href="record.php" class="btn btn-block btn-success">????????????????????????????????????????????????????????????????????????</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-12 mb-4 mb-lg-0 mt-5">
                    <div class="card">
                        <h5 class="card-header">???????????????????????????????????????</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="customers">
                                    <thead>
                                        <tr>
                                            <th scope="col">???????????????</th>
                                            <th scope="col">??????????????????????????????</th>
                                            <th scope="col">????????????????????????</th>
                                            <th scope="col">?????????</th>
                                            <th scope="col">??????????????????????????????</th>
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
                            <a href="listprogram.php" class="btn btn-block btn-success">???????????????????????????????????????????????????????????????</a>
                        </div>
                    </div>
                </div>
            </main>
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