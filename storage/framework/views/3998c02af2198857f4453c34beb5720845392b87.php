<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="index.html">
                <i class="icon-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>用户列表</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(URL('userList')); ?>">前台用户列表</a></li>
                <li><a href="<?php echo e(URL('adminList')); ?>">后台用户列表</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>订单管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('orderList')); ?>">订单管理</a></li>
                <li><a href="<?php echo e(URL('longOrderList')); ?>">长租审核</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-cog"></i>
                <span>车辆类型</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(URL('typeList')); ?>">车辆类型管理</a></li>
                <li><a href="<?php echo e(URL('brandList')); ?>">车辆品牌管理</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>车辆类型</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('carTypeList')); ?>">车辆类型列表</a></li>
                <li><a href="<?php echo e(url('modelAdd')); ?>">添加车辆类型</a></li>
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
            </ul>
        </li>
        <li>
            <a href="messageList">
                <i class="icon-edit"></i>
                <span>用户留言管理</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('userPack')); ?>">
                <i class="icon-calendar-empty"></i>
                <span>用户套餐申请审核</span>
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
                <li><a href="<?php echo e(url('carServer')); ?>">服务点车辆分配</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(asset('admin')); ?>/personal-info.html">
                <i class="icon-cog"></i>
                <span>My Info</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-share-alt"></i>
                <span>套餐管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo e(url('packIns')); ?>">套餐添加</a></li>
                <li><a href="<?php echo e(asset('admin')); ?>/grids.html">Grids</a></li>
                <li><a href="<?php echo e(asset('admin')); ?>/signin.html">Sign in</a></li>
                <li><a href="<?php echo e(asset('admin')); ?>/signup.html">Sign up</a></li>
            </ul>
        </li>
    </ul>
</div>
