<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="indexs">
                <i class="icon-home"></i>
                <span>主页</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>用户列表</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('userList')); ?>">前台用户列表</a></li>
                <li><a href="<?php echo e(url('adminList')); ?>">后台用户列表</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>订单管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('orderLists')); ?>">订单管理</a></li>
                <li><a href="<?php echo e(url('longOrderList')); ?>">长租审核</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-cog"></i>
                <span>车辆类型</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('typeList')); ?>">车辆类型管理</a></li>
                <li><a href="<?php echo e(url('brandList')); ?>">车辆品牌管理</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>地区管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('addrList')); ?>">地区的列表</a></li>
                <li><a href="<?php echo e(url('addrIns')); ?>">地区列添加</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>服务点管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('address')); ?>">服务点添加</a></li>
                <li><a href="<?php echo e(url('addressList')); ?>">服务点展示</a></li>
                <li><a href="<?php echo e(url('carServer')); ?>">服务点车辆分配</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(url('messageList')); ?>">
                <i class="icon-edit"></i>
                <span>用户留言管理</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('picture')); ?>">
                <i class="icon-picture"></i>
                <span>前台图片管理</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle ui-elements" href="#">
                <i class="icon-code-fork"></i>
                <span>车辆管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('carIns')); ?>">车辆添加</a></li>
                <li><a href="<?php echo e(url('carList')); ?>">车辆列表</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-share-alt"></i>
                <span>套餐管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('packIns')); ?>">套餐添加</a></li>
            </ul>
        </li>
    </ul>
</div>
