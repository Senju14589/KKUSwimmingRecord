<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">

<?php
session_start();
include_once('function.php');

?>
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


         <?php

         include_once('function.php');
         $fetchdata = new DB_con();
         $sql = $fetchdata->fetchdata4();
         while ($row = mysqli_fetch_array($sql)) {

         ?>

         <div class="row">
            <div class="col-lg-4">
               <div class="card mb-4">
                  <div class="card-body text-center">
                     <img src="<?php echo $_SESSION["UserImage"]; ?>" alt=" avatar" class="rounded-circle img-fluid"
                        style="width: 150px;">
                     <h5 class="my-3"><?php echo $_SESSION['UserName']; ?>
                        <?php echo $_SESSION['UserLastname']; ?></h5>

                     <p class="text-muted mb-1">??????????????????????????????????????????</p>
                     <p class="text-muted mb-4">???????????????????????? ?????????????????????????????????????????????????????????????????????</p>
                     <button class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleShow">???????????????????????????????????????????????????</button>
                     <!-- ???????????????????????? -->
                     <div class="modal fade" id="exampleShow" tabindex="-1" role="dialog" aria-labelledby="exampleShow"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <nav class="navbar bg-light">
                                 <div class="container-fluid">
                                    <a class="navbar-brand" href="#">
                                       ???????????????????????????????????????
                                    </a>
                                 </div>
                              </nav>
                              <div class="card ">
                                 <div class="card-body text-left">
                                    <h2 class="card-text">???????????? :<?php echo $_SESSION['UserName']; ?>
                                       <?php echo $_SESSION['UserLastname']; ?></h2>
                                    <h5 class="card-text">???????????????????????? :<?php echo $_SESSION['UserNickname']; ?></h5>
                                    <h5 class="card-text">????????? :<?php echo $_SESSION["UserSex"]; ?></h5>
                                    <h5 class="card-text">????????????????????? :<?php echo $_SESSION['UserBirthday']; ?></h5>
                                    <h5 class="card-text">???????????? :<?php echo $_SESSION['UserAge']; ?></h5>
                                    <h5 class="card-text">?????????????????????????????? :<?php echo $_SESSION['UserFather']; ?></h5>
                                    <h5 class="card-text">?????????????????????????????? :<?php echo $_SESSION['UserMother']; ?></h5>
                                    <h5 class="card-text">????????????????????? :<?php echo $_SESSION['UserAddress']; ?></h5>
                                    <h5 class="card-text">????????????????????????????????????????????????????????? :<?php echo $_SESSION['UserPhoneF']; ?>
                                    </h5>
                                    <h5 class="card-text">????????????????????????????????????????????????????????? :<?php echo $_SESSION['UserPhoneM']; ?>
                                    </h5>
                                    <h5 class="card-text">????????????????????????????????????????????????????????????????????????
                                       :<?php echo $_SESSION['UserStudy']; ?>
                                    </h5>
                                    <h5 class="card-text">??????????????????????????????????????????????????? :<?php echo $_SESSION['UserLevel']; ?></h5>
                                    <h5 class="card-text">???????????????????????????????????????????????? :<?php echo $_SESSION['UserDisease']; ?></h5>
                                    <h5 class="card-text">????????????????????????????????????????????? :<?php echo $_SESSION['UserDetails']; ?></h5>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <button class="btn btn-outline-primary" data-toggle="modal"
                        data-target="#exampleEdit">?????????????????????????????????</button>
                     <!-- ??????????????? -->
                     <div class="container">
                        <div class="modal fade" id="exampleEdit" tabindex="-1" role="dialog"
                           aria-labelledby="exampleEdit" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <nav class="navbar bg-light">
                                    <div class="container-fluid">
                                       <a class="navbar-brand">
                                          ??????????????????????????????????????????????????????
                                       </a>
                                    </div>
                                 </nav>
                                 <div class="modal-header">
                                    <div class="container row col-lg-12">
                                       <form action="newuser.php" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                             <div class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-2">
                                                <p>
                                                <h3>??????????????????????????????????????????????????????
                                                </h3>
                                                </p>
                                                <div class="mb-1">
                                                   <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                   </input>
                                                </div>
                                                <div class="input-group mb-3">
                                                   <input type="text" class="form-control mt-4" name="name"
                                                      value="<?php echo $row['name']; ?>" required>
                                                   <input type="text" class="form-control mt-4" name="lastname"
                                                      value="<?php echo $row['lastname']; ?>" required>
                                                </div>
                                                <div class="mb-4">
                                                   <input type="text" class="form-control mt-4" name="nickname"
                                                      value="<?php echo $row['nickname']; ?>" required>
                                                </div>
                                                <div class="input-group mb-4">
                                                   <select class="form-select" name="sexbaby">
                                                      <option <?php if ($row['sexbaby'] == "?????????") {
                                                                     echo "selected";
                                                                  } ?> value="?????????">
                                                         ?????????
                                                      </option>
                                                      <option <?php if ($row['sexbaby'] == "????????????") {
                                                                     echo "selected";
                                                                  } ?> value="????????????">
                                                         ???????????????
                                                      </option>
                                                   </select>
                                                   <input type="number" name="agebaby" class="form-control"
                                                      value="<?php echo $row['agebaby']; ?>" required>
                                                </div>
                                                <div class="mb-4">
                                                   <label for="birthday">?????????????????????</label>
                                                   <input type="date" class="form-control" name="birthday"
                                                      value="<?php echo $row['birthday']; ?>" required>
                                                </div>
                                                <div class="mb-4">
                                                   <label for="image">?????????????????????????????????</label>
                                                   <input type="file" name="file" id="file" class="form-control"
                                                      value="<?php echo $row['image']; ?>" <p>
                                                   <img src="<?php echo $row['image']; ?>" height="100" width="200"
                                                      alt="">
                                                   </p>
                                                </div>
                                             </div>
                                             <div class="col-12 col-md-12 col-lg-6 mb-8 mb-lg-4">
                                                <div class="mb-4">
                                                   <h3>????????????????????????????????????????????????????????????
                                                   </h3>
                                                </div>
                                                <div class="mb-4">
                                                   <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                   </input>
                                                </div>
                                                <div class="mb-3">
                                                   <input type="text" class="form-control" name="namefather"
                                                      value="<?php echo $row['namefather']; ?>" required>
                                                </div>
                                                <div class="input-group mb-4">
                                                   <select class="form-select" name="rsfather">
                                                      <option <?php if ($row['rsfather'] == "??????????????????????????????????????????") {
                                                                     echo "selected";
                                                                  } ?> value="??????????????????????????????????????????">
                                                         ??????????????????????????????????????????
                                                      </option>
                                                      <option <?php if ($row['rsfather'] == "????????????????????????") {
                                                                     echo "selected";
                                                                  } ?> value="????????????????????????">
                                                         ????????????????????????
                                                      </option>
                                                      <option <?php if ($row['rsfather'] == "??????????????????????????????") {
                                                                     echo "selected";
                                                                  } ?> value="??????????????????????????????">
                                                         ??????????????????????????????
                                                      </option>
                                                   </select>
                                                   <input type="text" name="phonefather" class="form-control"
                                                      value="<?php echo $row['phonefather']; ?>" required>
                                                </div>
                                                <div class="mb-4">
                                                   <input type="email" class="form-control" name="emailfather"
                                                      value="<?php echo $row['emailfather']; ?>" required>
                                                </div>
                                                <div class="mb-4">
                                                   <input type="text" name="namemother" class="form-control"
                                                      value="<?php echo $row['namemother']; ?>" required>
                                                </div>
                                                <div class="input-group mb-4">
                                                   <select class="form-select" name="rsmother">
                                                      <option <?php if ($row['rsmother'] == "??????????????????????????????????????????") {
                                                                     echo "selected";
                                                                  } ?> value="??????????????????????????????????????????">
                                                         ??????????????????????????????????????????
                                                      </option>
                                                      <option <?php if ($row['rsmother'] == "????????????????????????") {
                                                                     echo "selected";
                                                                  } ?> value="????????????????????????">
                                                         ????????????????????????
                                                      </option>
                                                      <option <?php if ($row['rsmother'] == "??????????????????????????????") {
                                                                     echo "selected";
                                                                  } ?> value="??????????????????????????????">
                                                         ??????????????????????????????
                                                      </option>
                                                   </select>
                                                   <input type="number" class="form-control" name="phonemother"
                                                      value="<?php echo $row['phonemother']; ?>" required>
                                                </div>
                                                <div class="mb-4">
                                                   <input type="email" class="form-control" name="emailmother"
                                                      value="<?php echo $row['emailmother']; ?>" required>
                                                </div>
                                                <div class="mb-4">
                                                   <input type="text" class="form-control" name="address"
                                                      value="<?php echo $row['address']; ?>" required>
                                                </div>
                                             </div>
                                          </div>
                                          <button type="submit" name="update2"
                                             class="btn btn-success">?????????????????????????????????</button>
                                          <button type="button" class="btn btn-danger"
                                             data-dismiss="modal">??????????????????!</button>
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
            <div class="col-lg-8">
               <div class="card">
                  <div class="card-body">
                     <h2 class="card-title">????????????????????????????????????????????????</h2>
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        ??????????????????????????????????????????????????????
                     </button>
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <div class="container row col-lg-12">
                                    <nav class="navbar bg-light">
                                       <div class="toast-header">
                                          <strong class="me-auto">??????????????????????????????????????????????????????</strong>
                                       </div>
                                    </nav>
                                    <form action="" method="post">
                                       <div class="row">
                                          <div class="container">
                                             <p>
                                             <h3 class="text-center">???????????????????????????????????????????????????</h3>
                                             </p>
                                             <p>
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                             </p>
                                             <div class="input-group">
                                                <label class="input-group">??????????????????????????????</label>
                                                <input type="date" class="form-control" name="day" required>
                                                <select class="form-select" name="poise">
                                                   <option selected>
                                                      ???????????????????????????????????????</option>
                                                   <option value="Freestyle">
                                                      Freestyle</option>
                                                   <option value="Backstroke">
                                                      Backstroke</option>
                                                   <option value="Butterfly">
                                                      Butterfly</option>
                                                   <option value="Breaststroke">
                                                      Breaststroke</option>
                                                   <option value="IM">IM
                                                   </option>
                                                </select>
                                             </div> <br>
                                             <div class="input-group mb-3">
                                                <label class="input-group">?????????????????????/????????????????????????????????????
                                                </label>
                                                <select class="form-select" name="distance">
                                                   <option selected>?????????????????????
                                                   </option>
                                                   <option value="50 ????????????">50
                                                      ????????????</option>
                                                   <option value="100 ????????????">100
                                                      ????????????</option>
                                                   <option value="200 ????????????">200
                                                      ????????????</option>
                                                </select>
                                                <input type="time" name="timer" class="form-control"
                                                   placeholder="????????????????????????????????????" required>
                                             </div>
                                          </div>
                                       </div>
                                       <button type="submit" name="insert" class="btn btn-success">?????????????????????????????????</button>
                                       <button type="button" class="btn btn-danger"
                                          data-dismiss="modal">??????????????????!</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container">
                     <h3 class="card-header my-2">????????????????????????????????????</h3>
                     <div class="row my-4">
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <th>???????????????</th>
                                 <th>??????????????????</th>
                                 <th>??????????????????????????????</th>
                                 <th>?????????????????????</th>
                                 <th>????????????</th>
                                 <th>????????????????????????????????????????????????????????????????????????????????????</th>
                              </thead>
                              <tbody>
                                 <?php

                                    include_once('function.php');
                                    $fetchdata = new DB_con();
                                    $i = 1;
                                    $sql = mysqli_query($fetchdata->dbcon, "SELECT * FROM babydetail, record WHERE babydetail.id = record.babydetail_id AND babydetail.id = '" . $_GET['id'] . "' ");
                                    while ($row = mysqli_fetch_array($sql)) {

                                    ?>

                                 <tr>

                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['day']; ?></td>
                                    <td><?php echo $row["poise"]; ?></td>
                                    <td><?php echo $row['distance']; ?></td>
                                    <td><?php echo $row['timer']; ?></td>
                                    <td>
                                       <button class="btn btn-primary" type="submit" data-toggle="modal"
                                          data-target="#exampleShow<?php echo $row['id']; ?>">????????????????????????????????????</button>

                                       <div class="modal fade" id="exampleShow<?php echo $row['id']; ?>" tabindex="-1"
                                          role="dialog" aria-labelledby="exampleShow" aria-hidden="true">
                                          <div class="modal-dialog " role="document">
                                             <div class="card">
                                                <div class="modal-content">
                                                   <div class="container">
                                                      <nav class="navbar bg-light">
                                                         <div class="container-fluid">
                                                            <a class="navbar-brand" href="#">
                                                               ????????????????????????????????????????????????????????????????????????????????????
                                                            </a>
                                                         </div>
                                                      </nav>
                                                   </div> <br>
                                                   <div class="container">
                                                      <div class="row">
                                                         <div class="input-group mb-4">
                                                            <select class="form-select" id="id_list"
                                                               data-id="<?php echo $row['id']; ?>" name="list">
                                                               <option value="">
                                                                  ????????????????????????????????????????????????????????????????????????????????????
                                                               </option>
                                                               <?php
                                                                     $sql4 = "SELECT * FROM listprogram ";
                                                                     $result4 = mysqli_query($fetchdata->dbcon, $sql4);
                                                                     while ($row4 = mysqli_fetch_array($result4)) {
                                                                        echo '<option value="' . $row4['id'] . '"> ' . $row4['list'] . '</option>';
                                                                     }
                                                                     ?>
                                                            </select>
                                                            <input class="btn btn-success" type="submit"
                                                               value="????????????????????????????????????">
                                                         </div>
                                                         <div class="col-md-6 details">
                                                            <p>
                                                               <h8>?????????????????????????????????????????????????????? :
                                                                  ????????????????????????
                                                                  :<?php echo $tia; ?>
                                                               </h8> <br>
                                                               <h8>????????????????????????????????????????????? :
                                                                  <?php echo $tai2; ?><br>
                                                               </h8>
                                                            </p>

                                                         </div>
                                                         <div id="dataload"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
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
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="card">
                           <h5 class="card-header">???????????????????????????????????????????????????????????????</h5>
                           <h9 class="card-header mt-2">?????????????????????????????????????????????????????????????????????????????????????????????</h9>
                           <div class="card-body">
                              <div id="traffic-chart"></div>
                           </div>
                        </div>
                        <a href="" class="card-link">12 ???????????????????????????????????????</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
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
         [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60]
      ]
   }, {
      low: 0,
      showArea: true
   });
   </script>

</body>

</html>