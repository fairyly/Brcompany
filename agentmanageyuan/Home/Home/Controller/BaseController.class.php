<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    //初始化网站数据--微信授权入口
    // public function _initialize(){
    // //如果存在重新获取以下基本信息--强制关注用此方法
    //     //session_destroy();
    //     //$_SESSION['user']['openid']='oRCB7johaZnlJIsMUf0maZmwkoCM';
    //     $openid=session('openid');
    //     //微信授权
    //     if(!isset($_SESSION['openid'])||$openid==''){
    //         //暂时不用该功能
    //         //$this->get_access_token();
    //         // $api=M('weixin')->find();
    //         // $APPID=$api['appid'];
    //         $APPID = 'wxdcb7d6589a4ab06d';
    //         // $REDIRECT_URI='http://'.$_SERVER['HTTP_HOST'].'/index.php?m=oauth&a=index';
    //         $REDIRECT_URI='http://'.$_SERVER['HTTP_HOST'].'/agentmanage/index.php/Home/Index/index.html';
    //         // $scope='snsapi_base';
    //         $scope='snsapi_userinfo';//需要授权
    //         $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$APPID.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.$scope.'&state=123'.$state.'#wechat_redirect';
    //         $_SESSION['url']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    //         header("Location:".$url);
    //     } 
    // }
    //获取基本信息
    protected function getInfo($where){
        $info = M('Agent_user')->field('id, name, fid, agent_level, tel ,wechat')->where($where)->find();
        return $info;
    }

    //检查权限
    protected function getCheck($id){
        $info = M('Agent_user')->field('fid, agent_level')->where('id = '.$id)->find();
        if ($info['fid'] == 0 || $info['agent_level'] == 1) {
            return true;
        }
        return false;
    }

    //获取基本信息
    protected function getLevel($level){
        switch ($level) {
            case '1':
                $level = '总代理'; 
                break;
            case '2':
                $level = '一级代理'; 
                break;
            case '3':
                $level = '二级代理'; 
                break;
            case '4':
                $level = '特约代理'; 
                break;
        }
        return $level;
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
    protected function getAdmin(){
            $admin = M('admin')->field('id, remark')->where('role_id = 2')->select();
            return $admin;
    }

    /**
     * 生成验证码
     * @param  array  $config
     * @return
     */
    function create_verify_code(array $config) {
        $Verify = new \Think\Verify($config);
        return $Verify->entry();
    }

    /**
     * 检查验证码
     * @param  string $code
     * @param  int $verify_code_id
     * @return boolean
     */
    function check_verify_code($code, $verify_code_id = '') {
        $Verify = new \Think\Verify();
        return $Verify->check($code, $verify_code_id);
    }

    /**
     * { status : true, info: $info}
     * @param  string $info
     * @param  string $url
     * @return
     */
    protected function successReturn($info, $url) {
        $this->resultReturn(true, $info, $url);
    }

    /**
     * { status : false, info: $info}
     * @param  string $info
     * @param  string $url
     * @return
     */
    protected function errorReturn($info, $url) {
        $this->resultReturn(false, $info, $url);
    }

    /**
     * 返回带有status、info键值的json数据
     * @param  boolean $status
     * @param  string $info
     * @param  string $url
     * @return
     */
    protected function resultReturn($status, $info, $url) {
        $json['status'] = $status;
        $json['info'] = $info;
        $json['url'] = isset($url) ? $url : '';

        return $this->ajaxReturn($json);
    }

    public function post_data($url, $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    function getIPaddress()
    {
        $IPaddress='';
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
        return $IPaddress;
    }
}