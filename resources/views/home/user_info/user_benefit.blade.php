@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/user.css">
<style>
    benefit{
        display: none;
    }
</style>

<!--内容-->
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <h5>订单管理</h5>
            <a href="{{ url('orderList') }}">订单列表</a>
            <a id="{{ url('topingjia') }}">评价订单</a>
            <h5>账户管理</h5>
            <a href="{{ url('userInfo') }}" >账户信息</a>
            <a href="{{ url('benefitList') }}"  class="active">优惠券</a>
        </div>
        <div class="right">
            <!--我的主页-->
            <div class="order shortOrder show">
                <h4>我的优惠券</h4>
                <div class="coupon">
                    <div class="coupon_tit">
                        <span class="active">未使用</span>
                        <span>已使用</span>
                        <span>已过期</span>
                    </div>
                    <span id="yh">
                          <!--未使用-->
                        <benefit style="display: block">
                            @if(array_key_exists(0,  $yh))
                               @foreach($yh['0'] as $k=>$v)
                                 <ul class="order3">
                                   <li style="height: 122px">
                                     <div>
                                        <img src="home/images/yh.jpg" alt="图片">
                                        <div class="info">
                                            <a>{{ $v['benefit_name'] }}</a>
                                        </div>
                                        <ul>
                                            <li class="time" style="margin-right: 200px">
                                                <div>
                                                    优惠开始<br>
                                                    {{ date('y/m/d H:i:s', $v['begin_time']) }}
                                                </div>
                                                <div>
                                                    优惠结束<br>
                                                    {{ date('y/m/d H:i:s', $v['end_time']) }}
                                                </div>
                                            </li>
                                            <li class="cen">优惠金额：￥{{ $v['ord_price'] }}</li>
                                        </ul>
                                     </div>
                                   </li>
                                 </ul>
                               @endforeach
                            @else
                                <div class="noMore">暂无此类优惠券...</div>
                            @endif
                        </benefit>
                          <!--已使用-->
                        <benefit>
                         @if(array_key_exists(1, $yh))
                             @foreach($yh['1'] as $k=>$v)
                                 <ul class="order3">
                                     <li style="height: 122px">
                                         <div>
                                             <img src="../resources/assets/home/public/yh.jpg" alt="图片">
                                             <div class="info">
                                                 <a>{{ $v['benefit_name'] }}</a>
                                             </div>
                                             <ul>
                                                 <li class="time" style="margin-right: 200px">
                                                     <div>
                                                         优惠开始<br>
                                                         {{ date('y/m/d H:i:s', $v['begin_time']) }}
                                                     </div>
                                                     <div>
                                                         优惠结束<br>
                                                         {{ date('y/m/d H:i:s', $v['end_time']) }}
                                                     </div>
                                                 </li>
                                                 <li class="cen">优惠金额：￥{{ $v['ord_price'] }}</li>
                                             </ul>
                                         </div>
                                     </li>
                                 </ul>
                             @endforeach
                         @else
                             <div class="noMore">暂无此类优惠券...</div>
                         @endif
                        </benefit>
                            <!--已过期-->
                        <benefit>
                            <!--未使用-->
                            @if(array_key_exists('old', $yh))
                                @foreach($yh['old'] as $k=>$v)
                                    <ul class="order3">
                                        <li style="height: 122px">
                                            <div>
                                                <img src="../resources/assets/home/public/yh.jpg" alt="图片">
                                                <div class="info">
                                                    <a>{{ $v['benefit_name'] }}</a>
                                                </div>
                                                <ul>
                                                    <li class="time" style="margin-right: 200px">
                                                        <div>
                                                            优惠开始<br>
                                                            {{ date('y/m/d H:i:s', $v['begin_time']) }}
                                                        </div>
                                                        <div>
                                                            优惠结束<br>
                                                            {{ date('y/m/d H:i:s', $v['end_time']) }}
                                                        </div>
                                                    </li>
                                                    <li class="cen">优惠金额：￥{{ $v['ord_price'] }}</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <div class="noMore">暂无此类优惠券...</div>
                            @endif
                        </benefit>
                        <!--暂无此类优惠券-->
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
      var $li = $('.coupon_tit span');
      var $div = $('#yh benefit');
      $li.click(function(){
          var $this = $(this);
          var $t = $this.index();
          $li.removeClass();
          $this.addClass('active');
          $div.css('display','none');
          $div.eq($t).css('display','block');
      })
    });
</script>