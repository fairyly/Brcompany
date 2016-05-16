<?php

$modelMenu = include('model_menu.php');

if (false === $modelMenu) {
    $modelMenu = array();
}

// 菜单项配置
$systemMenu = array(
    // 后台首页
    'Index' => array(
        'name' => '首页',
        'target' => 'Index/index',
        'sub_menu' => array(
            array('item' => array('Index/index' => '系统信息')),
            array('item' => array('Index/editPassword' => '修改密码')),
            array('item' => array('Index/siteEdit' => '站点信息')),
            array('item' => array('Cache/index' => '清除缓存'))
        )
    ),

    // 缓存管理
    'Cache' => array(
        'name' => '缓存管理',
        'target' => 'Cache/index',
        'mapping' => 'Index',
        'sub_menu' => array(
            array('item' => array('Cache/index' => '缓存列表'))
        )
    ),

    // 管理员管理
    'Admins' => array(
        'name' => '管理员权限',
        'target' => 'Admins/index',
        'sub_menu' => array(
            array('item' => array('Admins/index' => '管理员信息')),
            array('item' => array('Admins/add' => '添加管理员')),
            array('item' => array('Roles/index' => '角色管理')),
            array('item' => array('Roles/add' => '添加角色')),
            array('item' => array('Nodes/index' => '节点管理')),
            array('item' => array('Sent/index' => '快递管理')),
            array('item' => array('Admins/edit' =>'编辑管理员信息'),'hidden'=>true),
            array('item' => array('Roles/edit' =>'编辑角色信息'),'hidden'=>true)
        )
    ),

    // 角色管理
    'Roles' => array(
        'name' => '角色管理',
        'target' => 'Roles/index',
        'mapping' => 'Admins',
        'sub_menu' => array(
            array('item' => array('Roles/index' => '角色列表')),
            array('item' => array('Roles/add' => '添加角色')),
            array('item' => array('Roles/edit' => '编辑角色信息'),'hidden'=>true),
            array('item' => array('Roles/assignAccess' => '分配权限'),'hidden'=>true)
        )
    ),

    // 节点管理
    'Nodes' => array(
        'name' => '节点管理',
        'target' => 'Nodes/index',
        'mapping' => 'Admins',
        'sub_menu' => array(
            array('item' => array('Nodes/index' => '节点列表'))
        )
    ),

    // 快递管理
    'Sent' => array(
        'name' => '快递管理',
        'target' => 'Sent/index',
        'mapping' => 'Admins',
        'sub_menu' => array(
            array('item' => array('Sent/index' => '快递列表'))
        )
    ),

    // 模型管理
    // 'Models' => array(
    //     'name' => '模型管理',
    //     'target' => 'Models/index',
    //     'sub_menu' => array(
    //         array('item' => array('Models/index' => '模型列表')),
    //         array('item' => array('Models/add' => '添加模型')),
    //         array('item' => array('Models/show' => '模型信息'),'hidden' => true),
    //         array('item' => array('Models/edit' => '编辑模型'),'hidden' => true),
    //     )
    // ),

    // 字段管理
    'Fields' => array(
        'name' => '字段管理',
        'target' => 'Fields/edit',
        'mapping' => 'Models',
        'sub_menu' => array(
            array('item' => array('Fields/add' => '添加字段')),
            array('item' => array('Fields/edit' => '编辑字段')),
        )
    ),

    // 数据管理
    'Data' => array(
        'name' => '数据管理',
        'target' => 'Data/backup',
        'sub_menu' => array(
            array('item' => array('Data/backup' => '数据备份')),    
            array('item' => array('Data/restore' => '数据导入')),
            array('item' => array('Data/zipList' => '数据解压')),
            array('item' => array('Data/optimize' => '数据优化'))
        )
    ),

    // 代理商管理
    'Agent' => array(
        'name' => '代理商管理',
        'target' => 'Agent/index',
        'sub_menu' => array(
            array('item' => array('Agent/index' => '代理商/详细')),
            array('item' => array('Agent/check' => '代理商/审核')),
            array('item' => array('Agent/upgrade' => '代理商/升级')),
            array('item' => array('Agent/add' => '添加代理商')),
            array('item' => array('Agent/tree' => '代理商关系图')),
            array('item' => array('Agent/cost' => '添加消费'),'hidden'=>true),
            array('item' => array('Agent/edit' => '编辑/升级代理商'),'hidden'=>true),
            array('item' => array('Agent/detail' => '代理商详细信息'),'hidden'=>true),
            // array('item' => array('Agent/upgrade' => '代理商升级信息'),'hidden'=>true),
            array('item' => array('Agent/searchs' => '查询列表'),'hidden'=>true),
            array('item' => array('Agent/underagent' => '下属代理商'),'hidden'=>true),
            array('item' => array('Agent/consumedetail' => '收入来源'),'hidden'=>true),
            array('item' => array('Agent/costinfo' => '消费详细信息'),'hidden'=>true),
        )
    ),

    // 订单管理
    'Order' => array(
        'name' => '订单管理',
        'target' => 'Order/index',
        'sub_menu' => array(
            array('item' => array('Order/index' => '订单管理')),
            // array('item' => array('Order/orderdet' => '订单/详细')),
            array('item' => array('Order/order' => '订单/审核')),
            array('item' => array('Order/sentfor' => '订单/代发货')),
            array('item' => array('Order/sented' => '订单/已发货')),
            array('item' => array('Order/search' => '订单/检索')),
            array('item' => array('Order/output' => '订单/导出')),
            array('item' => array('Order/orderPrint' => '订单/打印'),'hidden'=>true),
            array('item' => array('Order/searchs' => '订单/检索信息'),'hidden'=>true),
            array('item' => array('Order/sent' => '添加发货信息'),'hidden'=>true),
            array('item' => array('Order/orderdetail' => '订单详细信息'),'hidden'=>true),
        )
    ),

    // 财务管理
    'Finance' => array(
        'name' => '财务管理',
        'target' => 'Finance/index',
        'sub_menu' => array(
            array('item' => array('Finance/index' => '首页报表')),
            // array('item' => array('Finance/account' => '财务报表')),
            // array('item' => array('Finance/order' => '订单报表')),
            array('item' => array('Finance/search' => '报表检索')),
            array('item' => array('Finance/searchs' => '报表/检索信息'),'hidden'=>true),
            array('item' => array('Finance/detail' => '总报表详细信息'),'hidden'=>true),
            array('item' => array('Finance/person' => '个人报表详细信息'),'hidden'=>true),
        )
    ),
);

return array_merge($systemMenu, $modelMenu);
