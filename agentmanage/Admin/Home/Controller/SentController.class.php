<?php
namespace Home\Controller;

/**
 * SentController
 * 快递信息
 */
class SentController extends CommonController {
    /**
     * 快递列表
     * @return
     */
    public function index() {
        $sents = M('sent')->order('status desc, id asc')->select();
        // var_dump($sents);exit;
        $this->assign('sents', $sents);
        $this->assign('count', count($sents));
        $this->display();
    }

    /**
     * 快递公司状态
     * @return
     */
    public function toggleStatus() {
        $sents = M('sent');
        $id = I('get.id');
        $status = I('get.status');
        $res = $sents->where('id ='.$id)->find();
        // var_dump($id, $status, $res);exit;
        if (!$id || !$res) {
            return $this->errorReturn('无效的操作！');
        }

        if (!$status) {
            $sents->where('id ='.$id)->setField('status', 1);
        } else {
            $sents->where('id ='.$id)->setField('status', 1);
        }

        $info = $status ? '禁用成功！' : '启用成功！';
        $this->successReturn($info);
    }

    /**
     * 节点更新
     * @return
     */
    public function update() {
        echo 111111111111111111111111111111;
        var_dump($_POST);exit;
        $nodeService = D('Node', 'Service');
        if (!isset($_GET['id'])
            || !$nodeService->existNode($_GET['id'])) {
            return $this->errorReturn('无效的操作！');
        }

        if (!$_GET['status']) {
            $nodeService->setStatus($_GET['id'], 1);
        } else {
            $nodeService->setStatus($_GET['id'], 0);
        }

        $info = $_GET['status'] ? '禁用成功！' : '启用成功！';
        $this->successReturn($info);
    }
}
