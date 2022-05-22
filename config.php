<?php
session_start();

if(!defined('ACCEPTED_INCLUDE')){
    header('Content-type: text/json');
    die('Access Denied.');
};

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'oj';

date_default_timezone_set('Asia/Ho_Chi_Minh');

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
    echo 'Khong the ket noi CSDL';
    die();
}

function checkClashExists($clash){
    global $conn;
    $sql = "SELECT slug FROM clash WHERE slug = '$clash'";
    return mysqli_query($conn, $sql)->num_rows > 0;
}

function checkProblemExists($pb){
    global $conn;
    $sql = "SELECT short_name FROM problem WHERE short_name = '$pb'";
    return mysqli_query($conn, $sql)->num_rows > 0;
}

function getProblem($pb){
    global $conn;
    $sql = "SELECT * FROM problem WHERE short_name = '$pb'";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql));
}

function getTestCase($pb){
    global $conn;
    $pbid = getProblem($pb)['ID'];
    $sql = "SELECT * FROM testcase WHERE id_problem = $pbid";
    $kq = mysqli_query($conn, $sql);
    $testcase = [];
    $i = 0;
    while($e = mysqli_fetch_assoc($kq)){
        $testcase[$i]['inp'] = $e['input'];
        $testcase[$i]['out'] = $e['output'];
        $i++;
    }   
    return $testcase;
}