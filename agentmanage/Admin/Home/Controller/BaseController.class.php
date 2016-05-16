<?php
namespace Home\Controller;

use Think\Controller;

/**
 * BaseController
 * 通用控制器
 */
class BaseController extends CommonController {
    //获取基本信息
    protected function getInfo($id){
        $info = M('Agent_user')->where('id = '.$id)->find();
        return $info;
    }

    //获取id姓名
    protected function getName($id){
        $res = M('Agent_user')->where('id ='.$id)->getField('name');
        if (empty($res)) {
            $res = '公司';
        }
        return $res;
    }

    //获取快递公司名称
    protected function getSentName($name){
        $res = M('sent')->where('company_code = "'.$name.'"')->getField('company');
        // echo M()->getLastSql();
        // var_dump($res);exit;
        return $res;
    }

    //获取分页
    protected function getPage($db, $where, $order, $page, $num){
        $num = empty($num) ? 10 : $num ;
        $list['list'] = $db->order($order)->page($page)->where($where)->select();
        // echo $db->getLastSql();exit;
        $list['count']  = $db->where($where)->count();                  // 查询满足要求的总记录数
        $Page   = new \Think\Page($list['count'],$num);                 // 实例化分页类 传入总记录数和每页显示的记录数
        $list['show']   = $Page->show();                                // 分页显示输出

        return $list;
    }

    //代理商总消费
    protected function getCost($id){
            $money = M('Agent_cost')->where('uid ='.$id)->sum('cost_money');//->select();
            $money = empty($money)?'0':$money;
            return $money;
    }

    //获取管理员
    protected function getAdmin($admin, $role){
        if (isset($admin)) {
            $res = M('admin')->where('id = '.$admin)->getField('remark');
        }else{
            $res = M('admin')->where('is_active = 1 and role_id = 2')->field('id, remark')->select();
        }
        return $res;
    }

    
    protected function time_older_than($time){
        $time = time()-$time;
        // var_dump($time);exit;
        if ($time > 31536000) {
            $settime .= floor($time/31536000).'年';
            $time -= floor($time/31536000)*31536000;
        }
        if ($time > 2592000) {
            $settime .= floor($time/2592000).'月';
            $time -= floor($time/2592000)*2592000;
        }
        if ($time > 604800) {
            $settime .= floor($time/604800).'周';
            $time -= floor($time/604800)*604800;
        }
        if ($time > 86400) {
            $settime .= floor($time/86400).'天';
            $time -= floor($time/86400)*86400;
        }
        if ($time > 3600) {
            $settime .= floor($time/3600).'小时';
            $time -= floor($time/3600)*3600;
        }
        if ($time > 60) {
            $settime .= floor($time/60).'分钟';
            $time -= floor($time/60)*60;
        }else{
            $settime .= '刚刚';
        }
        return $settime;
    }

    public function getTree() {
        // if (!$this->uid) {
        //echo json_encode(array("status" => 1));
        
        // return ;
        // }
        if(I('post.user1') <> 0){
            $getuser = I('post.user1');
        }else{
            $getuser = 0;
        }
        //echo json_encode ( array ("status" => 1,"data" => $getuser ) );die;
        $base = $this->getTreeBaseInfo ( $getuser );
        $znote = $this->getTreeInfo ($getuser);
        // var_dump($znote);exit;
        $znote [] = $base;
        // dump($znote);die;
        /*
         * $znote = array(array("id" => 1, "pId" => 0, "name"=>"1000001"), array("id" => 2, "pId" => 1, "name"=>"1000002"), array("id" => 3, "pId" => 2, "name"=>"1000003"), array("id" => 5, "pId" => 2, "name"=>"1000003"), array("id" => 4, "pId" => 1, "name"=>"1000004") );
         */
        
        echo json_encode ( array ("status" => 0,"data" => $znote ) );
    }
    
    public function getTreeso() {
        
        if(I('post.user')<>''){
        
        if(! preg_match ( '/^[a-zA-Z0-9@.]{1,120}$/', I('post.user') )){
            
            echo json_encode ( array ("status" => 1,"data" => '用戶名格式不對!' ) );
            
        }else{
        
        if(!M('user')->where(array('name'=>I('post.user')))->find()){
            echo json_encode ( array ("status" => 1,"data" => '用戶不存在!' ) );
        }else{
             
            
                        $base = $this->getTreeBaseInfo ( I('post.user') );
        $znote = $this->getTreeInfo ( I('post.user') );
        $znote [] = $base;
        echo json_encode ( array ("status" => 0,"data" => $znote ) );
            
        
        }
        }
        }else{
            
            //echo json_encode ( array ("status" => 0,'nr'=>I('post.user')) );die;
            // if (!$this->uid) {
            // echo json_encode(array("status" => 1));
            // return ;
            // }
            //die;
            $base = $this->getTreeBaseInfo ('admin@qq.com');
            $znote = $this->getTreeInfo ('admin@qq.com');
            $znote [] = $base;
            // dump($znote);die;
            /*
             * $znote = array(array("id" => 1, "pId" => 0, "name"=>"1000001"), array("id" => 2, "pId" => 1, "name"=>"1000002"), array("id" => 3, "pId" => 2, "name"=>"1000003"), array("id" => 5, "pId" => 2, "name"=>"1000003"), array("id" => 4, "pId" => 1, "name"=>"1000004") );
            */
            
            echo json_encode ( array ("status" => 0,"data" => $znote ) );
        }
    }
    
    protected function getTreeBaseInfo($id) {
        // if (! $id)
        //     return;
        $r = M ( "Agent_user" )->where ( array ( 'id' => $id ) )->find ();
        if ($r)
            return array (
                    "id" => $r ['id'],
                    "pId" => $r ['fid'],
                    "name" => $r ['name'] . "[" .$this->getCheck($r['ischeck']).",". $r ['name'] . "," . $r ['create_time'] . "]" 
            );
        return;
    }
    
    protected function getTreeInfo($id) {
        static $trees = array ();
        $ids = self::get_childs ( $id );
        // echo '<pre>';var_dump($ids);exit;
        if (! $ids){
            return $trees;  
        }

        // $_SESSION['user_jb']++;
        //echo $_SESSION['user_jb'].'<br>';
        foreach ( $ids as $v ) {
            if(!empty($v))
            {
                $trees [] = $this->getTreeBaseInfo ( $v );
                $this->getTreeInfo ( $v );
            }
        
        }

        return $trees;
    }

    protected static function get_childs($id) {

        // if (! $id)
        //     return null;
        
        $childs_id = array ();
        $childs = M ( "Agent_user" )->field ( "id" )->where ( array ('fid' => $id ) )->select ();
        
        foreach ( $childs as $v ) {
            $childs_id [] = $v ['id'];
        }
        
        if ($childs_id)
            return $childs_id;
        return 0;
    }

    protected function getCheck($r){
        $a = array('未审核', '已审核');
        return $a[$r];
    }

    //得到不同管理员的数据
    protected function getCheckMan($man){
        $role = $_SESSION['current_account']['role_id'];
        $checkman = $_SESSION['current_account']['id'];
        if ($role == '2') {
            $checkman = 'and '.$man.' = '.$checkman;
        }else{
            $checkman = '';
        }
        return $checkman;
    }
}
