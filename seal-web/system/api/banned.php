<?php
include '../oop.php';
$por = new seal;
// $pc = $por->banned($_POST['user_id']);
// if ($pc != 'success') {
//     $res = 'ไม่สามารถปลดแบนได้';
// } else {
//     $res = $pc;
// }
if (intval($_POST['func']) == 2) {
    $pc = $por->banned($_POST['user_id']);
    if ($pc == 'success') {
        $res = $pc;
    } else {
        $res = 'ไม่สามารถแบนได้';
    }
} else if (intval($_POST['func']) == 0) {
    $pc = $por->unbanned($_POST['user_id']);
    if ($pc == 'success') {
        $res = $pc;
    } else {
        $res = 'ไม่สามารถแบนได้';
    }
} else {
    $res = "ควย";
}


echo $res;
