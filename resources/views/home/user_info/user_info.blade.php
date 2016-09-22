@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/user.css">
<script type="text/javascript" src="home/js/jquery-validate.js"></script>
<!--内容-->
<style>
    #credit a{
        color:#949494;
    }
    #credit a:hover{
        color:#ea5506;
    }
</style>
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <a href="{{ url('apply') }}">长租申请</a>
            <a href="">我的积分</a>
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
                    <form action="{{ url('updaUser') }}" method="post" id="upda">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                        基本信息
                        <ul>
                            <li>
                                <a>*</a> 姓名：
                                <input value="{{ $info['user_name'] }}" name="user_name" style="margin-left:45px" type="text">
                            </li>
                            <li style="position:relative">
                                <a>*</a> 手机号：
                                <input value="{{ $info['tel'] }}"  name="tel" style="margin-left:58px;" type="text">
                            </li>
                            <li style="position:relative" id="credit">
                                <a>*</a> 当前积分：
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $info['credit'] }}
                                <a href="">兑换优惠券</a>
                                &nbsp;&nbsp;
                                <a href="">积分记录</a>
                            </li>
                        </ul>
                    </div>
                    <input type="submit" value="确认修改" id="confirm" style="cursor: pointer"><i></i>
                    </form>
                    <div class="user_info3">
                        修改密码
                        <ul>
                            <li>
                                <a href="{{ url('updatePass') }}"><button id="toUpdatePw" style="cursor: pointer">修改密码</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--底部-->
@include('common.home_footer')

<script>
    $(function(){
        //用户详情中点击订单评论
        $("#topingjia").click(function(){
            layer.alert('评价订单正在开发中！敬请期待！');
        })

        jQuery.validator.addMethod("isMobile", function(value, element) {
            var length = value.length;
            var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
            return this.optional(element) || (length == 11 && mobile.test(value));
        }, "<span style='font-size: 12px;color: #fd5d0d;'>格式</span>");

        $("#upda").validate({
            errorElement : 'span',
            success : function (label) {
                label.addClass('success');
            },
            rules:{
                user_name:{
                    required:true,
                    remote: "{{ url('checkUpdaName') }}",
                    maxlength:10
                },
                tel:{
                    required:true,
                    isMobile:true,
                    remote: "{{ url('checkUpdaTel') }}"
                }
            },
            messages:{
                user_name:{
                    required:"<span style='font-size: 12px;color: #fd5d0d;'>必填</span>",
                    remote: "<span style='font-size: 12px;color: #fd5d0d;'>存在</span>",
                    maxlength: "<span style='font-size: 12px;color: #fd5d0d;'>过长</span>"
                },
                tel:{
                    required:"<span style='font-size: 12px;color: #fd5d0d;'>必填</span>",
                    remote: "<span style='font-size: 12px;color: #fd5d0d;'>存在</span>"
                }
            }
        })
    })
</script>
