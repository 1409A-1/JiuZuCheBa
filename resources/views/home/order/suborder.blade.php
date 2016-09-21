@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/submitOrder.css">
<script>
    eval('var data = ' + '{!! $data !!}');
</script>
<script type="text/javascript" src="home/js/aes.js"></script>
<script type="text/javascript" src="home/js/pad-zeropadding.js"></script>
<script type="text/javascript" src="home/js/submitOrder.js"></script>
<!--导航标题-->
<div class="title">
    <div class="titleL">当前位置：短租自驾 > 选择车型 > 提交订单</div>
    <div class="titleR">
        <div>
            <hr class="ok">
            <hr class="no">
            <h3 class="r1">1</h3>
            <h3 class="r2">2</h3>
            <h3 class="r3">3</h3>
        </div>
        <ul>
            <li>选择车型</li>
            <li>提交订单</li>
            <li class="dns">订单完成</li>
        </ul>
    </div>
</div>
<!--订单信息-->
<div class="orderInfoBox">
    <div class="left">
        <h4>确认订单信息<a href="{{ url('short') }}"><span style="font-size: 18px">重选车辆</span></a></h4>
        <!--基本信息-->
        <div class="carInfo">
            <div class="carInfoL">
                <img src="">
                租期：<b>共3天</b>
            </div>
            <div class="carInfoR">
                <!--车辆信息-->
                <h2></h2>
                <div class="carIcon">
                    <i class="icon icon_car1"></i>
                    <a></a>
                    <i class="icon icon_car2"></i>
                    <a></a>
                    <i class="icon icon_car3"></i>
                    <a></a>
                    <i class="icon icon_car4"></i>
                    <a></a>
                </div>
                <!--优惠信息-->
                <div class="discountInfo">
                    <span>优惠信息：</span>
                    <a>暂无优惠信息</a>
                </div>
                <!--支付方式-->
                <div class="payMode">
                    支付方式：
                    <button>
                        到店支付
                        <div><div>&radic;</div></div>
                    </button>
                    <button class="active">
                        在线支付
                        <div><div>&radic;</div></div>
                    </button>
                </div>
                <!--取还车信息-->
                <div class="storeInfo">
                    <div class="storeInfoL">
                        <div class="take">取</div>
                        <div class="return">还</div>
                    </div>
                    <div class="storeInfoR">
                        <h5></h5>
                        <p>
                            取车时间：<a></a><br>
                            取车地址：<a></a>
                        </p>

                        <h5></h5>
                        <p>
                            还车时间：<a></a><br>
                            还车地址：<a></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--优惠券-->
        <div class="invoice">
            <div class="check"><a>&radic;</a></div>使用优惠券
            <div class="invoiceInfo">
                <ul>
                    <li class="active"></li>
                </ul>

                @if(!empty($benefit))
                  <div id="test">
                    @foreach($benefit as $k=>$v)
                        <input type="checkbox" stats="0" benefit_price="{{ $v['ord_price'] }}" benefit_name="{{ $v['benefit_name'] }}" num = {{ $k }}>&nbsp;&nbsp;
                        <h3 style="display: inline">{{ $v['ord_price'] .'    '.$v['benefit_name'] }}</h3><br><br>
                    @endforeach
                  </div>
                @else
                   暂无优惠券
                @endif
            </div>
        </div>
        <!--提示-->
        <p class="prompt">
            超时计费：<br/>
            1.非经就租车吧书面同意，本车不得续租。到期未还车辆，除需正常支付租金外，您还需按超期部分租金的300%支付违约金，并且就租车吧有权强行收回车辆。<br/>
            2.超时4小时以上，按一天计费。不足4小时（含），按每小时50元收费。<br/><br/>
            温馨提示：<br/>
            1.本订单不限公里数, 超时费 30 元/小时, 预授权3000元(可退), 违章押金 2000元(可退)
            2.本订单仅为客户租车预约登记，提交该订单后，客户需到门店办理具体租车手续，具体权利义务以签署的书面合同为准。
            超时计费：<br/>
            1.非经就租车吧书面同意，本车不得续租。到期未还车辆，除需正常支付租金外，您还需按超期部分租金的300%支付违约金，并且就租车吧有权强行收回车辆。<br/>
            2.超时4小时以上，按一天计费。不足4小时（含），按每小时50元收费。<br/><br/>
            温馨提示：<br/>
            1.本订单不限公里数, 超时费 30 元/小时, 预授权3000元(可退), 违章押金 2000元(可退)
            2.本订单仅为客户租车预约登记，提交该订单后，客户需到门店办理具体租车手续，具体权利义务以签署的书面合同为准。
        </p>
    </div>
    <div class="right">
        <h4 style="text-align: center">费用明细</h4>
        <ul>
            <li>
                基本租车费<a id="discount"><!--优惠金额--></a>
                <div class="basicPrice">
                    <b><!--基本租车费--></b>
                    <div></div>
                </div>
                <ul class="priceDetail"><!--每日价格--></ul>
            </li>
            <li id="basic">
                基本保险费<a></a>
                <b></b>
            </li>
            <li id="counterFee">
                手续费
                <b></b>
            </li>
            <li class="differentStore">
                异店还车费
                <b>0</b>
            </li>
            <li class="yesGo" benefit_id="0">
                <c></c>
                <b></b>
            </li>
        </ul>
        <div class="submitButton">
            <span>应付总金额 ： <b id="sumPrice"></b>元</span>
            <button style="cursor: pointer">提交订单<i></i></button>
        </div>
    </div>
</div>
<!--底部-->
@include('common.home_footer')
{{--防止后退--}}
<script language="JavaScript">
    javascript:window.history.forward(1);
</script>