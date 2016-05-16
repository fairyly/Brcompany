<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
class UserController extends URController {
    
    public function index(){
        $id = I('get.id');
        // $id = 31;
        // var_dump($id);exit;
        $user = $this->getInfo('id = "'.$id.'"');
        // echo '<pre>';var_dump($_SESSION);exit;
        $user['level'] = $user['agent_level'];
        $user['cost'] = $this->getCost($user['id']);
        $user['fid'] = $this->getName($user['fid']);
        $user['agent_level'] = $this->getLevel($user['agent_level']);
        $user['order_count'] = M('Agent_cost')->where('uid ='.$user['id'])->count();
        // echo '<pre>';var_dump($user);exit;
        $this->assign('info', $user);
        $this->display();
    }

    //修改密码
    public function editPassword(){
		$id=I("get.id");
        $id = $_GET['id'];
        // var_dump($id);
		if(IS_POST){
            $pwd = md5(addslashes(I('post.pass')));
            $res = M('Agent_user')->where(array('id'=>$id))->save(array('telpwd'=>$pwd));
            // echo M()->getLastSql();
            // var_dump($pwd);exit;
	        if($res){
		        $this->success('修改密码成功', 'editPassword');
	        }else{
		        $this->error('修改密码失败！');
	        }
        }else{
			$this->assign('id', $id);
			$this->display();
		}
        
    }

    //在线升级
    public function upgrade(){
        $id=I("get.id");
        if (!I('get.status')) {
            $level = M('Agent_user')->where('id ='.$id)->getField('agent_level');
            if ($level == 1) {
                $this->error('请求错误');
                $this->redirect('User/index', array('id'=>$id));
            }
            $res = M('Agent_upgrade')->where('uid ='.$id.' and status = 0')->find();
            if ($res) {
                $status = 1;
            }
        }

        $this->assign('admin', $this->getAdmin());
        $this->assign('id', $id);
        $this->assign('status', $status);
        $this->display();
    }

    //升级处理
    public function upgradedeal(){
        // echo '<pre>';
        // // var_dump($_FILES);
        // var_dump($_GET);
        // var_dump($_POST);exit;
        $upgrade['uid'] = I("get.id");
        $upgrade['checkman'] = intval(I('post.people'));
        $upgrade['up_level'] = intval(I('post.level'));
        $upgrade['up_note'] = addslashes(I('post.content'));
        $upgrade['up_time'] = time();
        $upgrade['ex_level'] = M('Agent_user')->where('id ='.$upgrade['uid'])->getField('agent_level');
        if (empty($upgrade['up_level'])||empty($upgrade['check_man']))
            $this->error('请选择升级级别');

        if ($upgrade['ex_level'] < $upgrade['up_level'])
            $this->error('不能选择比自己低的级别升级');

        if (empty($_FILES))
            $this->error('请选择上传图片');
        $agent_upgrade = M('Agent_upgrade')->where('uid = '.$upgrade['uid'].' and status = 0')->select();
        if ($agent_upgrade) {
            $this->error(' 您已提交申请，请等待工作人员审核！');
        }
        //上传
        $upload = new \Think\Upload();
        $upload->maxSize   =    3145728 ;
        $upload->exts      =    array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath  =    '../Public/uploads/home/';
        $upload->savePath  =    '../Public/uploads/home/';

        $info   =   $upload->upload($_FILES);
        //echo '<pre>';var_dump($info);exit;
        if(!$info) {
            $this->error($upload->getError());
        }else{
            foreach ($info as $value) {
                $upgrade['pic_path'] = $value['savepath'];
                $upgrade['pic_name'][] = $value['savename'];
            }
        }
        $upgrade['pic_name'] = implode(',', $upgrade['pic_name']);
        $res = M('Agent_upgrade')->add($upgrade);
        if ($res) {
            $this->success('申请成功，请等待审核！');
        }
    }

    //在线下单
    public function orderOnline(){
        $id=I("get.id");
        $check = $this->getCheck($id);
        if (!$check) {
            $this->error();
        }else{
            $code = mt_rand(0,1000000);
            $_SESSION['code'] = $code;
            $this->assign('id', $id);
            $this->assign('code', $code);
            $this->assign('admin', $this->getAdmin());
            $this->display('orderOnline1');
        }
    }

