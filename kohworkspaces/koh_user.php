<?php
ini_set('display_errors', '0');
// Configuration
if (require("../config.php")) {
    require("../config.php");
}

require_once('__init.php');
require_once(DIR_TO.'library/db.php');
require_once(DIR_TO.'library/pagination.php');
require_once(DIR_TO . "model/koh.php");
$db = new DB(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$model_activity_koh = new ModelActivityKoh($db);





if($_GET['download'] == 'list'){
    $data                              = array(
        'start' => 0,
        'limit' => 1048576
    );
    
    $results                           = $model_activity_koh->getKohList($data);

    if (PHP_SAPI == 'cli')
        die('This example should only be run from a Web Browser');
    
    /** Include PHPExcel */
    require_once DIR_TO . 'library/PHPExcel_1.8.0_doc/Classes/PHPExcel.php';


    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()   ->setCreator("Maarten Balliauw")
                                    ->setLastModifiedBy("Maarten Balliauw")
                                    ->setTitle("Office 2007 XLSX Test Document")
                                    ->setSubject("Office 2007 XLSX Test Document")
                                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                    ->setKeywords("office 2007 openxml php")
                                    ->setCategory("Test result file");

    // Add some data
    if(isset($results) && count($results) > 0){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '序號');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', '登錄發票時間');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', '登錄發票編號');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', '姓名');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', '性別');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', '電話');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', '地址');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Fb id');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Fb 名稱');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', '影片分享次數');
        
        foreach($results as $key => $res){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($key+2), $res['id']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($key+2), $res['invoice_ct_dt']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($key+2), str_replace ("\n","\r\n",$res['invoice_num']));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($key+2), $res['name']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.($key+2), ($res['sex'])?'男':'女');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.($key+2), '\''.$res['tel']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.($key+2), $res['addr']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.($key+2), $res['fb_id']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.($key+2), $res['fb_name']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.($key+2), $res['share_cnt']);
        }
    }

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('KOH'.date('YmdHis'));
    $objPHPExcel->setActiveSheetIndex(0);
    
    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="KOH'.date('YmdHis').'.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
    
}





$isget['page']          = ft(@$_GET['page']);


if (isset($isget['page'])) {
    $page = $isget['page'];
} else {
    $page = 1;
}

$config_limit = 100;

$data                              = array(
    'start' => ($page - 1) * $config_limit,
    'limit' => $config_limit
);

$coupon_total                      = $model_activity_koh->getKohListCoupons($data);
$results                           = $model_activity_koh->getKohList($data);

$lists                             = $results;

$pagination                        = new Pagination();
$pagination->total                 = $coupon_total;
$pagination->page                  = $page;
$pagination->limit                 = $config_limit;
$pagination->text_next             = '下一頁';
$pagination->text_prev             = '上一頁';
$pagination->url                   = 'user.php?'.$url.'&page={page}';
$pagination                        = $pagination->render();



require("head.php");

?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="span12">
	    			<h3>會員列表</h3>
	    		</div>
		    	<div class="row-fluid">
		    		<div class="pull-left span3 text-left">
		    			<a href="koh_user.php?download=list" class="btn btn-primary">會員資料匯出</a>
		    		</div>
		    	</div>
		    	<?php //echo $page->getPageHead();?> 
		        <div class="row-fluid">
		            <table class="table table-hover table-striped table-bordered">
		            	<thead>
		            		<tr>
		            			<th>序號</th>
		            			<th>登錄發票時間</th>
		            			<th>登錄發票編號</th>
		            			<th>姓名</th>
		            			<th>性別</th>
		            			<th>電話</th>
		            			<th>地址</th>
		            			<th>Fb id</th>
		            			<th>Fb 名稱</th>
		            			<th>影片分享次數</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php 
		            		if(isset($lists) && count($lists) > 0){
    		            		foreach($lists as $key => $row)
    		            		{
		            		?>
		            		<tr>
		            			<!-- 序號 -->
		            			<td><?php echo $row['id'];?></td>
		            			
		            			<!-- 登錄發票時間 -->
		            			<td><?php echo $row['invoice_ct_dt'];?></td>
		            			
		            			<!-- 登錄發票編號 -->
		            			<td><?php echo nl2br($row['invoice_num']);?></td>
		            			
		            			<!-- 姓名 -->
		            			<td><?php echo $row['name'];?></td>
		            			
		            			<!-- 性別 -->
		            			<td><?php echo ($row['sex'])?'男':'女';?></td>
		            			
		            			<!-- 電話 -->
		            			<td><?php echo $row['tel'];?></td>
		            			
		            			<!-- 地址 -->
		            			<td><?php echo $row['addr'];?></td>
		            			
		            			<!-- Fb id -->
		            			<td><?php echo $row['fb_id'];?></td>
		            			
		            			<!-- Fb 名稱 -->
		            			<td><?php echo $row['fb_name'];?></td>
		            			
		            			<!-- 影片分享次數 -->
		            			<td><?php echo $row['share_cnt'];?></td>
		            			
		            		</tr>
		            		<?php 
		            		    }
		            		}
		            		?>
		            	</tbody>
		            </table>
		        </div>
		        <?php //echo $page->getPageFoot();?>
            </div>
            <!--/span-->
        </div>
        <!--/row-->

    </div>
	
	<script type="text/javascript">
	function del(id,name)
	{
		if( confirm( '您確定要刪除 [' + name + '] 嗎?' ) )
		{
			window.location.href='demo_add_mod_act.php?act=del&id='+id;
		}
	}
	</script>
<?php 
require("foot.php");
function ft($data){
    return htmlentities(trim(stripslashes(@$data)));
}
?>