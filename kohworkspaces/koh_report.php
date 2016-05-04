<?php
require_once('__init.php');
require_once(DIR_TO.'library/db.php');
require_once(DIR_TO.'library/pagination.php');
require_once(DIR_TO . "model/koh.php");
$db = new DB(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$model_activity_koh = new ModelActivityKoh($db);
require("head.php");
?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="span12">
	    			<h3>活動資料</h3>
	    		</div>
		    	<?php //echo $page->getPageHead();?> 
		        <div class="row-fluid">
		            <table class="table table-hover table-striped table-bordered">
		            	<thead>
		            		<tr>
		            			<th>時間</th>
		            			<th>發票登錄總人數</th>
		            			<th>發票登錄總次數</th>
		            			<th>參與分享影片總人數</th>
		            			<th>分享影片總次數</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php 
                            $startDate = strtotime('2016-05-01');
                            $endDate = time();
                            $start = true;
		            		for($dt = $startDate ; $dt <= $endDate ; $dt += 86400)
		            		{
		            		    $invoice = $model_activity_koh->getKohReportInvoice($dt);
		            		    $video = $model_activity_koh->getKohReportVideo($dt);
		            		    
		            		    if(
		            		        $start
		            		        && $invoice['invoice_user_cnt'] == 0
		            		        && $invoice['invoice_cnt'] == 0
		            		        && $video['video_user_cnt'] == 0
		            		        && $video['video_cnt'] == 0
		            		        ){
		            		        continue;
		            		    }elseif($start){
		            		        $start = false;
		            		    }
		            		?>
		            		<tr>
		            			<!-- 時間 -->
		            			<td><?php echo date('m/d',$dt);?></td>
		            			
		            			<!-- 發票登錄總人數 -->
		            			<td><?php echo $invoice['invoice_user_cnt'];?></td>
		            			
		            			<!-- 發票登錄總次數 -->
		            			<td><?php echo $invoice['invoice_cnt'];?></td>
		            			
		            			<!-- 參與分享影片總人數 -->
		            			<td><?php echo $video['video_user_cnt'];?></td>
		            			
		            			<!-- 分享影片總次數 -->
		            			<td><?php echo $video['video_cnt'];?></td>
		            			
		            		</tr>
		            		<?php 
	            		    }
		            		?>
		            	</tbody>
		            </table>
		            <hr>
		            <table class="table table-hover table-striped table-bordered">
		            	<thead>
		            		<tr>
		            			<th>發票登錄總人數</th>
		            			<th>發票登錄總次數</th>
		            			<th>參與分享影片總人數</th>
		            			<th>分享影片總次數</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php 
		            		    $invoice = $model_activity_koh->getKohReportTotalInvoice();
		            		    $video = $model_activity_koh->getKohReportTotalVideo();
		            		?>
		            		<tr>
		            			<!-- 登錄發票時間 -->
		            			<td><?php echo $invoice['invoice_user_cnt'];?></td>
		            			
		            			<!-- 登錄發票編號 -->
		            			<td><?php echo $invoice['invoice_cnt'];?></td>
		            			
		            			<!-- 參與分享影片總人數 -->
		            			<td><?php echo $video['video_user_cnt'];?></td>
		            			
		            			<!-- 分享影片總次數 -->
		            			<td><?php echo $video['video_cnt'];?></td>
		            			
		            		</tr>
		            	</tbody>
		            </table>
		        </div>
            </div>
            <!--/span-->
        </div>
        <!--/row-->

    </div>
	
<?php 
require("foot.php");
function ft($data){
    return htmlentities(trim(stripslashes(@$data)));
}
?>