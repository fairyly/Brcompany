<?php
namespace Home\Controller;

/**
 * OrderController
 * 订单管理
 * @author Qingkun Li
 */
class OrderController extends BaseController {
    /**
    *  订单详细列表
    */
    public function index(){
        $db = M('Agent_cost');
        $order = 'sent asc, `check` asc, create_time desc';
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $where = '';
        $order = $this->getPage($db, $where, $order, $page, 15);
        // echo '<pre>';var_dump($order);exit;
        $db1 = M('Agent_user');
        foreach ($order['list'] as $key => $val) {
            $order['list'][$key]['name'] = $this->getName($val['uid']);
            $order['list'][$key]['fid'] = $this->getName($db1->where('id ='.$val['uid'])->getField('fid'));
            $order['list'][$key]['tel'] = $db1->where('id ='.$val['uid'])->getField('tel');
            $order['list'][$key]['agent_level'] = $db1->where('id ='.$val['uid'])->getField('agent_level');
            $order['list'][$key]['recaddt'] = strlen($val['recadd'])>30?mb_substr($val['recadd'], 0, 10, 'utf-8').'……':$val['recadd'];
            if ($val['rec_pic_name']) {
                $pic = explode(',', $val['rec_pic_name']);
                $path = $val['rec_pic_path'];
                foreach ($pic as $k => $v) {
                    $url = $path.$v;
                    $order['list'][$key]['pic'] .= '<a href="'.$url.'">图'.$k.'</a>&nbsp;';
                }
            }
        }
        // echo '<pre>';var_dump($order);exit;
        $this->assign('order', $order['list']);
        $this->assign('order_count', $order['count']);
        $this->assign('page',$order['show']);

        $this->display();
    }

    //订单审核
    public function ordercheck(){
        $id = I('get.id');
        if (!$id) {
            $this->error('审核错误！');
        }
        $res = M('Agent_cost')->where('id = '.$id)->setField('check', 1);
        if ($res) {
            $this->success('审核成功');
        }
    }

    /**
    *  订单待审核
    */
    public function order(){
        // echo '<pre>';var_dump($_SESSION);
        $man = 'operate_people';
        $checkman = $this->getCheckMan($man);
        $db = M('Agent_cost');
        $order = 'create_time desc';
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $where = '`check` = 0 '.$checkman;
        $order = $this->getPage($db, $where, $order, $page, 15);

        $db1 = M('Agent_user');
        foreach ($order['list'] as $key => $val) {
            $order['list'][$key]['name'] = $this->getName($val['uid']);
            $order['list'][$key]['fid'] = $this->getName($db1->where('id ='.$val['uid'])->getField('fid'));
            $order['list'][$key]['tel'] = $db1->where('id ='.$val['uid'])->getField('tel');
            $order['list'][$key]['agent_level'] = $db1->where('id ='.$val['uid'])->getField('agent_level');
            $order['list'][$key]['recaddt'] = strlen($val['recadd'])>30?mb_substr($val['recadd'], 0, 10, 'utf-8').'……':$val['recadd'];
            if ($val['rec_pic_name']) {
                $pic = explode(',', $val['rec_pic_name']);
                $path = $val['rec_pic_path'];
                foreach ($pic as $k => $v) {
                    $url = $path.$v;
                    $order['list'][$key]['pic'] .= '<a href="'.$url.'">图'.$k.'</a>&nbsp;';
                }
            }
        }
        // echo '<pre>';var_dump($order);exit;
        $this->assign('order', $order['list']);
        $this->assign('order_count', $order['count']);
        $this->assign('page',$order['show']);

        $this->display();
    }

