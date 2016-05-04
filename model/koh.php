<?php
class ModelActivityKoh{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    
    public function chkKohUser($data) {
        $sql = "SELECT `id` as `id` FROM `activity_koh_user` WHERE `fb_id`='".$data['fb_id']."'";
        $query = $this->db->query($sql);
        return $query['0']['id'];
    }
    
    public function addKohUser($data) {
        $sql = "INSERT INTO `activity_koh_user` ";
        $sql .= "(`fb_id`                 , `fb_name`                 ,`date_added`) VALUES ";
        $sql .= "('".$data['fb_id']."'    , '".$data['fb_name']."'    ,'".date('Y-m-d H:i:s')."')";
        $this->db->query($sql);

        return $this->db->getLastId();
    }

    # 新增
    public function addKohInvoice($data) {
        $sql = "INSERT INTO `activity_koh_invoice` ";
        $sql .= "(`invoice_ct_dt`           , `invoice_num1`              , `invoice_num2`              , `invoice_num3`              , `invoice_num4`              , `invoice_num5`              , `name`              , `sex`              , `age`              , `tel`              , `addr`              , `user_id`) VALUES ";
        $sql .= "('".date('Y-m-d H:i:s')."' , '".$data['invoice_num1']."' , '".$data['invoice_num2']."' , '".$data['invoice_num3']."' , '".$data['invoice_num4']."' , '".$data['invoice_num5']."' , '".$data['name']."' , '".$data['sex']."' , '".$data['age']."' , '".$data['tel']."' , '".$data['addr']."' , '".$data['user_id']."')";
        $this->db->query($sql);
        return $this->db->getLastId();
    }
    
    public function chkKohVideo($data) {
        $sql = "SELECT `id` as `id` FROM `activity_koh_video` WHERE video='".$data['video']."' AND `user_id`='".$data['user_id']."'";
        $query = $this->db->query($sql);
        return $query['0']['id'];
    }

    public function addKohVideo($data) {
        $sql = "INSERT INTO `activity_koh_video` ";
        $sql .= "(`video`              , `user_id`              , `date_added` ) VALUES ";
        $sql .= "('".$data['video']."' , '".$data['user_id']."' , '".date('Y-m-d H:i:s')."')";
        $this->db->query($sql);
        
        $video_id = $this->db->getLastId();
        if($video_id){
            $this->addKohVideoCnt($data['user_id']);
        }
        return $video_id;
    }
    
    #
    public function getKohList($data = array()) {
        $sql = "SELECT a.id,a.invoice_ct_dt,CONCAT(a.invoice_num1,'\n',a.invoice_num2,'\n',a.invoice_num3,'\n',a.invoice_num4,'\n',a.invoice_num5) invoice_num,a.name,a.sex,a.age,a.tel,a.addr,u.fb_id,u.fb_name,u.share_cnt FROM `activity_koh_invoice` as a RIGHT JOIN `activity_koh_user` as u ON a.user_id = u.id  ";

        $sql .='WHERE 1=1';

        $sql .= " ORDER BY invoice_ct_dt DESC";

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);
        return $query;
    }

    public function getKohListCoupons($data = array()){
        $sql = "SELECT COUNT(*) AS total FROM `activity_koh_invoice` as a RIGHT JOIN `activity_koh_user` as u ON a.user_id = u.id ";
        $query = $this->db->query($sql);
        return $query['0']['total'];
    }
    public function addKohVideoCnt($id = 0){
        $sql = "UPDATE activity_koh_user SET `share_cnt` = `share_cnt`+1 ";
        $sql .= "WHERE `id` = ".$id;
        $query = $this->db->query($sql);
    }

    public function getKohReportInvoice($dt = 0) {
        $sql = "SELECT count(id) as invoice_cnt,COUNT(DISTINCT user_id) as invoice_user_cnt FROM `activity_koh_invoice` ";
        $sql .='WHERE invoice_ct_dt >= "'.date('Y-m-d',$dt).'" and invoice_ct_dt < "'.date('Y-m-d',$dt+86400).'"';
    
        $query = $this->db->query($sql);
        return $query[0];
    }

    public function getKohReportVideo($dt = 0) {
        $sql = "SELECT count(id) as video_cnt,COUNT(DISTINCT user_id) as video_user_cnt FROM `activity_koh_video` ";
        $sql .='WHERE date_added >= "'.date('Y-m-d',$dt).'" and date_added < "'.date('Y-m-d',$dt+86400).'"';
    
        $query = $this->db->query($sql);
        return $query[0];
    }
    


    public function getKohReportTotalInvoice() {
        $sql = "SELECT count(id) as invoice_cnt,COUNT(DISTINCT user_id) as invoice_user_cnt FROM `activity_koh_invoice` ";
        //$sql .='WHERE invoice_ct_dt >= "'.date('Y-m-d',$dt).'" and invoice_ct_dt < "'.date('Y-m-d',$dt+86400).'"';
    
        $query = $this->db->query($sql);
        return $query[0];
    }
    
    public function getKohReportTotalVideo() {
        $sql = "SELECT count(id) as video_cnt,COUNT(DISTINCT user_id) as video_user_cnt FROM `activity_koh_video` ";
        //$sql .='WHERE date_added >= "'.date('Y-m-d',$dt).'" and date_added < "'.date('Y-m-d',$dt+86400).'"';
    
        $query = $this->db->query($sql);
        return $query[0];
    }
}