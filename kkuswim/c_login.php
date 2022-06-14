<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
session_start();
if (isset($_REQUEST['Username'])) {
  //connection
  include("c_log.php");
  //รับค่า user 
  $Username = $_REQUEST['Username'];
  //query 
  $sql = "SELECT * FROM `babydetail` INNER JOIN parentdetail on babydetail.id = parentdetail.id Where phonemother='" . $Username . "' ";

  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_array($result);

    $_SESSION["UserID"] = $row["id"];
    $_SESSION["Userlevel"] = $row["status"];
    $_SESSION["UserImage"] = $row["image"];
    $_SESSION["UserName"] = $row["name"];
    $_SESSION["UserLastname"] = $row["lastname"];
    $_SESSION["UserNickname"] = $row["nickname"];
    $_SESSION["UserSex"] = $row["sexbaby"];
    $_SESSION["UserBirthday"] = $row["birthday"];
    $_SESSION["UserAge"] = $row["agebaby"];
    $_SESSION["UserFather"] = $row["namefather"];
    $_SESSION["UserMother"] = $row["namemother"];
    $_SESSION["UserAddress"] = $row["address"];
    $_SESSION["UserPhoneF"] = $row["phonefather"];
    $_SESSION["UserPhoneM"] = $row["phonemother"];
    $_SESSION["UserStudy"] = $row["study"];
    $_SESSION["UserLevel"] = $row["level"];
    $_SESSION["UserDisease"] = $row["disease"];
    $_SESSION["UserDetails"] = $row["details"];




    if ($_SESSION["Userlevel"] == "1") {

      Header("Location: sportuser.php");
    }

    if ($_SESSION["Userlevel"] == "2") {

      Header("Location: index.php");
    }
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {


  Header("Location: login.php"); //user & password incorrect back to login again

}