    public function onlineadd(){
        if($_GET['code'] == $_SESSION['code']){
            // echo '<pre>';var_dump($_GET);
            // var_dump($_POST);
            // var_dump($_FILES);exit;
            $order['uid'] = I('get.id');
            $order['operate_people'] = intval(I('post.people'));
            $order['recman'] = addslashes(trim(I('post.entry_name')));
            $order['rectel'] = addslashes(trim(I('post.entry_tel')));
            $order['recadd'] = addslashes(trim(I('post.entry_add')));
            $order['four'] = intval(I('post.four'));
            $order['five'] = intval(I('post.five'));
            $order['six']  = intval(I('post.six'));
            $order['sixp'] = intval(I('post.sixp'));
            $order['note'] = addslashes(trim(I('post.entry_note')));
            $order['create_time'] = time();
            if (empty($order['operate_people'])) {
                $this->error('请选择对接助理');
            }
            if (empty($order['recman'])||empty($order['rectel'])||empty($order['recadd'])) {
                $this->error('必填项不能为空');
            }
            if (empty($_FILES)) {
                $this->error('请添加打款截图');
            }
            $user = M('Agent_user');
            $cost_money = ($order['four']+$order['five']+$order['six']+$order['sixp'])*10;
            $order['orderLevel'] = $user->where('id = '.$order['uid'])->getField('agent_level');
            //计算返利
            if ($order['orderLevel'] == 1) {
                $order['one_uid'] = $user->where('id = '.$order['uid'].' and agent_level = 1')->getField('fid');
                if ($order['one_uid'] == 0 || empty($order['one_uid'])) {
                    $order['one_uid'] = $order['one_level_rebate'] = $order['two_uid'] = $order['two_level_rebate'] = 0;
                }else{
                    $order['one_level_rebate'] = $cost_money*0.1;
                    $order['two_uid'] = $user->where('id = '.$order['one_uid'].' and agent_level = 1')->getField('fid');
                    if (!empty($order['two_uid'])) {
                        $order['two_level_rebate'] = $cost_money*0.05;
                    }else{
                        $order['two_uid'] = $order['two_level_rebate'] = 0;
                    }
                }
            }else{
                $order['one_uid'] = $user->where('id = '.$order['uid'].' and agent_level = '. $order['orderLevel'])->getField('fid');
                if ($order['one_uid'] == 0 || empty($order['one_uid'])) {
                    $order['one_uid'] = $order['one_level_rebate'] = 0;
                }else{
                    $order['one_level_rebate'] = $cost_money*0.1;
                }
            }
            //上传打款截图
            $upload = new \Think\Upload();
            $upload->maxSize   =    3145728 ;
            $upload->exts      =    array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath  =    '../Public/uploads/home/';
            $upload->savePath  =    '../Public/uploads/home/';

            $info   =   $upload->upload($_FILES);
            if(!$info) {
                $this->error($upload->getError());
            }else{
                foreach ($info as $value) {
                    $order['rec_pic_path'] = $value['savepath'];
                    $order['rec_pic_name'][] = $value['savename'];
                }
            }
            $order['rec_pic_name'] = implode(',', $order['rec_pic_name']);
            //添加
            // echo '<pre>';var_dump($order);exit;
            $res = M('Agent_cost')->add($order);
            // echo M()->getLastSql();exit;
            if ($res) {
                $this->success('下单成功！', U('User/index',array('id'=>$order['uid'])));
            }
        }else{
            echo '请不要刷新本页面或重复提交表单！';
        }
    }

    //快递
    public function order(){
        $id = I('get.id');
        $check = $this->getCheck($id);
        if (!$check) 
            $this->error();

        $order1 = M('Agent_cost')->where('uid = '.$id.' and sent = 1 and check = 1')->order('create_time desc')->select();
        foreach ($order1 as $key => $value) {
          //  $kdSearch[$key] = json_decode(getOrderTracesByJson($value['sent_company'], $value['sent_number']), true);
          //  var_dump($kdSearch);exit;
            $kdSearch1[$key]['OrderCode'] = date('YmdHis', $value['create_time']);
            $kdSearch1[$key]['OrderTime'] = date('Y-m-d H:i', $value['create_time']);
            $kdSearch1[$key]['four'] = $value['four'];
            $kdSearch1[$key]['five'] =$value['five'];
            $kdSearch1[$key]['six'] =$value['six'];
            $kdSearch1[$key]['sixp'] =$value['sixp'];
            $kdSearch1[$key]['moth'] =date('m', $value['create_time']);
            $kdSearch1[$key]['day'] =date('d', $value['create_time']);
            $kdSearch1[$key]['recman']=$value['recman'];
            $kdSearch1[$key]['recadd']=$value['recadd'];
            $kdSearch1[$key]['sentCompany'] = $this->getSentName($value['sent_company']);
            $kdSearch1[$key]['sentNumber']=$value['sent_number'];
            $kdSearch1[$key]['ShipperCode'] = $value['sent_company'];
        }//exit;
        $order2 = M('Agent_cost')->where('uid = '.$id.' and sent = 0 and check = 1')->order('create_time desc')->select();
        foreach ($order2 as $key => $val) {
          //  $kdSearch[$key] = json_decode(getOrderTracesByJson($val['sent_company'], $val['sent_number']), true);
          //  var_dump($kdSearch);exit;
            $kdSearch2[$key]['OrderCode'] = date('YmdHis', $val['create_time']);
            $kdSearch2[$key]['OrderTime'] = date('Y-m-d H:i', $val['create_time']);
            $kdSearch2[$key]['four'] = $val['four'];
            $kdSearch2[$key]['five'] =$val['five'];
            $kdSearch2[$key]['six'] =$val['six'];
            $kdSearch2[$key]['sixp'] =$val['sixp'];
            $kdSearch2[$key]['moth'] =date('m', $val['create_time']);
            $kdSearch2[$key]['day'] =date('d', $val['create_time']);
            $kdSearch2[$key]['recman']=$val['recman'];
            $kdSearch2[$key]['recadd']=$val['recadd'];
            // $kdSearch2[$key]['ShipperCode'] = $this->getSentName($kdSearch2[$key]['ShipperCode']);
            
        }
        // echo '<pre>';var_dump($kdSearch1,$kdSearch2);exit;
        $this->assign('sents', $kdSearch1);
        $this->assign('nosents', $kdSearch2);
        $this->display();
    }

    public function getSentInfo(){
        import("ORG.Net.KdApiSearchDemo");
        $sentCompany = I('sentCompany');
        $sentNumber =I('sentNumber');
        
        $sentInfo= getOrderTracesByJson($sentCompany, $sentNumber);
        $this->ajaxReturn($sentInfo);        
    }
}