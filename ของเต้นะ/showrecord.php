<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">

<?php
include_once('function.php');
include_once('date.php');



function timeDiff($tt)
{ //function เปลี่ยนเวลาเป็น มิลลิวินาที
    $time = explode(':', $tt);
    $s1 = $time[0] * 60;

    $time2 = explode('.', $time[1]);
    $s2 = $time2[0] * 1000;
    $s3 = $time2[1];

    $s = ($s1 * 1000) + $s2 + $s3;
    return $s;
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
    <div class="container-fluid">
        <div class="row" align="center">
            <div class="container">
                <main class="col-md-10  col-lg-10 ">
                    <div class="container mt-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-header my-2">ตารางการซ้อม</h3>
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
                                                    <?php

                                                    include_once('function.php');
                                                    $fetchdata = new DB_con();
                                                    $i = 1;
                                                    $sql = mysqli_query($fetchdata->dbcon, "SELECT * FROM `babydetail`, record WHERE babydetail.id = record.babydetail_id AND babydetail.id = '" . $_GET['id'] . "' ");
                                                    while ($row = mysqli_fetch_array($sql)) {

                                                    ?>
                                                    <tr>

                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['day']; ?></td>
                                                        <td><?php echo $row["poise"]; ?></td>
                                                        <td><?php echo $row['distance']; ?></td>
                                                        <td><?php echo $row['timer']; ?></td>
                                                        <td>
                                                            <select name="search" required>
                                                                <option value=""> รายการแข่งที่ใช้เปรียบเที่ยบ</option>
                                                                <?php
                                                                    $sql4 = "SELECT list FROM listprogram WHERE list != '' GROUP BY list";
                                                                    $result4 = mysqli_query($fetchdata->dbcon, $sql4);
                                                                    while ($row4 = mysqli_fetch_array($result4)) {
                                                                        echo '<option value="' . $row4['list'] . '"> ' . $row4['list'] . '</option>';
                                                                    }
                                                                    ?>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <?php
                                                                $sql4 = "SELECT * FROM `statswim` WHERE `distance` 
                                                            LIKE '" . $row["poise"] . " " . $row["distance"] . "' AND `sex` = '" . $_GET["sex"] . "'";
                                                                $result4 = mysqli_query($fetchdata->dbcon, $sql4);
                                                                while ($row4 = mysqli_fetch_array($result4)) {
                                                                    //echo $row4['no'] . ' = ' . $row4['8_9'] . '/' . timeDiff($row4['8_9']) . '<br>';
                                                                    $dcd[] = $row4['8_9'];
                                                                    $no[] = $row4['no'];
                                                                }
                                                                $timeee = $row['timer'];
                                                                //เวลาที่นักเรียนทำได้
                                                                if (timeDiff($timeee) <= timeDiff($dcd[0])) {
                                                                    echo 'ลำดับที่ ' . $no[0];
                                                                } else if (timeDiff($dcd[0]) < timeDiff($timeee) && timeDiff($timeee) <= timeDiff($dcd[1])) {
                                                                    echo $no[1];
                                                                } else if (timeDiff($dcd[1]) < timeDiff($timeee) && timeDiff($timeee) <= timeDiff($dcd[2])) {
                                                                    echo $no[2];
                                                                } else if (timeDiff($dcd[2]) < timeDiff($timeee) && timeDiff($timeee) <= timeDiff($dcd[3])) {
                                                                    echo $no[3];
                                                                } else if (timeDiff($dcd[3]) < timeDiff($timeee) && timeDiff($timeee) <= timeDiff($dcd[4])) {
                                                                    echo $no[4];
                                                                } else if (timeDiff($dcd[4]) < timeDiff($timeee) && timeDiff($timeee) <= timeDiff($dcd[5])) {
                                                                    echo $no[5];
                                                                } else if (timeDiff($dcd[5]) < timeDiff($timeee) && timeDiff($timeee) <= timeDiff($dcd[6])) {
                                                                    echo $no[6];
                                                                } else if (timeDiff($dcd[6]) < timeDiff($timeee) && timeDiff($timeee) <= timeDiff($dcd[7])) {
                                                                    echo $no[7];
                                                                }
                                                                ?>
                                                        </td>
                                                    </tr>
                                                    <?php $i++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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