    /**
    *  订单详细页面
    */
    public function orderdetail(){
        $id = I('get.id');  //cost_id
        $db = M('');
        $detail = $db->table('ea_agent_user u, ea_agent_cost c')->where('c.id ='.$id.' and c.uid = u.id')->find();
        // echo '<pre>';var_dump($_SESSION);exit;
        $detail['fid'] = $this->getName($detail['fid']);
        $detail['sent_company'] = $this->getSentName($detail['sent_company']);
        $detail['operate_people'] = M('admin')->where('id = '.$detail['operate_people'])->getField('remark');
        if ($detail['rec_pic_name']) {
            $pic = explode(',', $detail['rec_pic_name']);
            $path = $detail['rec_pic_path'];
            foreach ($pic as $k => $v) {
                $url = $path.$v;
                $detail['pic'] .= '<a href="'.$url.'">图'.$k.'</a>&nbsp;';
            }
        }

        $this->assign('detail',$detail);
        $this->display();
    }

    //删除
    public function orderdel(){
        $id = I('get.id');
        $res = M('Agent_cost')->where('id = '.$id)->delete();
        if ($res) {
            $this->success('删除成功');
        }
    }

    //订单详情更新
    public function uporddet(){
        // var_dump($_GET);
        // echo '<pre>';var_dump($_POST);exit;
        $id = I('get.id');
        $cost['recman'] = I('post.recman');
        $cost['rectel'] = I('post.rectel');
        $cost['recadd'] = I('post.recadd');
        $cost['cost_money'] = I('post.money');
        $cost['four'] = I('post.four');
        $cost['five'] = I('post.five');
        $cost['six'] = I('post.six');
        $cost['sixp'] = I('post.sixp');
        $cost['freight_charge'] = I('post.charge');
        $cost['revenue_source'] = I('post.source');
        $cost['operate_people'] = $_SESSION['current_account']['id'];;
        $cost['note'] = I('post.note');
        if (empty($cost['recman'])||empty($cost['rectel'])||empty($cost['recadd'])) {
            $this->error('不能为空');
        }
        $level = M('Agent_cost')->where('id = '.$id)->getField('orderLevel');
        //计算返利
        if ($level == 1) {
            $cost['one_uid'] = M('Agent_user')->where('id = '.$cost['uid'].' and agent_level = 1')->getField('fid');
            if ($cost['one_uid'] == 0 || empty($cost['one_uid'])) {
                $cost['one_uid'] = $cost['one_level_rebate'] = $cost['two_uid'] = $cost['two_level_rebate'] = 0;
            }else{
                $cost['one_level_rebate'] = $cost['cost_money']*0.1;
                $cost['two_uid'] = M('Agent_user')->where('id = '.$cost['one_uid'].' and agent_level = 1')->getField('fid');
                if (!empty($cost['two_uid'])) {
                    $cost['two_level_rebate'] = $cost['cost_money']*0.05;
                }else{
                    $cost['two_uid'] = $cost['two_level_rebate'] = 0;
                }
            }
        }else{
            $cost['one_uid'] = M('Agent_user')->where('id = '.$cost['uid'].' and agent_level = '. $level)->getField('fid');
            if ($cost['one_uid'] == 0 || empty($cost['one_uid'])) {
                $cost['one_uid'] = $cost['one_level_rebate'] = 0;
            }else{
                $cost['one_level_rebate'] = $cost['cost_money']*0.1;
            }
        }
        
        $res = M('Agent_cost')->where('id ='.$id)->save($cost);
        // echo M()->getLastSql();exit;
        if ($res) {
            $this->successReturn('更新成功！');
        }
    }

    /**
    *  订单打印页面
    */
    public function orderPrint(){
        $orderPrint = M('Agent_cost')->where('id ='.I('get.id'))->find();
        // echo '<pre>';var_dump($orderPrint);exit;
        $this->assign('orderPrint', $orderPrint);
        $this->display();
    }

    /**
    *  代发货
    */
    public function sentfor(){
        $man = 'operate_people';
        $checkman = $this->getCheckMan($man);
        $db = M('Agent_cost');
        $order = 'create_time desc';
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $where = '`check` = 1 and `sent` = 0 '.$checkman;
        $order = $this->getPage($db, $where, $order, $page, 15);
        foreach ($order['list'] as $key => $val) {
            $order['list'][$key]['name'] = $this->getName($val['uid']);
        }
        // echo '<pre>';var_dump($order);exit;
        $this->assign('order', $order);
        $this->display();
    }

