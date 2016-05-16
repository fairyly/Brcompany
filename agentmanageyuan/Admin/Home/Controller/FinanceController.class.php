<?php
namespace Home\Controller;

/**
 * FinanceController
 * 财务管理
 * @author Qingkun Li 
 */
class FinanceController extends BaseController {
    
    public function index() {
        $daystart = strtotime(date("Y-m-d"));
        $daystop = strtotime(date("Y-m-d"))+86400-1;
        $dayprevstart = $daystart-86400;
        $dayprevstop = $daystart-1;
        $weekstart = strtotime(date("Y-m-d"))-6*86400;
        $weekstop = strtotime(date("Y-m-d"))+86400-1;
        $weekprevstart = strtotime(date("Y-m-d"))-2*6*86400-86400;
        $weekprevstop = strtotime(date("Y-m-d"))-6*86400-1;
        $monthstart = strtotime(date("Y-m-01"));
        $monthstop = strtotime(date('Y-m-01')." +1 month -1 day")+86400-1;
        $monthprevstart = strtotime(date('Y-m-01')." -1 month");
        $monthprevstop = strtotime(date("Y-m-01"))-1;
        //日报表
        $day['data'] = $this->getOrderData($daystart, $daystop, $dayprevstart, $dayprevstop);
        $day['time'] = date('Y-m-d H:i:s',$daystart).'~'.date('Y-m-d H:i:s',$daystop);
        //周报表
        $week['data'] = $this->getOrderData($weekstart, $weekstop, $weekprevstart, $weekprevstop);
        $week['time'] = date('Y-m-d H:i:s',$weekstart).'~'.date('Y-m-d H:i:s',$weekstop);
        //月报表
        $month['data'] = $this->getOrderData($monthstart, $monthstop, $monthprevstart, $monthprevstop);
        $month['time'] = date('Y-m-d H:i:s',$monthstart).'~'.date('Y-m-d H:i:s',$monthstop);

        $this->assign('day',$day);
        $this->assign('week',$week);
        $this->assign('month',$month);
        $this->display();
    }

    // //订单报表
    // public function order() {
    //     $daystart = strtotime(date("Y-m-d"));
    //     $daystop = strtotime(date("Y-m-d"))+86400-1;
    //     $dayprevstart = $daystart-86400;
    //     $dayprevstop = $daystart-1;
    //     $weekstart = strtotime(date("Y-m-d"))-6*86400;
    //     $weekstop = strtotime(date("Y-m-d"))+86400-1;
    //     $weekprevstart = strtotime(date("Y-m-d"))-2*6*86400-86400;
    //     $weekprevstop = strtotime(date("Y-m-d"))-6*86400-1;
    //     $monthstart = strtotime(date("Y-m-01"));
    //     $monthstop = strtotime(date('Y-m-01')." +1 month -1 day")+86400-1;
    //     $monthprevstart = strtotime(date('Y-m-01')." -1 month");
    //     $monthprevstop = strtotime(date("Y-m-01"))-1;
    //     //日报表
    //     $day['data'] = $this->getOrderData($daystart, $daystop, $dayprevstart, $dayprevstop);
    //     $day['time'] = date('Y-m-d H:i:s',$daystart).'~'.date('Y-m-d H:i:s',$daystop);
    //     //周报表
    //     $week['data'] = $this->getOrderData($weekstart, $weekstop, $weekprevstart, $weekprevstop);
    //     $week['time'] = date('Y-m-d H:i:s',$weekstart).'~'.date('Y-m-d H:i:s',$weekstop);
    //     //月报表
    //     $month['data'] = $this->getOrderData($monthstart, $monthstop, $monthprevstart, $monthprevstop);
    //     $month['time'] = date('Y-m-d H:i:s',$monthstart).'~'.date('Y-m-d H:i:s',$monthstop);

    //     $this->assign('day',$day);
    //     $this->assign('week',$week);
    //     $this->assign('month',$month);
    //     $this->display();
    // }

