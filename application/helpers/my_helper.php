<?php
defined('BASEPATH') or exit('No direct script access allowed');

function initialize_elfinder($value = '')
{
    $CI = &get_instance();
    $CI->load->helper('path');
    $opts = array(
        //'debug' => true, 
        'roots' => array(
            array(
                'driver' => 'LocalFileSystem',
                'path'   => './assets/uploads/',
                'URL'    => base_url('assets/uploads') . '/'
                // more elFinder options here
            )
        )
    );

    return $opts;
}


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

/**
 * 
 * 
 * Indonesia Number Converter - Collection of PHP functions to convert a number
 *                            into Bahasa Indonesia text.
 *
 */

function terbilang($nilai)
{
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($nilai == 0) {
        return "Kosong";
    } elseif ($nilai < 12 & $nilai != 0) {
        return "" . $huruf[$nilai];
    } elseif ($nilai < 20) {
        return terbilang($nilai - 10) . " Belas ";
    } elseif ($nilai < 100) {
        return terbilang($nilai / 10) . " Puluh " . terbilang($nilai % 10);
    } elseif ($nilai < 200) {
        return " Seratus " . terbilang($nilai - 100);
    } elseif ($nilai < 1000) {
        return terbilang($nilai / 100) . " Ratus " . terbilang($nilai % 100);
    } elseif ($nilai < 2000) {
        return " Seribu " . terbilang($nilai - 1000);
    } elseif ($nilai < 1000000) {
        return terbilang($nilai / 1000) . " Ribu " . terbilang($nilai % 1000);
    } elseif ($nilai < 1000000000) {
        return terbilang($nilai / 1000000) . " Juta " . terbilang($nilai % 1000000);
    } elseif ($nilai < 1000000000000) {
        return terbilang($nilai / 1000000000) . " Milyar " . terbilang($nilai % 1000000000);
    } elseif ($nilai < 100000000000000) {
        return terbilang($nilai / 1000000000000) . " Trilyun " . terbilang($nilai % 1000000000000);
    } elseif ($nilai <= 100000000000000) {
        return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
    }
}



/**
 * 
 * 
 * English Number Converter - Collection of PHP functions to convert a number
 *                            into English text.
 *
 */

function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{
        0} == "-") {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    } else if ($integer{
        0} == "+") {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{
        0} == "0") {
        $output .= "zero";
    } else {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g) {
            $groups2[] = convertThreeDigit($g{
                0}, $g{
                1}, $g{
                2});
        }

        for ($z = 0; $z < count($groups2); $z++) {
            if ($groups2[$z] != "") {
                $output .= $groups2[$z] . convertGroup(11 - $z) . ($z < 11
                    && !array_search('', array_slice($groups2, $z + 1, -1))
                    && $groups2[11] != ''
                    && $groups[11]{
                        0} == '0'
                    ? " and "
                    : ", ");
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0) {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++) {
            $output .= " " . convertDigit($fraction{
                $i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index) {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0") {
        return "";
    }

    if ($digit1 != "0") {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0") {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0") {
        $buffer .= convertTwoDigit($digit2, $digit3);
    } else if ($digit3 != "0") {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0") {
        switch ($digit1) {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1") {
        switch ($digit2) {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }
    } else {
        $temp = convertDigit($digit2);
        switch ($digit1) {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit) {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}

/* End of file my_helper.php */
