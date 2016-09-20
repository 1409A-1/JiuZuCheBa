<!-- navbar -->
@include('common.admin_header')
<!-- end navbar -->

<!-- sidebar -->
@include('common.admin_left')
<!-- end sidebar -->

    <script src="{{asset('admin')}}/js/js.js"></script>
    <style type="text/css">
        /* 通用自定义按钮组合 */
        .u-btns{display:inline-block;position:relative;}
        .u-btns .u-btn{float:left;margin-left:-1px;border-radius:0;}
        .u-btns .u-btn:first-child{margin-left:0;border-radius:5px 0 0 5px;}
        .u-btns .u-btn:nth-last-of-type(1){border-radius:0 5px 5px 0;}
        .u-btns .city{background: #999; color: white;}
    </style>


	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">
                <!-- products table-->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>业务经营地区列表</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                    </div>
                    <div class="row-fluid">
                        <table class="table">
                            <tr>
                                <th>业务经营城市</th>
                                <th>业务经营地区</th>
                            </tr>
                            @foreach($data as $v)
                                <tr>
                                    <td width="350" style="border-right:1px solid #ddd">
                                        <span>{{ $v['address_name'] }}</span>
                                        <span class="u-btns" style="float:right;" id="{{ $v['address_id'] }}">
                                            <button class="u-btn @if($v['type'] == 0) city @endif" type="0">普通城市</button>
                                            <button class="u-btn @if($v['type'] == 1) city @endif" type="1">旅游城市</button>
                                            <button class="u-btn @if($v['type'] == 2) city @endif" type="2">热门城市</button>
                                        </span>
                                    </td>
                                    <td>
                                    @foreach($v['son'] as $s)
                                        <div class="type" style="width: 70px; float:left; margin:0 15px">{{ $s['address_name'] }}
                                            <span class="label" name="{{ $s['address_name'] }}" style="cursor: pointer; float:right;">×</span>
                                        </div>
                                    @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $(".u-btns>button").click(function(){
                var _this = $(this);
                var id = _this.parent().attr('id');
                var type = _this.attr('type');
                $.get("{{ url('cityTypeUpdate') }}", {id: id, type: type}, function(msg){
                    if (msg == 1) {
                        _this.siblings().removeClass('city');
                        _this.addClass('city');
                    }
                });
            });

            $('.type').find('span').click(function(){
                var _this = $(this);
                var address = _this.attr('name');
                $.get("{{ url('addrDel') }}", {address: address}, function(msg){
                    switch(msg){
                        case 'ban':
                            layer.alert('该地区尚存在门店，禁止删除！');
                            break;
                        case 'all':
                            _this.parents('tr').hide();
                            layer.alert('删除成功！该城市现无经营区域，已直接删除！');
                            break;
                        case 'one':
                            _this.parent().hide();
                            layer.alert('删除成功！当前区域已移除！');
                            break;
                        case 'fail':
                            layer.alert('未知错误，删除失败！');
                            break;
                    }
                });
            });

            she=$("a[href='{{ url('addrList') }}']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
        });
    </script>
    <!-- end main container -->

</body>
</html>
