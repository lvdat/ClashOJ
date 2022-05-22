<?php
define('ACCEPTED_INCLUDE', true);
require "config.php";

$action = "main";
$clash = "";
# require "xtemplate/submit.php";

if(isset($_GET['clash'])){
    if(checkClashExists($_GET['clash'])){
        $clash = $_GET['clash'];
        if(isset($_GET['action']) && $_GET['action'] == 'play'){
            $action = 'play';
        }else{
            $action = 'clash_info';
        }
    }else{
        die("Clash không tồn tại!");
    }
}

?>
<?php if($action == 'main') : ?>
<?php require "xtemplate/main_clash.php"; ?>

<?php elseif($action == 'clash_info') : ?>

<?php elseif($action == 'play') : ?>
<?php
    define('CLASH', $clash);
    require "xtemplate/submit.php";
?>

<?php endif ?>