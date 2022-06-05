<?php
include_once('function.php');
include_once('date.php');

$timeee = '1:11.44'; //เวลาที่นักเรียนทำได้

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

$fetchdata = new DB_con();
$sql = "SELECT * FROM `statswim` WHERE `distance` LIKE 'Freestyle 100' AND `sex` = 'ชาย'";
$result = mysqli_query($fetchdata->dbcon, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo $row['no'] . ' = ' . $row['8_9'] . '/' . timeDiff($row['8_9']) . '<br>';
    $dcd[] = $row['8_9'];
    $no[] = $row['no'];
}
echo '<hr>' . timeDiff($timeee) . '<br>';

if (timeDiff($timeee) <= timeDiff($dcd[0])) {
    echo timeDiff($timeee) . ' < ' . timeDiff($dcd[0]) . '=' . $no[0];
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
