<?php
namespace Home\Controller;

/**
 * AgentController
 * 代理商管理
 * @author Qingkun Li
 */
class AgentController extends BaseController {

    /**
     * 代理商列表
     * @return
     */
    public function index() {
        $db = M('Agent_user');
        $order = 'create_time desc, ischeck asc';
        $where = 'ischeck = 1';
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $agent = $this->getPage($db, $where, $order ,$page,15);
        foreach ($agent['list'] as $key => $val) {
            $agent['list'][$key]['money'] = $this->getCost($val['id']);
            $agent['list'][$key]['fid'] = $this->getName($val['fid']);
            $agent['list'][$key]['time'] = $this->time_older_than($val['create_time']);
        }
        $count['one'] = $db->where('agent_level = 1')->count();
        $count['two'] = $db->where('agent_level = 2')->count();
        $count['three'] = $db->where('agent_level = 3')->count();
        $count['four'] = $db->where('agent_level = 4')->count();
        // echo '<pre>';var_dump($agent);exit;
        $this->assign('agent',$agent['list']);
        $this->assign('count',$count);
        $this->assign('page',$agent['show']);
        $this->display();
    }

    /**
     * 添加代理商
     * @return
     */
    public function add() {
        // echo '<pre>';var_dump($_SESSION);exit;
        $men = M('admin')->where('is_super = 0 and role_id = 2')->select();

        $this->assign('men', $men);
        $this->display();
    }

    /**
     * 添加代理商
     * @return
     */
    public function create() {
        // var_dump($_POST);exit;
        // $name = I('post.name');
        $agent['name']      = trim(I('post.name'));
        $agent['agent_level'] = intval(I('post.level'));
        $agent['checkman']  = I('post.people');
        $agent['tel']       = I('post.tel');
        $agent['wechat']    = I('post.wechat');
        $agent['address']   = trim(I('post.address'));
        $agent['idcode']    = trim(I('post.idcode'));
        $agent['fid']       = trim(I('post.fid'));
        $agent['fcheck']    = trim(I('post.fcheck'));
        $agent['note']      = I('post.note');
        $agent['create_time'] = time();
        $agent['telpwd']    = md5(substr($agent['tel'],5));

        $user = M('Agent_user');
        $where1 = 'tel = "'.$auth['tel'].'" and wechat = "'.$auth['wechat'].'"';
        $where2 = 'name like "%'.$auth['name'].'%" and tel = "'.$auth['tel'].'"';
        $where3 = 'name like "%'.$auth['tel'].'%" and wechat = "'.$auth['wechat'].'"';
        $similar = $user->where($where1.' or '.$where2.' or '.$where3)->find();
        if ($similar) {
            $this->error('用户已经存在！');
        }
        if ($agent['agent_level'] == 0) {
            $this->error('请选择代理级别');
        }
        if ($agent['checkman'] == 0) {
            $this->error('请选择对接人');
        }
        if (empty($agent['name'])||empty($agent['fid'])||empty($agent['idcode'])||empty($agent['tel'])||empty($agent['wechat'])||empty($agent['address'])) {
            return $this->error('必填项不能为空');
        }
        $fid = $user->where('name like "%'.$agent['fid'].'%" and (tel = "'.$agent['fcheck'].'" or wechat = "'.$agent['fcheck'].'")')->getField('id');
        if (!empty($fid) ){
            $agent['fid'] = $fid;
            $res = $user->add($agent);
            if ($res) {
                $this->success('添加成功',U('Agent/index'));
            }
        }else{
            if ($agent['fid'] == '公司') {
                $agent['fid'] = 0;
                $res = $user->add($agent);
                if ($res) {
                    $this->success('添加成功',U('Agent/index'));
                }
            }else{
                $this->error('上级填写错误或者上级不存在');
            }
        }
    }

