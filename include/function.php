<?php

function tgl_indo($date){
    /** Array hari dan bulan**/
    $Hari = array("minggu","senin","selasa","rabu","kamis","jumat","sabtu");
    $Bulan = array("januari","febuari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember");
    /** substring **/
$tahun = substr($date, 0 , 4);
$bulan = substr($date, 5 , 2);
$tgl   = substr($date, 8 , 2);
$waktu = substr($date, 11 , 5);
$hari  = date("w", strtotime($date));

$result = $Hari[$hari] . ", " .  $tgl . " " . $Bulan[(int)$bulan-1] .  " " . $tahun . " " . $waktu . " WIB";
return $result;

}

?>