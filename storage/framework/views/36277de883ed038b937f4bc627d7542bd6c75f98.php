<?php echo $__env->make('common.home_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link type="text/css" rel="stylesheet" href="home/css/submitOrder.css">
<script>
    eval('var data = ' + '<?php echo $data; ?>');
</script>
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
        <h4>确认订单信息<a href="<?php echo e(url('driving')); ?>">修改订单信息</a></h4>
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
                    <button class="active">
                        到店支付
                        <div><div>&radic;</div></div>
                    </button>
                    <button>
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
        <!--发票-->
        <div class="invoice">
            <div class="check"><a>&radic;</a></div>优惠券
            <div class="invoiceInfo">
                <!--发票类型-->
                <ul>
                    <li class="active">普通发票</li>
                    <li>增值税发票</li>
                </ul>
                <!--普通发票-->
                <table class="invoice1">
                    <tr>
                        <td class="td1">发票抬头 :</td>
                        <td><input type="text"></td>
                    </tr>
                </table>
                <!--增值税发票-->
                <table class="invoice2">
                    <tr>
                        <td class="td1">单位名称 :</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td class="td1">纳税人识别号 :</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td class="td1">注册地址 :</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td class="td1">注册电话 :</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td class="td1">开户银行 :</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td class="td1">银行账号 :</td>
                        <td><input type="text"></td>
                    </tr>
                </table>
                <!--保存 或 取消-->
                <div>
                    <button id="saveInvoice">保存发票信息</button>
                    <button id="exitInvoice">取消</button><br/>
                    温馨提示：开票金额中不包括优惠金额部分
                </div>
            </div>
        </div>
        <!--提示-->
        <p class="prompt">
            超时计费：<br/>
            1.非经大方租车书面同意，本车不得续租。到期未还车辆，除需正常支付租金外，您还需按超期部分租金的300%支付违约金，并且大方租车有权强行收回车辆。<br/>
            2.超时4小时以上，按一天计费。不足4小时（含），按每小时50元收费。<br/><br/>
            温馨提示：<br/>
            1.本订单不限公里数, 超时费 30 元/小时, 预授权3000元(可退), 违章押金 2000元(可退)
            2.本订单仅为客户租车预约登记，提交该订单后，客户需到门店办理具体租车手续，具体权利义务以签署的书面合同为准。
            超时计费：<br/>
            1.非经大方租车书面同意，本车不得续租。到期未还车辆，除需正常支付租金外，您还需按超期部分租金的300%支付违约金，并且大方租车有权强行收回车辆。<br/>
            2.超时4小时以上，按一天计费。不足4小时（含），按每小时50元收费。<br/><br/>
            温馨提示：<br/>
            1.本订单不限公里数, 超时费 30 元/小时, 预授权3000元(可退), 违章押金 2000元(可退)
            2.本订单仅为客户租车预约登记，提交该订单后，客户需到门店办理具体租车手续，具体权利义务以签署的书面合同为准。
        </p>
    </div>
    <div class="right">
        <h4>费用明细</h4>
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
            <li class="childSeat">
                儿童座椅<a></a>
                <b></b>
            </li>
            <li class="yesGo">
                不计免赔<a></a>
                <b></b>
            </li>
        </ul>
        <div class="submitButton">
            <span>应付总金额 ： <b id="sumPrice"></b>元</span>
            <button>提交订单<i></i></button>
        </div>
    </div>
</div>
<!--底部-->
<?php echo $__env->make('common.home_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>