    //个人订单报表详页
    public function detail() {
        $id = I('get.id');
        $start = I('get.start');
        $stop = I('get.stop');
        $type = $stop-$start;
        if ($type>0 && $type<=86400) {
            $type = '日';
            $prevstart = $start-86400;
            $prevstop = $start-1;
        }elseif ($type>86400 && $type<=604799) {
            $type = '周';
            $prevstart = $stop-2*7*86400+1;
            $prevstop = $stop-7*86400;
        }else{
            $type = '月';
            $prevstart = strtotime(date('Y-m-01', $start)." -1 month");
            $prevstop = strtotime(date('Y-m-01'), $start)-1;
        }
        if (empty($id)) {
            $count = $this->getAllOrderCount($start, $stop);
            $countprev = $this->getAllOrderCount($prevstart, $prevstop);
            $count['name'] = '总'.$type;
        }else{
            $count = $this->getOrderCount($start, $stop, $id);
            $countprev = $this->getOrderCount($prevstart, $prevstop, $id);
            $count['name'] = $this->getAdmin($id).$type;
            $detail = $this->getOrderDetail($start, $stop ,$id);
            // $db = M('Agent_cost');
            // $page = (isset($_GET['p'])?$_GET['p']:1).',20';
            // $order = 'create_time desc';
            // $where = 'create_time between '.$start.' and '. $stop.' and operate_people ='.$id;
            // $detail = $this->getPage($db, $where, $order, $page, 20);
            // foreach ($detail['list'] as $key => $val) {
            //     $detail['list'][$key]['name'] = $this->getName($val['uid']);
            //     $detail['list'][$key]['check'] = $val['check'] == 1?'<font color="green">已审核</font>':'<font color="red">未审核</font>';
            // }
        }
        $count['time'] = date('Y-m-d H:i:s', $start).'~'.date('Y-m-d H:i:s', $stop); 
        $count['cycletime'] = date('Y-m-d H:i:s', $prevstart).'~'.date('Y-m-d H:i:s', $prevstop);
        $count['incomeCycleRatio'] = $this->getRatio($count['money'], $countprev['money']);
        $count['countCycleRatio'] = $this->getRatio($count['count'], $countprev['count']);
        $count['sixpCycle'] = $this->getRatio($count['sixp'], $countprev['sixp']);
        $count['sixCycle']  = $this->getRatio($count['six'], $countprev['six']);
        $count['fiveCycle'] = $this->getRatio($count['five'], $countprev['five']);
        $count['fourCycle'] = $this->getRatio($count['four'], $countprev['four']);
        // echo '<pre>';var_dump($count);exit;
        $this->assign('count', $count);
        $this->assign('detail', $detail);
        $this->display();
    }

    //报表检索页
    public function search(){
        $admin = $this->getAdmin();

        $this->assign('admin', $admin);
        $this->display();
    }

    //报表检索信息页
    public function searchs(){
        // var_dump($_GET);
        $id = I('get.people');
        $start = strtotime(str_replace('+','',I('get.timeStart')));
        $stop = strtotime(str_replace('+','',I('get.timeStop')));
        $stop = empty($stop)?time():$stop;
        // var_dump($start,$stop);exit;
        $count = $this->getOrderCount($start, $stop, $id);
        $count['name'] = empty($id)?'总':$this->getAdmin($id);
        $count['time'] = date('Y-m-d H:i:s', $start).'~'.date('Y-m-d H:i:s', $stop);
        $detail = $this->getOrderDetail($start, $stop, $id);

        $this->assign('detail', $detail);
        $this->assign('count', $count);
        $this->display();
    }