    //代理商关系图
    public function tree(){
        $id = M('Agent_user')->where('agent_level = 1 and (fid = 0 or fid = 1)')->select();
        foreach ($id as $key => $val) {
            $id[$key]['under'] = M('Agent_user')->where('agent_level = 1 and fid = '.$val['id'])->select();
            foreach ($id[$key]['under'] as $k => $v) {
                $id[$key]['under'][$k]['fid'] = $this->getName($v['fid']);
                // $id[$key]['under']['fid'] = $this->getName($val['fid']);
            }
        }
        // echo '<pre>';var_dump($id);exit;

        $this->assign('id',$id);
        $this->display();
    }

    //授权审核列表
    public function check(){
        $db = M('Agent_user');
        $order = 'create_time desc';
        $where = 'ischeck = 0 '.$this->getCheckMan('checkman');
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $agent = $this->getPage($db, $where, $order ,$page,15);
        // echo M('')->getLastSql();exit;
        foreach ($agent['list'] as $key => $val) {
            $agent['list'][$key]['money'] = $this->getCost($val['id']);
            $agent['list'][$key]['fid'] = $this->getName($val['fid']);
            // $agent['list'][$key]['pic_name'] = explode(',', $val['pic_name']);
            // $agent['list'][$key]['pic_path'] = $val['pic_path'];
            if ($val['pic_name']) {
                $pic = explode(',', $val['pic_name']);
                $path = $val['pic_path'];
                foreach ($pic as $k => $v) {
                    $url = $path.$v;
                    $agent['list'][$key]['pic'] .= '<a href="'.$url.'">图'.$k.'</a>&nbsp;';
                }
            }
        }

        $this->assign('agent',$agent['list']);
        $this->assign('page',$agent['show']);
        $this->display();
    }

    //授权审核
    public function checkdeal(){
        $id = I('get.id');
        if (!$id) {
            $this->error('审核错误！');
        }
        $data['checkman'] = $_SESSION['current_account']['email'];
        $data['check_time'] = time();
        $data['ischeck'] = 1;
        $res = M('Agent_user')->where('id = '.$id)->save($data);
        if ($res) {
            $this->success('审核成功');
        }
    }

    //授权审核
    public function checknotdeal(){
        $id = I('get.id');
        if (!$id) {
            $this->error('参数错误！');
        }

        $res = M('Agent_user')->where('id = '.$id)->setField('ischeck', 2);
        if ($res) {
            $this->success();
        }
    }

    //取消/恢复授权
    public function cancelauth(){
        $id = I('get.id');
        $status = I('get.status');
        if (!$id) {
            $this->error('参数错误！');
        }
        $user = M('Agent_user');
        $res = $user->where('id = '.$id)->setField('cancelauth', $status);
        // $res1 = $user->where('id = '.$id)->setField('ischeck', 2);
        if ($res) {
            $this->successReturn('操作成功！');
        }
    }

    /**
     * 代理商消费
     */
    public function cost() {
        $id = I('get.id');
        if (!$id) {
            $this->error('参数错误',U('Agent/index'));
        }
        $cost['name'] = $this->getName($id);
        $cost['id'] = $id;

        $this->assign('cost', $cost);
        $this->display();
    }

