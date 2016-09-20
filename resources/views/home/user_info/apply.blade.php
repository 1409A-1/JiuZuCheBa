@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/user.css">

<!--内容-->
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <a href="{{ url('apply') }}" class="active">长租申请</a>
            <a href="">信用查看</a>
            <h5>订单管理</h5>
            <a href="{{ url('orderList') }}" >订单列表</a>
            <a id="topingjia">评价订单</a>
            <h5>账户管理</h5>
            <a href="{{ url('userInfo') }}">账户信息</a>
            <a href="{{ url('benefitList') }}">优惠券</a>
        </div>
        <div class="right">
            <!--我的主页-->
            <div class="order shortOrder show">
                <h4>长租申请</h4>
                <ul class="order1">
                    <li class="active">全部申请</li>
                    <li>申请中</li>
                    <li>申请通过<a></a></li>
                    <li>申请未通过<a></a></li>
                    <li>申请取消<a></a></li>
                </ul>
                <ul class="order2">
                    <li style="width: 440px">订单详情</li>
                    <li>时间</li>
                    <li>申请时间</li>
                    <li>订单状态</li>
                    <li>操作</li>
                </ul>
                {{--全部申请--}}
                <div id="show">
                    <span style="display: block">
                       <ul class="order3"></ul>
                        @if(array_key_exists('all', $order))
                            @foreach($order['all'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li style="height: 122px">
                                            <div>
                                                <img src="{{ $v['car_img'] }}" alt="{{ $v['car_img'] }}">
                                                <div class="info">
                                                    <a>{{ $v['car_name'] }}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['dep_time']) }}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['des_time']) }}
                                                        </div>
                                                    </li>
                                                    <li class="cen">{{ date('Y/m/d H:i', $v['apply_time']) }}</li>
                                                    <li class="state">
                                                       @if($v['apply_status']==0)
                                                           申请中
                                                       @elseif($v['apply_status']==1)
                                                           申请通过
                                                       @elseif($v['apply_status']==2)
                                                           申请未通过
                                                       @else
                                                           申请已取消
                                                       @endif
                                                    </li>
                                                    <li class="operation">
                                                        @if($v['apply_status']==0)
                                                            <a href="{{ url('cancelLong') }}?ceoyg={{ $v['apply_id'] }}">取消申请</a>
                                                        @else
                                                            <a href="">详情</a>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无申请...</p>
                        @endif
                    </span>
                    {{--申请中--}}
                    <span style="display: none">
                        <ul class="order3"></ul>
                        @if(array_key_exists(0, $order))
                            @foreach($order['0'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li style="height: 122px">
                                            <div>
                                                <img src="{{ $v['car_img'] }}" alt="{{ $v['car_img'] }}">
                                                <div class="info">
                                                    <a>{{$v['car_name']}}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['dep_time']) }}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['des_time']) }}
                                                        </div>
                                                    </li>
                                                    <li class="cen">{{ date('Y/m/d H:i', $v['apply_time']) }}</li>
                                                    <li class="state">
                                                        <a>申请中</a>
                                                    </li>
                                                    <li class="operation">
                                                        <a href="{{ url('cancelLong') }}?ceoyg={{ $v['apply_id'] }}">取消申请</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无申请...</p>
                        @endif
                    </span>
                    {{--申请通过--}}
                    <span style="display: none">
                        <ul class="order3"></ul>
                        @if(array_key_exists(1, $order))
                            @foreach($order['1'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li style="height: 122px">
                                            <div>
                                                <img src="{{ $v['car_img'] }}" alt="{{ $v['car_img'] }}">
                                                <div class="info">
                                                    <a>{{ $v['car_name'] }}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['dep_time'] )}}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['des_time'] )}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">{{ date('Y/m/d H:i', $v['apply_time']) }}</li>
                                                    <li class="state">
                                                        <a>申请通过</a>
                                                    </li>
                                                    <li class="operation">
                                                        <a href="">详情</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无申请...</p>
                        @endif
                    </span>
                    {{--申请未通过--}}
                    <span style="display: none">
                        <ul class="order3"></ul>
                        @if(array_key_exists(2,$order))
                            @foreach($order['2'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li style="height: 122px">
                                            <div>
                                                <img src="{{ $v['car_img'] }}" alt="{{ $v['car_img'] }}">
                                                <div class="info">
                                                    <a>{{ $v['car_name'] }}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['dep_time']) }}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['des_time'])}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">{{ date('Y/m/d H:i', $v['apply_time']) }}</li>
                                                    <li class="state">
                                                        <a>申请未通过</a>
                                                    </li>
                                                    <li class="operation">
                                                        <a href="">详情</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无申请...</p>
                        @endif
                    </span>
                    {{--申请取消--}}
                    <span style="display: none">
                        <ul class="order3"></ul>
                        @if(array_key_exists(3,$order))
                            @foreach($order['3'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li style="height: 122px">
                                            <div>
                                                <img src="{{ $v['car_img'] }}" alt="{{ $v['car_img'] }}">
                                                <div class="info">
                                                    <a>{{ $v['car_name'] }}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['dep_time']) }}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{ date('Y/m/d 12:00', $v['des_time'])}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">{{ date('Y/m/d H:i', $v['apply_time']) }}</li>
                                                    <li class="state">
                                                        <a>申请已取消</a>
                                                    </li>
                                                    <li class="operation">
                                                        <a href="">详情</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无申请...</p>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--底部-->
@include('common.home_footer')

<script>
    $(function(){
        var $li = $('.order1 li');
        var $div = $('#show span');
        $li.click(function(){
            var $this = $(this);
            var $t = $this.index();
            $li.removeClass();
            $this.addClass('active');
            $div.css('display','none');
            $div.eq($t).css('display','block');
        })

//用户详情中点击订单评论
        $("#topingjia").click(function(){
            layer.alert('评价订单正在开发中！敬请期待！');
        })
    });
</script>
