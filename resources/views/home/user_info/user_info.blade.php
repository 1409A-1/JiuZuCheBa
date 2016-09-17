@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/user.css">

<!--内容-->
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <h5>订单管理</h5>
            <a href="orderList">订单列表</a>
            <a id="topingjia">评价订单</a>
            <h5>账户管理</h5>
            <a href="userInfo" class="active">账户信息</a>
            <a href="benefitList">优惠券</a>
        </div>
        <div class="right">
            <!--我的主页-->
            <div class="index"></div>
            <!--账户信息-->
            <div class="user_info" style="display: block;">
                <h4>账户信息</h4>
                <div class="user_info1">
                    基本信息
                    <ul>
                        <li>
                            <a>*</a> 姓名：
                            <input value="{{ $info['user_name'] }}" id="name" style="margin-left:45px" type="text">
                        </li>
                        <li style="position:relative">
                            <a>*</a> 手机号：
                            <input value="{{ $info['tel'] }}" disabled id="phone" style="margin-left:58px;" type="text">
                        </li>
                    </ul>
                </div>
                <div class="user_info3">
                    确认修改
                    <ul>
                        <li>
                            <a href="updatePass"><button id="toUpdatePw" style="cursor: pointer">修改密码</button></a>
                        </li>
                    </ul>
                </div>
                <button id="confirm">确认修改<i></i></button>
            </div>
        </div>
    </div>
</div>
<!--底部-->
@include('common.home_footer')
