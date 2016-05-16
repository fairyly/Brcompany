<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        //微信授权
        // $appid = 'wxdcb7d6589a4ab06d';  
        // $secret = 'd4624c36b6795d1d99dcf0547af5443d';
        // $code = $_GET["code"];
        // $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
        // $json_obj=$this->post_data($get_token_url);
        // $json_obj = json_decode($json_obj,true);
        // //第二步 根据openid和access_token查询用户信息--不强制关注用此方法
        // $access_token = $json_obj['access_token'];
        // $openid = $json_obj['openid'];  
        // $get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid;  
        // $res_user_info=$this->post_data($get_user_info_url);
        // $res_user_info = json_decode($res_user_info,true);
        // $openid=$res_user_info['openid'];
        // session('openid',$openid);

        $this->display();
    }

    public function seccode(){
        $this->display();
    }

    //防伪查询页
    public function security(){
        $this->display();
    }

    //防伪查询
    public function seccheck(){
        $seccode = addslashes(trim(I('post.num')));
        $ip = $this->getIPaddress();
        $time = $_SERVER['REQUEST_TIME'];
        // var_dump($seccode);
        // var_dump($ip);exit;
        $res = M('Seccode')->where('seccode = "'.$seccode.'"')->find();
        if ($res) {
            $data['check_count'] = $res['check_count'] + 1;
            $data['ip'] = empty($res['ip']) ? $ip : $res['ip'].','.$ip ;
            $data['time'] = empty($res['time']) ? $time : $res['time'].','.$time ;
            if ($data['check_count'] <= 3) {
                $check = M('Seccode')->where('id = '.$res['id'])->save($data);
                $info['status'] = 1;
                $info['info'] = '该商品已经被查询过，本次是第'.$data['check_count'].'次查询，谨防假冒!';
            }else{
                $info['status'] = 2;
                $info['info'] = '您查询的防伪码已失效！';
            }
        }else{
            $info['status'] = 0;
            $info['info'] = '您输入的防伪码不存在，谨防假冒!';
        }
        // $info = json_encode($info);
        // var_dump($info);exit;
        //return $info;
         $this->ajaxReturn($info); 
         // var_dump($secode);exit;
        // $this->display();
    }


    //登录
    public function login(){
        if ($_SESSION['userInfo']) {
            $this->redirect('User/index', array('id'=>$info['id']));
        }else{
            $this->display();
        }
    }

    //授权查询
    public function check(){
    	$Phonewechat = addslashes(I('post.number', trim()));
        if (!$this->check_verify_code(I('post.vcode'))) {
            return $this->error('验证码不正确！');
        }
    	$phone = preg_match("/^1[358]{1}[0-9]{1}[0-9]{8}$|17[0678]{1}[0-9]{8}$|147[0-9]{8}$/",$Phonewechat);
        $wechat = preg_match("/^[0-9a-zA-Z_-]+$/",$Phonewechat);
        if($phone || $wechat){
    		$res = M('Agent_user')->field('name, agent_level, tel, wechat, create_time')->where('(tel = "'.$Phonewechat.'" or wechat ="'.$Phonewechat.'") and ischeck = 1 and cancelauth = 0')->find();
            // echo M()->getLastSql();exit;
            if ($res) {
                $starttime = $res['create_time'];
                $date = date('Y',$starttime) + 1 . '-' . date('m-d H:i:s', $starttime);//一年后日期
                $stoptime = strtotime($date);
                $dirname = dirname(__FILE__).'/outhpic/';
                $ttf = $dirname.'msyh.ttf';
                import('Think.Image');
                switch ($res['agent_level']) {
                    case '1':
                        $image = $dirname.'quanguo.jpg';
                        break;
                    case '2':
                        $image = $dirname.'yiji.jpg';
                        break;
                    case '3':
                        $image = $dirname.'erji.jpg';
                        break;
                    case '4':
                        $image = $dirname.'teyue.jpg';
                        break;
                }
                $image1 = $dirname.'seal.png';
                $img = imagecreatefromjpeg($image);
                $seal = imagecreatefrompng($image1);
                $namecolor = imagecolorallocate($img,18,50,107);
                $datecolor = imagecolorallocate($img,196,144,74);
                $pattern = '/[0-9]/u';
                $res['name'] = preg_replace($pattern, '', $res['name']);
                // $res['name'] = '夏依旦木·吾买尔江';
                // var_dump(strlen('夏依旦木'));exit;
                // if(strlen($res['name']) <= 6){                                      //姓名为两个字
                //     imagettftext($img,18,0,280,400,$namecolor,$ttf,'[ '.$res['name'].' ]');
                // }elseif (strlen($res['name']) > 6 && strlen($res['name']) <= 9) {     //三个字
                //     imagettftext($img,18,0,270,400,$namecolor,$ttf,'[ '.$res['name'].' ]');
                // }elseif (strlen($res['name']) > 9 && strlen($res['name']) <= 12) {    //姓名为四个字
                //     imagettftext($img,18,0,258,400,$namecolor,$ttf,'[ '.$res['name'].' ]');
                // }else{                                                              //超过四+
                //     imagettftext($img,18,0,205,400,$namecolor,$ttf,'[ '.$res['name'].' ]');
                // }
                $lenth = strlen($res['name']);
                $step = $lenth/3;                       
                imagettftext($img,18,0,300-($step*10),400,$namecolor,$ttf,'[ '.$res['name'].' ]');
                // imagettftext($img,18,0,270,406,$namecolor,$ttf,'[ 黄章玉 ]');
                imagettftext($img,16,0,215,436,$namecolor,$ttf,'手机号：'.$res['tel']);
                imagettftext($img,16,0,215,468,$namecolor,$ttf,'微信号：'.$res['wechat']);
                imagettftext($img,12,0,318,780,$datecolor,$ttf,'授权时间：'.date('Y',$starttime).' 年 '.date('m',$starttime).' 月 '.date('d',$starttime).' 日至');
                imagettftext($img,12,0,398,800,$datecolor,$ttf, date('Y',$stoptime).' 年 '.date('m',$stoptime).' 月 '.date('d',$stoptime).' 日止');
                imagecopyresampled($img,$seal,404,709,0,0,'140','140','140','140');
                // imagejpeg($img, './data/oauth/'.time().'.jpg');
                imagejpeg($img, './data/oauth/'.$res['tel'].'.jpg');

                $this->assign('url', __ROOT__.'/data/oauth/'.$res['tel'].'.jpg');
                $this->display();
            }else{
                $this->display("error");
            }
    	}else{
            $this->display("error");
        }
    }

    public function authdeal(){
        // echo '<pre>';var_dump($_POST);exit;
        $auth['name'] = addslashes(trim(I('post.name')));
        $auth['agent_level'] = intval(I('post.level'));
        $auth['tel'] = addslashes(trim(I('post.phonenum')));
        $auth['wechat'] = addslashes(trim(I('post.wechatnum')));
        $auth['idcode'] = addslashes(trim(I('post.idnum')));
        $auth['address'] = addslashes(trim(I('post.applyadd')));
        $auth['fid'] = addslashes(trim(I('post.fname')));
        $auth['fwechat'] = addslashes(trim(I('post.fwechatnum')));
        $auth['checkman'] = intval(I('post.people'));
        $auth['apply_note'] = addslashes(I('post.content'));
        $auth['create_time'] = time();
        // var_dump($auth);exit;
        // if (empty($auth['name'])||empty($auth['tel'])||empty($auth['agent_level'])||empty($auth['wechat'])||empty($auth['idcode'])||empty($auth['fwechat'])||empty($auth['check_man'])) {
        //     $this->error('必填项不能为空');
        // }
        // if (empty($_FILES)) {
        //     $this->error('请添加打款截图');
        // }
        // if (preg_match("/^1[358]{1}[0-9]{1}[0-9]{8}$|17[0678]{1}[0-9]{8}$|147[0-9]{8}$/",$auth['tel'])) {
        //     $auth['telpwd'] = md5(substr($auth['tel'], 5));
        // }else{
        //     $this->error('请填写正确手机号');
        // }
        // if (!preg_match("/^[0-9a-zA-Z_-]+$/",$auth['wechat']) || !preg_match("/^[0-9a-zA-Z_-]+$/",$auth['fwechat'])) {
        //     $this->error('微信号/上家微信号书写错误');
        // }
        // $idmatch = "/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/";
        // $idmatch1 = "/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}(\d|x|X)$/";
        // if ( preg_match($idmatch, $auth['idcode']) && preg_match($idmatch1, $auth['idcode'])) {
        //     $this->error('请输入正确的身份证号');
        // }
        // //检查是否重复提交申请
        $user = M('Agent_user');
        // $where1 = 'tel = "'.$auth['tel'].'" and wechat = "'.$auth['wechat'].'"';
        // $where2 = 'name like "%'.$auth['name'].'%" and tel = "'.$auth['tel'].'"';
        // $where3 = 'name like "%'.$auth['name'].'%" and wechat = "'.$auth['wechat'].'"';
        // $res = $user->where($where1.' or '.$where2.' or '.$where3)->find();
        // if ($res) {
        //     if ($res['ischeck'] == 0) {
        //         $this->error('您已提交申请,请勿重复提交,等待审核！');
        //     }
        //     if ($res['ischeck'] == 1) {
        //         $this->error('您已授权！');
        //     }
        //     if ($res['cancelauth'] == 1) {
        //         $this->error('您已被禁止提交授权！');
        //     }
        // }
        // //确定上级
        // $fid = $user->where('name like "%'.$auth['fid'].'%" and (tel = "'.$auth['fwechat'].'" or wechat = "'.$auth['fwechat'].'") and ischeck = 1 and cancelauth = 0')->find();
        // // echo $user->getLastSql();exit;
        // if (empty($fid) ){
        //     $this->error('上级未办理授权，或授权已被取消，请联系上级！');
        // }else{
        //     $auth['fid'] = $fid['id'];
        // }
        // //上传
        // $upload = new \Think\Upload();
        // $upload->maxSize   =    3145728 ;
        // $upload->exts      =    array('jpg', 'gif', 'png', 'jpeg');
        // $upload->rootPath  =    '../Public/uploads/home/';
        // $upload->savePath  =    '../Public/uploads/home/';

        // $info   =   $upload->upload($_FILES);
        // //echo '<pre>';var_dump($info);exit;
        // if(!$info) {
        //     $this->error($upload->getError());
        // }else{
        //     foreach ($info as $value) {
        //         $auth['pic_path'] = $value['savepath'];
        //         $auth['pic_name'][] = $value['savename'];
        //     }
        // }
        // $auth['pic_name'] = implode(',', $auth['pic_name']);
        // //添加
        // if ($res['ischeck'] == 2){
        //     $auth['ischeck'] = 0;
        //     $res1 = $user->where('id ='.$res['id'])->save($auth);
        // }else{
            $res1 = $user->add($auth);
        // }
        if ($res1) {
            $this->success('申请成功，请等候我们的工作人员审核通知！', U('Index/index'));
        }
    }
    
    /**
     * 验证码图片
     * @return
     */
    public function verifyCode() {
        $config = array(
            'imageW' => 105,
            'imageH' => 35,
            'fontSize' => 14,
            'length' => 4,
            'useNoise' => false,
            'codeSet' => '0123456789'
        );
        $this->create_verify_code($config);
        // require_once dirname(dirname(__FILE__)).'/Controller/geeCode/class.geetestlib.php';
        // require_once dirname(dirname(__FILE__)).'/Controller/geeCode/config.php';
        // $GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
        // session_start();
        // $status = $GtSdk->pre_process();
        // $_SESSION['gtserver'] = $status;
        // echo $GtSdk->response_str;
    }
}