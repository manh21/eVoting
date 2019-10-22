<?php
defined('BASEPATH') or exit('No direct script access allowed');

function j($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
}

function cek_login()
{
    $CI = &get_instance();

    $ref = uri_string();

    if ($CI->session->userdata('logged') == false && $CI->session->userdata('username') == "") {
        if (empty($ref)) {
            redirect("auth");
        } else {
            redirect("auth?goto=" . urlencode($ref));
        }
    }
}

function cek_level($arr_level)
{
    $CI = &get_instance();

    $level = $CI->session->userdata('level');
    if (!in_array($level, $arr_level)) {
        show_404();
    }
}

function cek_login_bol()
{
    $CI = &get_instance();

    if ($CI->session->userdata('logged') == false && $CI->session->userdata('username') == "") {
        return false;
    } else {
        return true;
    }
}

function cek_level_bol($level)
{
    $CI = &get_instance();

    if ($CI->session->userdata('level') == $level) {
        return true;
    } else {
        return false;
    }
}

function tjs($tgl)
{
    if ($tgl != "") {
        $pc_satu = explode(" ", $tgl);
        if (count($pc_satu) < 2) {
            $tgl1 = $pc_satu[0];
            $jam1 = "";
        } else {
            $jam1 = $pc_satu[1];
            $tgl1 = $pc_satu[0];
        }
        $pc_dua = explode("-", $tgl1);
        $tgl    = $pc_dua[2];
        $bln    = $pc_dua[1];
        $thn    = $pc_dua[0];
        if ($bln == "01") {
            $bln_txt = "Januari";
        } else if ($bln == "02") {
            $bln_txt = "Februari";
        } else if ($bln == "03") {
            $bln_txt = "Maret";
        } else if ($bln == "04") {
            $bln_txt = "April";
        } else if ($bln == "05") {
            $bln_txt = "Mei";
        } else if ($bln == "06") {
            $bln_txt = "Juni";
        } else if ($bln == "07") {
            $bln_txt = "Juli";
        } else if ($bln == "08") {
            $bln_txt = "Agustus";
        } else if ($bln == "09") {
            $bln_txt = "September";
        } else if ($bln == "10") {
            $bln_txt = "Oktober";
        } else if ($bln == "11") {
            $bln_txt = "November";
        } else if ($bln == "12") {
            $bln_txt = "Desember";
        } else {
            $bln_txt = "";
        }
        return $tgl . " " . $bln_txt . " " . $thn . "  " . $jam1;
    } else {
        return "";
    }
}

/* End of file my_helper.php */
