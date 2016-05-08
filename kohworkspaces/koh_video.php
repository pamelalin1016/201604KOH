<?php
require_once('__init.php');
require_once(DIR_TO.'library/db.php');
require_once(DIR_TO.'library/pagination.php');
require_once(DIR_TO . "model/koh.php");
$db = new DB(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$model_activity_koh = new ModelActivityKoh($db);


$isget['page']          = ft(@$_GET['page']);
$type                   = ft(@$_GET['type']);
$type                   = ($type == '')?1:$type;

if (isset($isget['page'])) {
    $page = $isget['page'];
} else {
    $page = 1;
}

$config_limit = 100;

$data                              = array(
    'type'  => $type,
    'start' => ($page - 1) * $config_limit,
    'limit' => $config_limit
);

$coupon_total                      = $model_activity_koh->getKohVideoListCoupons($data);
$results                           = $model_activity_koh->getKohVideoList($data);

$lists                             = $results;

$pagination                        = new Pagination();
$pagination->total                 = $coupon_total;
$pagination->page                  = $page;
$pagination->limit                 = $config_limit;
$pagination->text_next             = '下一頁';
$pagination->text_prev             = '上一頁';
$pagination->url                   = 'koh_user.php?'.$url.'&page={page}';
$pagination                        = $pagination->render();



require("head.php");

?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="span12">
	    			<h3>影片分享</h3>
	    		</div>
		    	<div class="row-fluid">
		    		<div class="pull-left span3 text-left">
		    			<form>
		    			<select name="type" onchange="this.form.submit();">
		    				<option value="1" <?php echo ($type == '1')?'selected="selected"':''; ?>>瑜珈篇影片</option>
		    				<option value="2" <?php echo ($type == '2')?'selected="selected"':''; ?>>籃球篇影片</option>
		    				<option value="3" <?php echo ($type == '3')?'selected="selected"':''; ?>>喝酒篇影片</option>
		    			</select>
		    			</form>
		    		</div>
		    	</div>
		    	<?php //echo $page->getPageHead();?> 
		        <div class="row-fluid">
		            <table class="table table-hover table-striped table-bordered">
		            	<thead>
		            		<tr>
		            			<th>序號</th>
		            			<th>分享時間</th>
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
		            			
		            			<!-- 分享時間 -->
		            			<td><?php echo $row['date_added'];?></td>
		            			
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
		        <?php echo $pagination;?>
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