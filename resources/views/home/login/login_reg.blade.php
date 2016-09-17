@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/login.css">
<script type="text/javascript" src="home/js/jquery-validate.js"></script>
    <!--登录注册-->
    <div class="infoBox noCopy">
        <div>
            <div>
                <!--注册-->
                <div class="register">
                    <div class="title">
                        <div>注册</div>
                        <span>已有账号？<a href="{{ URL('login') }}">立即登录</a></span>
                    </div>
                    <form action="{{ URL('regPro') }}" method="post" id="reg">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="input_body">
                            <div class="inputBox" id="reg_name_box">
                                <input placeholder="请输入姓名" maxlength="10" style="width: 100%;" type="text" name="user_name" id="name">
                            </div>
                            <div class="inputBox" id="reg_phone_box">
                                <input placeholder="请输入手机号码" maxlength="11" style="width: 100%;" id="reg_phone" type="tel" name="tel">
                            </div>
                            <div class="inputBox" id="reg_pw_box">
                                <input placeholder="请输入6位以上密码" maxlength="18" style="width: 100%;" id="reg_pw" type="password"  name="password">
                            </div>
                            <br>
                            <button id="reg" style="cursor: pointer;">注 册<i></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--底部-->
@include('common.home_footer');
    {{--前台验证--}}
    <script>
        $(function(){
            jQuery.validator.addMethod("isMobile", function(value, element) {
                var length = value.length;
                var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
                return this.optional(element) || (length == 11 && mobile.test(value));
            }, "<span style='font-size: 12px;color: #fd5d0d;'>请正确填写您的手机号</span>");

            $("#reg").validate({
                errorElement : 'p',
                success : function (label) {
                    label.addClass('success');
                },
                    rules:{
                        user_name:{
                            required:true,
                            remote:{
                                url:"{{'onlyName'}}",
                                type:'get',
                                //  dataType:'json',
                                data:{   //传两个参数
                                    name:function(){
                                        return $('#name').val()
                                    }
                                }
                            }
                        },
                        tel:{
                            required:true,
                            isMobile:true,
                            remote:{
                                url:"{{'onlyTel'}}",
                                type:'get',
                                //  dataType:'json',
                                data:{   //传两个参数
                                    tel:function(){
                                        return $('#reg_phone').val()
                                    }
                                }
                            }
                        },
                        password:{
                            required:true,
                            minlength:6
                        }
                    },
                  messages:{
                      user_name:{
                           required:"<span style='font-size: 12px;color: #fd5d0d;'>该用户名必填</span>",
                           remote:"<span style='font-size: 12px;color: #fd5d0d;'>用户名存在</span>"
                     },
                      tel:{
                          required:"<span style='font-size: 12px;color: #fd5d0d;'>手机号必填</span>",
                          remote:"<span style='font-size: 12px;color: #fd5d0d;'>已存在</span>"
                      },
                      password:{
                          required:"<span style='font-size: 12px;color: #fd5d0d;'>密码必填</span>",
                          minlength:"<span style='font-size: 12px;color: #fd5d0d;'>大于六位</span>"
                      }
                  }
            })
        })
    </script>