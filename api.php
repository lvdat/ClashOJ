<?php
// FILE TRA VE DU LIEU KHI CO DU LIEU

$data = array('status' => 403, 'code' => '', 'des' => '', 'data' => []);
header('Content-type: text/json');
header("Access-Control-Allow-Origin: http://localhost");
header('Access-Control-Allow-Methods: GET');
define('ACCEPTED_INCLUDE', true);
require 'config.php';

if(!isset($_GET['type'])){
    $data['status'] = 422;
    $data['des'] = 'Missing or unvalid params on request.';
}else{
    if(!isset($_GET['name'])){
        $data['status'] = 422;
        $data['des'] = 'Please include a name in params.';
    }else{
        $name = $_GET['name'];
        // Neu co request tu client.
        $req = $_GET['type']; // Lay request.
        if($req == 'problems'){
            // request lay thong tin problem
            $data['status'] = 200;
            if(checkProblemExists($name)){
                $data['data']['info'] = getProblem($name);
                $data['data']['testcase'] = getTestCase($name);
            }

        }elseif($req == 'clash'){
            
        }
    }
}


?>
<?=json_encode($data)."\n"?>