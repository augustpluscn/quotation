<?php

function getDd()
{
    $path = base_path();
    $path .= "/public/dd.json";
    $json_string = file_get_contents($path);
    $data = json_decode($json_string, true);
    return (object) $data;
}

function getSerialByPre($table, $col, $pre = '')
{
    $day = date('ymd');
    $pre .= $day;
    $m = \DB::connection('cus')->table($table);
    if ($pre) {
        $m = $m->where($col, 'like', $pre . '%');
    }
    $max = $m->max($col);
    if ($max) {
        $no = str_replace($pre, "", $max);
        $no += 1;
        $no = substr('000' . $no, -3);
        $serial = $pre . $no;
    } else {
        $serial = $pre . '001';
    }
    return $serial;
}