    //发货页
    public function sent(){
        $this->assign('id',I('get.id'));
        $express = M('sent')->where('status = 1')->select();

        $this->assign('sent', $express);
        $this->display();
    }

    //已发货
    public function sented(){
        $man = 'operate_people';
        $checkman = $this->getCheckMan($man);
        $db = M('Agent_cost');
        $order = 'create_time desc';
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $where = '`check` = 1 and `sent` = 1 '.$checkman;
        $order = $this->getPage($db, $where, $order, $page, 15);
        foreach ($order['list'] as $key => $value) {
            $order['list'][$key]['sent_company'] = $this->getSentName($value['sent_company']);
            $order['list'][$key]['name'] = $this->getName($value['uid']);
        }
        // echo '<pre>';var_dump($order);exit;
        $this->assign('order', $order);
        $this->display();
    }

    //发货
    public function sentcreate(){
        $id = I('get.id');
        $number = I('post.number');
        $company = I('post.company');
        if (empty($company)||empty($number)) {
            $this->error('不能为空');
        }
        $data['sent'] = 1;
        $data['sent_company'] = $company;
        $data['sent_number'] = $number;
        $res = M('Agent_cost')->where('id ='.$id)->save($data);
        // echo M()->getLastSql();exit;

        if ($res) {
            $this->success('添加成功', U('Order/search'));
        }
    }

    /*打印*/
    public function printr(){
        $this->success('敬请期待');
    }

    //检索页面
    public function search(){
        $admin = $this->getAdmin();
        // var_dump($admin);exit;  
        $this->assign('admin', $admin);
        $this->display();
    }

    //导出页面
    public function output(){
        $admin = $this->getAdmin();
        // var_dump($admin);exit;  
        $this->assign('admin', $admin);
        $this->display();
    }

    //搜索列表
    public function searchs(){
        // var_dump($_GET);
        // var_dump($_POST);exit;
        $people = I('get.people');
        $ordMan = I('get.ordMan');
        $recMan = I('get.recMan');
        $recTel = I('get.recTel');
        $recAdd = I('get.recAdd');
        $start = strtotime(I('get.timeStart'));
        $stop = strtotime(I('get.timeStop'));
        $check = I('get.check');
        $sent = I('get.sent');

        $where = $this->getWhere($people,$ordMan,$recMan,$recTel,$recAdd,$start,$stop,$check,$sent);
        // var_dump($where);exit;
        $db = M('Agent_cost');
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $order = '`create_time` desc, `check` desc, `sent` desc';

        $searchs = $this->getRetrieve($db, $where, $order, $page, 15);
        // echo '<pre>';var_dump($searchs);exit;
        $this->assign('searchs',$searchs);
        $this->display();
    }

