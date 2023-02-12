<?php

use Config\App;

function print_link_resource($resource)
{
	$link = "<link rel='stylesheet' href='" . base_url($resource) . "'>";
	echo $link . "\n";
}

function print_script_resource($resource)
{
	$script = "<script src='" . base_url($resource) . "'></script>";
	echo $script . "\n";
}

function isParamId($idParam)
{
	$isParamId = $idParam > "0" && is_numeric($idParam);
	return $isParamId;
}

function print_base_url($url = "")
{
	echo base_url($url);
}

function print_site_url($url = "")
{
	echo site_url($url);
}

function cleanString($stringValue)
{
	return htmlspecialchars($stringValue, ENT_QUOTES, 'UTF-8');
}

function print_var($var)
{
	echo isset($var) ? $var : '';
}

function get_var($var)
{
	return isset($var) ? $var : '';
}

function getArrayString($array, $key, $default = '')
{
	$value = isset($array[$key]) ? $array[$key] : $default;
	$value = is_string($value) ? $value : var_dump($value);
	return get_var($value);
}

// if (!function_exists('is_value_null_for_keys')) {
function populateArrayWithKey($arrays = array(), $key = '')
{
	$newArray = [];
	foreach ($arrays as $array) {
		$newArray[] = $array[$key];
	}
	return $newArray;
}
// }

function csrf_cookie(): string
{
	$config = config(App::class);
	return $config->CSRFCookieName;
}

/**
 * get site settings
 * 
 * @param	array	settings array form get_all()
 * @param	string	Key
 * @return 	string
 * @author	Naufal Hakim
 */
function get_setting($array, $key){
	$id = array_search($key, array_column($array, 'name'));
	return get_var($array[$id]['value']);
}

/**
 * Method untuk mendapatkan data site config
 *
 * @param  string $id
 * @param  string $get   nama atau value
 * @return string data
 */
function get_pengaturan($id, $get = 'value')
{
    $result = get_row_data('setting_model', 'retrieve', array($id), $get);
    return $result;
}

/**
 * Fungsi yang berguna untuk mendapatkan data tertentu dari model tertentu
 *
 * @param  string $model
 * @param  string $func
 * @param  array  $args
 * @param  string $field_name
 * @return array|string
 */
function get_row_data($model, $func, $args = array(), $field_name = '')
{
    $CI =& get_instance();
    $CI->load->model($model);

    $retrieve = call_user_func_array(array($CI->$model, $func), $args);

    if (empty($field_name)) {
        return $retrieve;
    } else {
        return isset($retrieve[$field_name]) ? $retrieve[$field_name] : '';
    }
}

/**
 * Clean String for Value Input
 * 
 * @param	string	Value String
 * @return 	string	Cleaned Value Safe for Input Form
 * @author	Naufal Hakim
 */
function cleanValue($string)
{
	return get_var(cleanString($string));
}

/**
 * get admin prefix from env
 * 
 * @return	string|null
 * @author	Naufal Hakim
 */
function get_admin_prefix(){
	if(!empty($_ENV['ADMIN_PREFIX'])){
		$adminPrefix = $_ENV['ADMIN_PREFIX'];
	}  else {
		$adminPrefix = '';
	}
	return $adminPrefix;
}

/**
 * Site Url Builder untuk admin
 * add support for admin prefix
 * 
 * @param	string	url to go 'admin/setting'
 * @return	string
 * @author 	Naufal Hakim
 */
function adminURL($string){	
	if (empty($string)) {
		return site_url(get_admin_prefix());
	}
	return site_url(get_admin_prefix() . '/' . $string);
}

/**
 * Redirect admin url with prefix
 * 
 * @param	string	url to go 'admin/setting'
 * @return	string|\CodeIgniter\HTTP\RedirectResponse
 * @author	Naufal Hakim
 */
function redirectAdmin($string){
	return redirect()->to(adminURL($string));
}

function generateRandomString($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isLogin()
{
    $CI = &get_instance();

    if ($CI->session->userdata('logged') == false && $CI->session->userdata('username') == "") {
        return false;
    } else {
        return true;
    }
}

function getUserData()
{
	$CI = &get_instance();

	if (isLogin()) {
		return $CI->session->userdata();
	} else {
		return false;
	}
}

function successAlert($message) {
	$ci = &get_instance();
	$ci->session->set_flashdata(
		'message',
		'<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		'. $message .'</div>'
	);
}

function errorAlert($message) {
	$ci = &get_instance();
	$ci->session->set_flashdata(
		'message',
		'<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		'. $message .'</div>'
	);
}

function dd()
{
	$args = func_get_args();
	echo '<pre>';
	foreach ($args as $arg) {
		var_dump($arg);
	}
	echo '</pre>';
	die;
}

function guidv4()
{
	$data = random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/**
 * Deklarasi path file
 *
 * @param  string $file
 * @return string
 */
function get_path_file($file = '')
{
    return './userfiles/'.$file;
}

/**
 * Fungsi untuk mendapatkan bulan dengan nama indonesia
 *
 * @param  string $bln
 * @return string
 */
function get_indo_bulan($bln = '')
{
    $data = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    if (empty($bln)) {
        return $data;
    } else {
        $bln = (int)$bln;
        return isset($data[$bln]) ? $data[$bln] : "";
    }
}

/**
 * Fungsi untuk mendapatkan nama hari indonesia
 *
 * @param  string $hari
 * @return string|array
 */
function get_indo_hari($hari = '')
{
    $data = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
    if (empty($hari)) {
        return $data;
    } else {
        $hari = (int)$hari;
        return $data[$hari];
    }
}

/**
 * Method untuk memformat tanggal ke indonesia
 *
 * @param  string $tgl
 * @return string
 */
function tgl_indo($tgl = '')
{
    if (!empty($tgl)) {
        $pisah = explode('-', $tgl);
        return $pisah[2].' '.get_indo_bulan($pisah[1]).' '.$pisah[0];
    }
}

/**
 * Method untuk memformat tanggal dan jam ke format indonesia
 *
 * @param  string $tgl_jam
 * @return string
 */
function tgl_jam_indo($tgl_jam = '')
{
    if (!empty($tgl_jam)) {
        $pisah = explode(' ', $tgl_jam);
        return tgl_indo($pisah[0]).' '.date('H:i', strtotime($tgl_jam));
    }
}

/**
 * Method untuk mendapatkan link file
 *
 * @param  string $ile
 * @param  string $size
 * @return string
 *
 */
function get_url_file($file, $size = '')
{
    if (empty($size)) {
        return base_url('userfiles/'.$file);
    } else {
        $pisah     = explode('.', $file);
        $ext       = end($pisah);
        $nama_file = $pisah[0];

        return base_url('userfiles/'.$nama_file.'_'.$size.'.'.$ext);
    }
}