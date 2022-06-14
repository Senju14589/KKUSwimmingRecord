<?php
include_once('conn.php');
if (isset($_POST)) {

    // echo $sql4 = "SELECT * FROM detailslist 
    // INNER JOIN listprogram 
    // on listprogram.id = detailslist.listprogram_id 
    // INNER JOIN record 
    // on record.babydetail_id = listprogram.id 
    // WHERE listprogram_id = '" . $_POST['val'] . "'";
    $result4 = mysqli_query($db, $sql4);
    $row4 = mysqli_fetch_array($result4);
    if ($row4['b8_b9'] != '00:00:00') {
        $score = $row4['b8_b9'];
    } else if ($row4['b10_b11'] != '00:00:00') {
        $score = $row4['b10_b11'];
    } else if ($row4['b1213'] != '00:00:00') {
        $score = $row4['b1213'];
    } else if ($row4['b1415'] != '00:00:00') {
        $score = $row4['b1415'];
    } else if ($row4['g8_g9'] != '00:00:00') {
        $score = $row4['g8_g9'];
    } else if ($row4['g10_g11'] != '00:00:00') {
        $score = $row4['g10_g11'];
    } else if ($row4['g12_g13'] != '00:00:00') {
        $score = $row4['g12_g13'];
    } else if ($row4['g14_g15'] != '00:00:00') {
        $score = $row4['g14_g15'];
    }

    $score_1 = explode(":", $score);
    $score_h = $score_1[0];
    $score_m = $score_1[1];
    $score_s = $score_1[2];
    $timer_1 = explode(":", $row4['timer']);
    $timer_h = $timer_1[0];
    $timer_m = $timer_1[1];
    $timer_s = $timer_1[2];

    $sum_h = $score_h - $timer_h;
    $sum_m = $score_m - $timer_m;
    $sum_s = $score_s - $timer_s;
    // $name_prov_ = explode(" ", $name_prov[1]);
    // $name_prov_trim = TRIM(strtoupper($name_prov_[0]));

    echo $sum_h . ":" . $sum_m  . ":" . $sum_s;

    // echo "<a>" . $SUM . "</a>";
    echo "<br>" . $_POST['val'];
} else {
}
