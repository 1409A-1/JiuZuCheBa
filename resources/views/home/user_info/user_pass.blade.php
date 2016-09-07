@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/user.css">
<script type="text/javascript" src="home/js/jquery-validate.js"></script>

<!--内容-->
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <h5>订单管理</h5>
            <a href="order_list">订单列表</a>
            <a id="topingjia">评价订单</a>
            <h5>账户管理</h5>
            <a id="toUser" class="active">账户信息</a>
            <a href="benefit_list" >优惠券</a>
        </div>
        <div class="right">
            <!--账户信息-->
            <div class="order shortOrder show">
                <h4>修改密码</h4>
                <form action="{{URL('password')}}" method="post" id="reg">
                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                <div class="user_info" style="display: block;">
                    <div class="user_info1">
                        
                        <ul>
                            <li>
                                <a>*</a> 原密码：
                                <input  style="margin-left:20px" type="password" name="new_pwd" id="new_pwd">
                            </li>
                            <li style="position:relative">
                                <a>*</a> 新密码：
                                <input  style="margin-left:20px;" type="password" name="password">
                            </li>
                            <li>
                                <a>*</a> 验证码：
                                <input type="text" style="margin-left:20px;" name="mobile_code" id="mobile_code">
                            </li>
                            <li>
                                <input id="phone" type="button" value="免费获取验证码">
                            </li>
                        </ul>
                    </div>
                    <button id="confirm">确认修改<i></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 底部 -->
@include('common.home_footer')

    <script>
        $(document).delegate('#phone','click',function(){
            $.ajax({
                type:'get',
                url:'{{URL('phone')}}',
                success: function(msg){
                    alert( "Data Saved: " + msg );
                }
            });
            var wait=60;
            function time(o) {
                if (wait == 0) {
                    o.removeAttribute("disabled");
                    o.value="免费获取验证码";
                    wait = 60;
                } else {
                    o.setAttribute("disabled", true);
                    o.value=wait+"秒后可重新发送";
                    wait--;
                    setTimeout(function() {
                                time(o)
                            },
                            1000)
                }
            };time(this)
        })


        $(function(){
            $("#reg").validate({
                errorElement : 'span',
                success : function (label) {
                    label.addClass('success');
                },
                rules:{
                    new_pwd:{
                        required:true,
                        remote:{
                            url:"{{'only_pwd'}}",
                            type:'get',
                            data:{   //传两个参数
                                new_pwd:function(){
                                    return $('#new_pwd').val()
                                }
                            }
                        }
                    },
                    password:{
                        required:true,
                        minlength:6
                    },
                    mobile_code:{
                        required:true,
                        remote:{
                            url:"{{'only_mobile_code'}}",
                            type:'get',
                            data:{   //传两个参数
                                mobile_code:function(){
                                    return $('#mobile_code').val()
                                }
                            }
                        }
                    }
                },
                messages:{
                    new_pwd:{
                        required:'原密码必填',
                        remote:'密码不正确'
                    },
                    password:{
                        required:'新密码必填',
                        minlength:'不小于6位'
                    },
                    mobile_code:{
                        required:'验证码必填',
                        remote:'验证码不正确'
                    }
                }
            })
        })
    </script>