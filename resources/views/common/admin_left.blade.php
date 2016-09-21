<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="{{ url('indexs') }}">
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
                <li><a href="{{ url('userList') }}">前台用户列表</a></li>
                <li><a href="{{ url('adminList') }}">后台用户列表</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>订单管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{ url('orderLists') }}">订单管理</a></li>
                <li><a href="{{ url('longOrderList') }}">长租审核</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-cog"></i>
                <span>车辆管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{ url('typeList') }}">车辆类型管理</a></li>
                <li><a href="{{ url('brandList') }}">车辆品牌管理</a></li>
                <li><a href="{{ url('carList') }}">车辆列表</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>地区管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{ url('addrList') }}">地区的列表</a></li>
                <li><a href="{{ url('addrIns') }}">地区列添加</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>服务点管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{ url('address') }}">服务点添加</a></li>
                <li><a href="{{ url('addressList') }}">服务点展示</a></li>
                <li><a href="{{ url('carServer') }}">服务点车辆分配</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ url('messageList') }}">
                <i class="icon-edit"></i>
                <span>用户留言管理</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-share-alt"></i>
                <span>套餐管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{ url('packIns') }}">套餐添加</a></li>
            </ul>
        </li>
    </ul>
</div>
