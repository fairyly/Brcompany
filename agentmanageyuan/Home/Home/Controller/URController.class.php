<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
class URController extends BaseController {
   Public function _initialize(){
   // 初始化的时候检查用户权限
   $this->checkRbac();
}

   // 检查用户权限
  protected function checkRbac() {
    // 这里是具体的检测代码
	$userInfo = session('userInfo');
	if(empty($userInfo)){
		$this->redirect("/");
	}
 }
}