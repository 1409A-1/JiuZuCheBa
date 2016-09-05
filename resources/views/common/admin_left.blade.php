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
                <li><a href="{{URL('userlist')}}">前台用户列表</a></li>
                <li><a href="{{URL('adminlist')}}">后台用户列表</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-cog"></i>
                <span>车辆管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{URL('typelist')}}">车辆类型管理</a></li>
                <li><a href="{{URL('brandlist')}}">车辆品牌管理</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>车辆类型</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="car_type_list">车辆类型列表</a></li>
                <li><a href="model_add">添加车辆类型</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>地区管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{url('addr_list')}}">地区的列表</a></li>
                <li><a href="{{url('addr_ins')}}">地区列添加</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>服务点管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="address">服务点添加</a></li>
                <li><a href="address_list">服务点展示</a></li>
            </ul>
        </li>
        <li>
            <a href="{{asset('admin')}}/gallery.html">
                <i class="icon-picture"></i>
                <span>套餐查看</span>
            </a>
        </li>
        <li>
            <a href="{{url('user_pack')}}">
                <i class="icon-calendar-empty"></i>
                <span>用户套餐申请审核</span>
            </a>
        </li>
        <li>
            <a href="{{asset('admin')}}/tables.html">
                <i class="icon-th-large"></i>
                <span>Tables</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle ui-elements" href="#">
                <i class="icon-code-fork"></i>
                <span>UI Elements</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{asset('admin')}}/ui-elements.html">UI Elements</a></li>
                <li><a href="{{asset('admin')}}/icons.html">Icons</a></li>
            </ul>
        </li>
        <li>
            <a href="{{asset('admin')}}/personal-info.html">
                <i class="icon-cog"></i>
                <span>My Info</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-share-alt"></i>
                <span>Extras</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="{{asset('admin')}}/code-editor.html">Code editor</a></li>
                <li><a href="{{asset('admin')}}/grids.html">Grids</a></li>
                <li><a href="{{asset('admin')}}/signin.html">Sign in</a></li>
                <li><a href="{{asset('admin')}}/signup.html">Sign up</a></li>
            </ul>
        </li>
    </ul>
</div>