    /**
     * 代理商消费
     */
    public function costcreate() {
        // echo '<pre>';
        // // var_dump($_GET);
        // // var_dump($_POST);exit;
        $cost['uid'] = I('get.id');
        $cost['recman'] = I('post.recman');
        $cost['rectel'] = I('post.rectel');
        $cost['recadd'] = I('post.recadd');
        $cost['cost_money'] = I('post.cost');
        $cost['four'] = intval(I('post.four'));
        $cost['five'] = intval(I('post.five'));
        $cost['six'] = intval(I('post.six'));
        $cost['sixp'] = intval(I('post.sixp'));
        $cost['freight_charge'] = I('post.charge');
        $cost['revenue_source'] = I('post.source');
        // $cost['operate_people'] = I('post.people');
        $cost['operate_people'] = $_SESSION['current_account']['id'];;
        $cost['note'] = I('post.note');
        $cost['create_time'] = time();
        // $cost['check'] = 1;
        // $cost['sent'] = 1;

        if (empty($cost['recman'])||empty($cost['rectel'])||empty($cost['recadd'])) {
            $this->error('必填项不能为空');
        }
        $level = M('Agent_user')->where('id = '.$cost['uid'])->getField('agent_level');
        $cost['orderLevel'] = $level;
        //计算返利
        if ($level == 1) {
            $cost['one_uid'] = M('Agent_user')->where('id = '.$cost['uid'].' and agent_level = 1')->getField('fid');
            if ($cost['one_uid'] == 0 || empty($cost['one_uid'])) {
                $cost['one_uid'] = $cost['one_level_rebate'] = $cost['two_uid'] = $cost['two_level_rebate'] = 0;
            }else{
        $cost_money = ($order['four']+$order['five']+$order['six']+$order['sixp'])*10;
        $order['cost_money'] = $cost_money;
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
        
        $res = M('Agent_cost')->add($cost);
        // echo M('Agent_cost')->getLastSql();exit;
        // var_dump($res);exit;
        if ($res) {
            $this->success('Add success'/*,U('Agent/order')*/);
        }
    }

    /**
     * 代理商详细信息
     */
    public function detail() {
        $id = I('get.id');
        // if (!$id) {
        //     $this->error('参数错误',U('Agent/index'));
        // }
        $user = M('Agent_user');
        $cost = M('Agent_cost');
        $edit = $user->where('id ='.$id)->find();
        $edit['fname'] = $this->getName($edit['fid']);
        $edit['cost'] = $this->getCost($id);
        $edit['time'] = time();
        $edit['people'] = M('admin')->where('id ='.$edit['checkman'])->getField('remark');
        //代理商收入
        if ($edit['agent_level']==1) {
            //查询一级树返佣
            $one_money = $cost->where('one_uid ='.$id.' and sent = 1 and clear = 0')->sum('one_level_rebate');
            //查询二级树返佣
            $two_money = $cost->where('two_uid = '.$id.' and sent = 1 and clear = 0')->sum('two_level_rebate');
            $edit['revenue_money'] = $one_money+$two_money;
        }else{
            $edit['revenue_money'] = $cost->where('one_uid ='.$id.' and sent = 1 and clear = 0')->sum('one_level_rebate');
        }
        $ids = $user->field('id')->where('fid ='.$id)->select();
        foreach ($ids as $key => $val) {
            $id = $user->where('id ='.$val['id'])->getField('agent_level');
            switch ($id) {
                case '1':
                    $edit['one']++;
                    break;
                case '2':
                    $edit['two']++;
                    break;
                case '3':
                    $edit['three']++;
                    break;
                case '4':
                    $edit['four']++;
                    break;
            }
        }
        // echo '<pre>';var_dump($edit);exit;
        $this->assign('edit', $edit);
        $this->display();
    }

    //消费详细页面
    public function costinfo(){
        // var_dump($_GET);exit;
        $id = I('get.id');
        $userinfo = M('Agent_user')->field('id, name, agent_level, fid')->where('id ='.$id)->find();
        // $userinfo['id'] = $id;
        //姓名/消费
        $userinfo['fname'] = $this->getName($userinfo['fid']);
        $userinfo['cost_money'] = $this->getCost($id);
        //组装消费记录
        $db = M('Agent_cost');
        $where = 'uid ='.$id;
        $order =  'create_time desc';
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $consume = $this->getPage($db, $where, $order, $page, $num=15);
        foreach ($consume['list'] as $k => $v) {
            $userinfo['consume'] .= date('Y-m-d H:i', $v['create_time']).'--消费￥：'.$v['cost_money'].'--拿货数量.4/4s:'.$v['four'].'，5/5s:'.$v['four'].'，6/6s:'.$v['six'].'，6p/6ps:'.$v['sixp'].'<br />';
        }

        $this->assign('page', $consume['show']);
        $this->assign('info', $userinfo);
        $this->display();
    }

    //收入来源
    public function consumedetail(){
        $id = I('get.id');
        $info = $this->getInfo($id);
        $info['superior'] = $this->getName($info['superior']);
        $page = (isset($_GET['p']) ? $_GET['p'] : 1).',15';
        $user = M('Agent_user');
        $cost = M('Agent_cost');
        if ($info['agent_level'] == 1) {
            $where = 'one_uid ='.$id.' or two_uid = '.$id.' and sent = 1 and clear = 0';
            $res = $cost->field('uid, cost_money, one_uid, one_level_rebate, two_uid, two_level_rebate, create_time')->where($where)->order('create_time desc')->page($page)->select();
            foreach ($res as $v) {
                if ($v['one_uid'] == $id) {
                    $consumeinfo .= date('Y-m-d H:i', $v['create_time']).'--代理'.$this->getName($v['uid']).'消费'.$v['cost_money'].'元，收入'.$v['one_level_rebate'].'元。<br />';
                }else{
                    $fid = $user->where('id ='.$v['uid'])->getField('fid');
                    $consumeinfo .= date('Y-m-d H:i', $v['create_time']).'--代理'.$this->getName($fid).'邀请代理'.$this->getName($v['uid']).'消费'.$v['cost_money'].'元，收入'.$v['two_level_rebate'].'元。<br />';
                }
            }
        }else{
            $where = 'one_uid ='.$id.' and sent = 1 and clear = 0';
            $res = $cost->field('uid, cost_money, one_level_rebate')->where($where)->order('create_time desc')->page($page)->select();
            foreach ($res as $v) {
                $consumeinfo .= date('Y-m-d H:i', $v['create_time']).'--代理'.$this->getName($v['uid']).'消费'.$v['cost_money'].'元，收入'.$v['one_level_rebate'].'元。<br />';
            }
        }
        $count  = $cost->where($where)->count();
        $Page   = new \Think\Page($count,15);
        $show   = $Page->show(); 
        // var_dump($consumeinfo);exit;
        $this->assign('info', $info);
        $this->assign('page', $show);
        $this->assign('consume', $consumeinfo);
        $this->display();
    }
    
    //代理商升级
    public function upgrade() {
        // $name = isset(I('post.username'))?I('post.username'):'';
        $db = M('Agent_upgrade');
        $order = 'up_time asc';
        // if ($name) {
        //     $where = 'status = 0 and ';
        // }
        $where = 'status = 0 '.$this->getCheckMan('checkman');
        $page = (isset($_GET['p'])?$_GET['p']:1).',15';
        $upgrade = $this->getPage($db, $where, $order ,$page,15);
        foreach ($upgrade['list'] as $key => $val) {
            $upgrade['list'][$key]['name'] = $this->getName($val['uid']);
            if ($val['pic_name']) {
                $pic = explode(',', $val['pic_name']);
                $path = $val['pic_path'];
                foreach ($pic as $k => $v) {
                    $url = $path.$v;
                    $upgrade['list'][$key]['pic'] .= '<a href="'.$url.'">图'.$k.'</a>&nbsp;';
                }
            }
        }

        $this->assign('lists', $upgrade);
        $this->display();
    }

    /**
     * 代理商升级操作
     */
    public function upgradeDeal(){
        $id = I('get.id');
        $uid = I('get.uid');
        $level = I('get.level');
        if (!$id) {
            $this->error('参数错误！');
        }
        $data['check_man'] = $_SESSION['current_account']['id'];
        $data['status'] = I('get.status');
        if ($data['status'] == 2) {
            $res = M('Agent_upgrade')->where('id ='.$id)->save($data);
            if ($res) {
                $this->success('操作成功！');
            }
        }else{
            $res = M('Agent_user')->where('id = '.$uid)->setField('agent_level', $level);
            $res1 = M('Agent_upgrade')->where('id ='.$id)->save($data);
            if ($res&&$res1) {
                $this->success('操作成功！');
            }
        }
    }

    /**
     * 代理商升级
     */
    public function edit() {
        $id = I('get.id');
        // if (!$id) {
        //     $this->error('参数错误',U('Agent/index'));
        // }
        $user = M('Agent_user');
        $edit = $user->where('id ='.$id)->find();
        $edit['fid'] = $this->getName($edit['fid']);
        $edit['people'] = $this->getAdmin();

        $this->assign('edit', $edit);
        $this->display();
    }

    /**
     * 更新
     */
    public function update() {
        $id = I('get.id');
        $agent['name']  = I('post.name');
        $agent['checkman']  = I('post.people');
        $agent['agent_level'] = intval(I('post.level'));
        $agent['tel']       = I('post.tel');
        $agent['wechat']    = I('post.wechat');
        $agent['address']   = I('post.address');
        $agent['idcode']    = I('post.idcode');
        $agent['note']      = I('post.note');

        if (empty($agent['idcode'])||empty($agent['tel'])||empty($agent['wechat'])||empty($agent['address'])) {
            return $this->error('必填项不能为空');
        }
        // if(!preg_match("/^1[358]{1}[0-9]{1}[0-9]{8}$|17[07]{1}[0-9]{8}$|147[0-9]{8}$/",$agent['tel'])){    
        //     $this->error('手机号码格式不对');
        // } ;
        $res = M('Agent_user')->where('id = '.$id)->save($agent);

        if ($res) {
            $this->success('更新成功',U('Agent/index'));
        }
    }

    /**
     * 删除代理商
     */
    public function del() {
        $id = I('id');
        $res = M('Agent_user')->where('id ='.$id)->delete();
        if ($res) {
            $this->success('删除成功！', U('Agent/index'));
        }else{
            $this->error('删除失败！', U('Agent/index'));
        }
    }
    
    /**
    *  搜索列表
    *
    */
    public function searchs(){
        $name = trim(I('get.username'));
        $hanzi  = preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $name);
        // $phone  = preg_match('/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[6789]{1}[0-9]{8}$|17[07]{1}[0-9]{8}/',$name);
        // $wechat = preg_match('/^[0-9a-zA-Z_-]+$/',$name);
        // var_dump($name);exit;
        if ($hanzi) {
            $where = 'name like "%'.$name.'%"';
        // }elseif($phone||$wechat){
        }else{
            $where = 'tel like "%'.$name.'%" or wechat like "%'.$name.'%"';
        }
        $db = M('Agent_user');
        $page = (isset($_GET['p'])?$_GET['p']:1).',10';
        $order = 'create_time desc, ischeck desc';
        $searchs = $this->getPage($db, $where, $order, $page);
        foreach ($searchs['list'] as $key => $val) {
            $searchs['list'][$key]['money'] = $this->getCost($val['id']);
            $searchs['list'][$key]['fname'] = $this->getName($val['fid']);
            if ($val['pic_name']) {
                $pic = explode(',', $val['pic_name']);
                $path = $val['pic_path'];
                foreach ($pic as $k => $v) {
                    $url = $path.$v;
                    $searchs['list'][$key]['pic'] .= '<a href="'.$url.'">图'.$k.'</a>&nbsp;';
                }
            }
        }

        $this->assign('searchs',$searchs);
        $this->display();
    }
    

    //结算
    public function clearzero(){
        $clear['uid'] = I('get.id');
        $clear['money'] = I('get.money');
        $clear['create_time'] = time();
        $res = M('Agent_clear')->add($clear);
        $res1 = M('Agent_cost')->where('one_uid = '.$clear['uid'].' or two_uid ='.$clear['uid'].' and sent = 1')->setField('clear',1);
        // echo M()->getLastSql();exit;
        if ($res&&$res1) {
            $this->success('结算成功！', U('Agent/detail', array('id'=>$clear['uid'])));
        }
    }

    //下属代理商列表
    public function underagent(){
        $id = I('get.id');
        $level = I('get.level');
        $count = I('get.count');
        $page = (isset($_GET['p']) ? $_GET['p'] : 1).',15';
        $info = $this->getInfo($id);
        $info['fid'] = $this->getName($info['fid']);
        $info['level'] = $level;
        $info['count'] = $count;
        $user = M('Agent_user');
        $where = 'fid = '.$id.' and agent_level = '.$level;
        $order = 'create_time desc';

        $agent = $this->getPage($user, $where, $order, $page, 15);
        // echo '<pre>';var_dump($agent);exit;

        $this->assign('info', $info);
        $this->assign('agent', $agent);
        $this->assign('page', $show);
        $this->display();
    }
    
}