    //数据导出Exl
    public function outputExl(){
        // var_dump($_GET);echo '<br />';
        // var_dump($_POST);echo '<br />';
        // var_dump($_REQUEST);exit;
        // $this->errorReturn('功能暂时无法使用');
        $people = I('get.people');
        $ordMan = I('get.ordMan');
        $recMan = I('get.recMan');
        $recTel = I('get.recTel');
        $recAdd = I('get.recAdd');
        $start = strtotime(I('get.timeStart'));
        $stop = strtotime(I('get.timeStop'));
        $check = I('get.check');
        $sent = I('get.sent');

        $where = $this->getWhere($people,$ordMan,$recMan,$recTel,$recAdd,$start,$stop,$check,$sent);
        // var_dump($where);exit;  
        $cost = M('Agent_cost')->where($where)->order('create_time desc')->select();
        // echo M()->getLastSql();
        // echo '<pre>';var_dump($cost);exit;
        if ($cost) {
            foreach ($cost as $key => $val) {
                $data[$key]['id'] = $val['id'];
                $data[$key]['name'] = $this->getName($val['uid']);
                $data[$key]['time'] = date('Y-m-d H:i', $val['create_time']);
                $data[$key]['recman'] = $val['recman'];
                $data[$key]['rectel'] = $val['rectel'];
                $data[$key]['recadd'] = $val['recadd'];
                // $data[$key]['num'] = $val['sixp'].'/'.$val['six'].'/'.$val['five'].'/'.$val['four'];
                $data[$key]['sixp'] = $val['sixp'];
                $data[$key]['six'] = $val['six'];
                $data[$key]['five'] = $val['five'];
                $data[$key]['four'] = $val['four'];
                $data[$key]['note'] = $val['note'];
            }
            $filename = date('YmdHis',time());
            vendor('PHPExcel');
            $excel = new \PHPExcel();
            $letter = array('A','B','C','D','E','F','G','H','I','J','K');
            $tableheader = array('id','下单人','下单时间','收件人','收件电话','收件地址','6p','6','5','4','备注');
            //填充表头信息
            for($i = 0;$i < count($tableheader);$i++) {
                $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
            }
            //填充表格信息
            for ($i = 2;$i <= count($data) + 1;$i++) {
                $j = 0;
                foreach ($data[$i - 2] as $key=>$value) {
                    $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
                    $j++;
                }
            }
            //创建Excel输入对象
            $write = new \PHPExcel_Writer_Excel5($excel);
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");;
            header("Content-Disposition:attachment;filename=".$filename.".xls");
            header("Content-Transfer-Encoding:binary");
            $write->save('php://output');
        }else{
            $this->error('没有查询到有效数据');
        }
    }

    public function getWhere($people,$ordMan,$recMan,$recTel,$recAdd,$start,$stop,$check,$sent){
        if (!empty($ordMan)) {
            $id = M('agent_user')->field('id')->where('`name` like "%'.$ordMan.'%"')->select();
            if ($id) {
                foreach ($id as $val) {
                    $ids[] = $val['id']; 
                }
                $ids = implode(',', $ids);
            }else{
                // echo 11111111111111111111111111111111;exit;
                return false;
            }
        }

        $people = !empty($people)?' `operate_people` = '.$people:'1';
        $recMan = !empty($recMan)?' and `recman` like "%'.$recMan.'%"':'';
        $recTel = !empty($recTel)?' and `rectel` like "%'.$recTel.'%"':'';
        $recAdd = !empty($recAdd)?' and `recadd` like "%'.$recAdd.'%"':'';
        $check  = ' and `check` = '.$check;
        $sent   = ' and `sent` = '.$sent;
        $ids    = !empty($ids)?' and `uid` in ('.$ids.')':'';
        if (empty($start)&&empty($stop)) {
            $time = '';
        }elseif (!empty($start)&&empty($stop)) {
            $time = ' and `create_time` >'.$start;
        }elseif (empty($start)&&!empty($stop)) {
            $time = ' and `create_time` <'.$stop;
        }elseif ($start&&$stop) {
            $time = ' and `create_time` between '.$start.' and '.$stop;
        }else{
            $time = '';
        }
        $where = $people.$ids.$recMan.$recTel.$recAdd.$check.$sent.$time;

        return $where;
    }

    public function getRetrieve($db, $where, $order, $page, $num){
        $searchs = $this->getPage($db, $where, $order, $page, $num);
        // echo M()->getLastSql();
        foreach ($searchs['list'] as $key => $val) {
            $searchs['list'][$key]['name'] = $this->getName($val['uid']);
            if ($val['rec_pic_name']) {
                $pic = explode(',', $val['rec_pic_name']);
                $path = $val['rec_pic_path'];
                foreach ($pic as $k => $v) {
                    $url = $path.$v;
                    $searchs['list'][$key]['pic'] .= '<a href="'.$url.'">图'.$k.'</a>&nbsp;';
                }
            }
        }

        return $searchs;
    }
}
