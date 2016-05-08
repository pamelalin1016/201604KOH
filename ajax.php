<?php 
ini_set('display_errors', '0');
define('SET_SETTING_FILE', './');

// Configuration
if (require("config.php")) {
    require("config.php");
}

require_once(DIR_TO.'library/db.php');
require_once(DIR_TO.'library/pagination.php');
require_once(DIR_TO . "model/koh.php");
$db = new DB(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$model_activity_koh = new ModelActivityKoh($db);

$mod = ft($_GET['mod']);

if($mod == 'fb'){
    $data['fb_id'] = ft($_POST['fb_id']);
    $data['fb_name'] = ft($_POST['name']);

//     $data['fb_id'] = ft($_GET['fb_id']);
//     $data['fb_name'] = ft($_GET['name']);
    $uid = $model_activity_koh->chkKohUser($data);
    if($uid){
        echo json_encode(array('s'=>1,'msg'=>$uid));
    }else{
        $uid = $model_activity_koh->addKohUser($data);
        if($uid){
            echo json_encode(array('s'=>1,'msg'=>(string) $uid));
        }else{
            echo json_encode(array('s'=>-1,'msg'=>'寫入失敗'));
        }
    }
    exit;
}


if($mod == 'invoice'){
    $fb['fb_id'] = ft($_POST['invoice_fb_id']);
    $uid = $model_activity_koh->chkKohUser($fb);
    
    $data['invoice_num1'] = strtoupper(ft($_POST['invoice_num']['0']));
    $data['invoice_num2'] = strtoupper(ft($_POST['invoice_num']['1']));
    $data['invoice_num3'] = strtoupper(ft($_POST['invoice_num']['2']));
    $data['invoice_num4'] = strtoupper(ft($_POST['invoice_num']['3']));
    $data['invoice_num5'] = strtoupper(ft($_POST['invoice_num']['4']));
    $data['name'] = ft($_POST['invoice_name']);
    $data['age'] = (int) ft($_POST['invoice_age']);
    $data['tel'] = ft($_POST['invoice_tel']);
    $data['addr'] = ft($_POST['invoice_zipcode']) . ' ' . ft($_POST['invoice_county']) . ' ' . ft($_POST['invoice_district']) . ' ' . ft($_POST['invoice_addr']);
    $data['user_id'] = $uid;
    
    $invoice = $model_activity_koh->addKohInvoice($data);
    
    if($invoice){
        echo json_encode(array('s'=>1,'msg'=>$invoice));
    }else{
        echo json_encode(array('s'=>-1,'msg'=>'寫入失敗'));
    }
    exit;
}

if($mod == 'video'){
    $fb['fb_id'] = ft($_POST['fb_id']);
    $uid = $model_activity_koh->chkKohUser($fb);
    
    $data['video'] = ft($_POST['video']);
    $data['user_id'] = $uid;
    
    $video = $model_activity_koh->chkKohVideo($data);
    
    
    
    if($video){
        echo json_encode(array('s'=>1,'msg'=>$video));
        exit;
    }
    
    $video = $model_activity_koh->addKohVideo($data);
    if($video){
        echo json_encode(array('s'=>1,'msg'=>$video));
    }else{
        echo json_encode(array('s'=>-1,'msg'=>'寫入失敗'));
    }
    exit;
    
}

if($mod == 'get_user'){
    $fb['fb_id'] = ft($_POST['fb_id']);
    $fb['fb_id'] = ($fb['fb_id'] == '')?ft($_GET['fb_id']):$fb['fb_id'];
    $u_data = $model_activity_koh->getKohInvoice($fb);
    if(isset($u_data) && count($u_data) > 0){
        mb_internal_encoding("UTF-8");
        $addr = $u_data['addr'];
        $u_data['addr'] = explode(' ', $addr);
        $u_data['addr'][3] = mb_substr($addr, mb_strpos($addr,' ',11,'UTF-8')+1);
        echo json_encode(array('s'=>1,'msg'=>$u_data));
    }else{
        echo json_encode(array('s'=>-1,'msg'=>''));
    }
    exit;
}




echo json_encode(array('s'=>-1,'msg'=>'寫入失敗'));



function ft($data){
    return htmlentities(trim(stripslashes(@$data)));
}
?>

