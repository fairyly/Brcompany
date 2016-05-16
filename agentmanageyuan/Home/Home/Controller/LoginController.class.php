<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController {
    public function index(){
        // session('userInfo',null);
        $info = $_SESSION['userInfo'];
        if ($info) {
            $this->redirect('User/index', array('id'=>$info['id']));
        }
        if (!$this->check_verify_code(I('post.vcode'))) {
            return $this->error('验证码不正确！');
        }
        $user = addslashes(trim(I('post.username')));
        $pwd = md5(addslashes(trim(I('post.password'))));
        $user = $this->getInfo('tel = "'.$user.'" and telpwd = "'.$pwd.'" and ischeck = 1 and cancelauth = 0');
        // echo M()->getLastSql();exit;
		if (!$user) {
            $this->error('用户名/密码错误或无授权！');
			$this->redirect("/");
        }
        $user['cost'] = $this->getCost($user['id']);
        $user['fid'] = $this->getName($user['fid']);
        $user['level'] = $user['agent_level'];
        $user['agent_level'] = $this->getLevel($user['agent_level']);
        $user['order_count'] = M('Agent_cost')->where('uid ='.$user['id'])->count();
		session('userInfo',$user);
        // session(array('userInfo'=>$user, 'expire'=>3600));

        $this->assign('info', $user);
        $this->display('User:index');
    }
}