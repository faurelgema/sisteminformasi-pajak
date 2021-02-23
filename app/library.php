<?php 

function showAlert($alert) {
    $_SESSION['alert'] = $alert;
}

function printAlert() {
    if(isset($_SESSION['alert'])) {
        $alert = explode(":", $_SESSION['alert']);
        $type = $alert[0];
        $message = $alert[1];
        if($alert) {
            echo "<div class='alert alert-$type'>$message</div>";
        }
        unset($_SESSION['alert']);
    }    
}

function getActualLink() {
    $url = pathinfo("http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");    
    return $url['dirname'];
}

function redirect($route) {    
    $actual_link = getActualLink();    
    echo "<meta http-equiv='refresh' content='0; URL=$actual_link?page=$route'>";
}

function redirectUrl($url) {
    echo "<meta http-equiv='refresh' content='0; URL=$url'>";
}

function getUrl($route, $params=[]) {
    $actual_link = getActualLink();
    $result = "$actual_link?page=$route";

    foreach($params as $key=>$param) {
        $result .= "&$key=$param";
    }
    return $result;
}

function url($route, $params=[]) {
    $actual_link = getActualLink();
    $result = "$actual_link?page=$route";

    foreach($params as $key=>$param) {
        $result .= "&$key=$param";
    }
    echo $result;
}

function formatRupiah($angka) {
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

function stringContains($str, $word) {
    return strpos($str, $word) !== false;
}

function valueTransformer($field, $value) {
    
    if (stringContains($field, 'total')) {
        echo formatRupiah($value); return;
    }
    if (stringContains($field, 'pajak_bumi') || stringContains($field, 'pajak_bangunan')) {
        echo formatRupiah($value); return;
    }
    if(stringContains($field, 'status_wajib_pajak')) {
        $result = $value ? 'WAJIB' : 'TIDAK WAJIB';
        echo $result; return;
    }
    echo $value;
}

?> 