    //获取订单数据
    public function getOrderData($start, $stop, $prevstart, $prevstop){
        //总量数据
        $all = $this->getAllOrderCount($start, $stop);
        $allprev = $this->getAllOrderCount($prevstart, $prevstop);
        // //环比incomeCycleRatio 同比orderYearRatio
        $all['incomeCycleRatio'] = $this->getRatio($all['money'], $allprev['money']);
        $all['countCycleRatio'] = $this->getRatio($all['count'], $allprev['count']);
        $table = '<tr bgcolor="#ccc">
                    <td><a href='.U('Finance/detail',array('start'=>$start, 'stop'=>$stop)).'>'.总量.'</a></td>
                    <td>'.$all['money'].'</td>
                    <td>'.$all['incomeCycleRatio'].'</td>
                    <td>0</td>
                    <td>'.$all['count'].'</td>
                    <td>'.$all['countCycleRatio'].'</td>
                    <td>0</td>
                    <td>'.$all['sixp'].'</td>
                    <td>'.$all['six'].'</td>
                    <td>'.$all['five'].'</td>
                    <td>'.$all['four'].'</td>
                </tr>';
        //各个客服量数据
        $admin = $this->getAdmin();
        foreach ($admin as $key => $val) {
            $admin[$key]['day'] = $this->getOrderCount($start, $stop, $val['id']);
            $prev[$key] = $this->getOrderCount($prevstart, $prevstop, $val['id']);
            $admin[$key]['day']['incomeCycleRatio'] = $this->getRatio($admin[$key]['day']['money'], $prev[$key]['money']);
            $admin[$key]['day']['countCycleRatio'] = $this->getRatio($admin[$key]['day']['count'], $prev[$key]['count']);
        }
        foreach ($admin as $k => $v) {
            $style = (($k%2)==0)?'':'bgcolor="#ccc"';
            $table .= '<tr '. $style .'>
                    <td><a href='.U('Finance/detail',array('id'=>$v['id'], 'start'=>$start, 'stop'=>$stop)).'>'.$v['remark'].'</a></td>
                    <td>'.$v['day']['money'].'</td>
                    <td>'.$v['day']['incomeCycleRatio'].'</td>
                    <td>0</td>
                    <td>'.$v['day']['count'].'</td>
                    <td>'.$v['day']['countCycleRatio'].'</td>
                    <td>0</td>
                    <td>'.$v['day']['sixp'].'</td>
                    <td>'.$v['day']['six'].'</td>
                    <td>'.$v['day']['five'].'</td>
                    <td>'.$v['day']['four'].'</td>
                </tr>';
        }

        return $table;
    }

    //获取订单统计
    public function getOrderCount($start, $stop, $people){
        $people = empty($people)? :' and operate_people ='.$people;
        $field = 'count(*) as count,sum(cost_money) as money,sum(sixp) as sixp,sum(six) as six,sum(five) as five,sum(four) as four';
        $where = 'create_time between '.$start.' and '. $stop.$people;
        $getOrderCount = M('Agent_cost')->field($field)->where($where)->find();
        // echo M()->getLastSql();
        // echo '<pre>';var_dump($getOrderCount);exit;
        return $getOrderCount;
    }

    //获取总订单统计
    public function getAllOrderCount($start, $stop){
        $time = $this->getTimeZone($start, $stop);
        $field = 'count(*) as count,sum(cost_money) as money,sum(sixp) as sixp,sum(six) as six,sum(five) as five,sum(four) as four';
        $where = 'create_time between '.$start.' and '. $stop;
        $getAllOrderCount = M('Agent_cost')->field($field)->where($where)->find();

        return $getAllOrderCount;
    }

    //获取订单统计明细
    public function getOrderDetail($start, $stop, $id){
        $time = $this->getTimeZone($start, $stop);
        $id = empty($id)?:'operate_people ='.$id;
        $db = M('Agent_cost');
        $page = (isset($_GET['p'])?$_GET['p']:1).',20';
        $order = 'create_time desc';
        $where = $id.$time;
        $getOrderDetail = $this->getPage($db, $where, $order, $page, 20);
        foreach ($getOrderDetail['list'] as $key => $val) {
            $getOrderDetail['list'][$key]['name'] = $this->getName($val['uid']);
            $getOrderDetail['list'][$key]['check'] = $val['check'] == 1?'<font color="green">已审核</font>':'<font color="red">未审核</font>';
        }

        return $getOrderDetail;
    }

    //获取时间区间
    public function getTimeZone($start, $stop){
        if (empty($start)&&empty($stop)) {
            $getTimeZone = '';
        }elseif (!empty($start)&&empty($stop)) {
            $getTimeZone = ' and `create_time` >'.$start;
        }elseif (empty($start)&&!empty($stop)) {
            $getTimeZone = ' and `create_time` <'.$stop;
        }elseif ($start&&$stop) {
            $getTimeZone = ' and `create_time` between '.$start.' and '.$stop;
        }else{
            $getTimeZone = '';
        }

        return $getTimeZone;
    }

    //获取比率
    public function getRatio($now, $prev){
        $getRatio = (($now-$prev)/$prev)*100;
        $getRatio = is_float($getRatio) ? number_format($getRatio,2).'%' : $getRatio.'%' ;

        return $getRatio;
    }
}