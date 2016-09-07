@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/user.css">

<!--内容-->
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <h5>订单管理</h5>
            <a href="order_list">订单列表</a>
            <a id="topingjia">评价订单</a>
            <h5>账户管理</h5>
            <a href="user_info" class="active">账户信息</a>
            <a href="benefit_list">优惠券</a>
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
                        <li>
                            <a>&nbsp;</a> 紧急联系人：
                            <input id="name1" type="text">
                        </li>
                        <li>
                            <a>&nbsp;</a> 紧急联系人手机：
                            <input id="phone1" type="text">
                        </li>
                    </ul>
                </div>
                <div class="user_info2">
                    重要信息
                    <ul>
                        <li>
                            <a style="color:#FD1E2E">&nbsp;&nbsp;</a> 身份证号码：
                            <input id="identity_card_no" type="text">
                        </li>
                    </ul>
                </div>
                <div class="user_info2">
                    其它联系方式
                    <ul>
                        <li>
                            QQ：
                            <input id="qq" style="margin-left:60px" type="text">
                        </li>
                        <li style="margin-left:82px">
                            邮箱：
                            <input id="email" style="margin-left:78px" type="text">
                        </li>
                    </ul>
                </div>
                <div class="user_info3">
                    确认修改
                    <ul>
                        <li>
                            <a href="update_pass"><button id="toUpdatePw">修改密码</button></a>
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
