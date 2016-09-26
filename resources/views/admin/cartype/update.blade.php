<!DOCTYPE html>
<html>
<head>
	<title>车辆类型修改</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('admin')}}/css/compiled/new-user.css" type="text/css" media="screen" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    @include('common.admin_header')
    @include('common.admin_left')
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>车辆类型修改</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                            <form class="new_user_form inline-input" method="post" action="{{URL('typeUpdate')}}" />
                                <div class="span12 field-box">
                                    <label>类型:</label>
                                    <input class="span9" type="text" required name="type_name" value="{{$type['type_name']}}" />
                                </div>
                                @if (count($errors) > 0)
                                    <div style="margin-left:110px">
                                        <ul style="color:red">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="type_id" value="{{$type['type_id']}}">
                                <div class="span11 field-box actions">
                                    <input type="submit" class="btn-glow primary" value="确认修改" />
                                    <span>OR</span>
                                    <input type="reset" value="重置" class="reset" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- side right column -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

    <script type="text/javascript">
        $(function () {
            $("input[type=text]").focus();
            $("input[type=reset]").click(function(){
                $("input[type=text]").focus();
            });
            // toggle form between inline and normal inputs
            var $buttons = $(".toggle-inputs button");
            var $form = $("form.new_user_form");

            $buttons.click(function () {
                var mode = $(this).data("input");
                $buttons.removeClass("active");
                $(this).addClass("active");

                if (mode === "inline") {
                    $form.addClass("inline-input");
                } else {
                    $form.removeClass("inline-input");
                }
            });

            she=$("a[href='{{ url('typeList') }}']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
        });
    </script>

</body>
</html>