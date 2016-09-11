<?php echo $__env->make('common.home_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link type="text/css" rel="stylesheet" href="home/css/longRent.css">
<script type="text/javascript" src="home/js/longRent.js"></script>

<!--预定框-->
<div class="bookBox noCopy">
    <div class="book">
        <div class="bookTit">
            长租服务<a>(30天以上)</a>
        </div>
        <div class="bookBody">
            <div class="longBox">
                <!--取车城市、取车时间-->
                <span>取车城市</span>
                <span class="longTitR">取车门店</span>
                <div class="longLine1">
                    <!--取车城市-->
                    <div class="longLine1_L" id="longCity">
                        <div class="show">
                            <a>武汉市</a>
                            <div class="Arrow"></div>
                        </div>
                        <div class="city_list" id="longCityList">
                            <div class="city_list_tit">
                                <a>热门城市</a>
                                <a>旅游城市</a>
                                <a>ABCD</a>
                                <a>EFGHJ</a>
                                <a>KLMNPQ</a>
                                <a>RSTW</a>
                                <a>XYZ</a>
                                <div class="city_list_arrow"></div>
                            </div>
                            <div class="city_list_body">
                                <ul>
                                    <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>石家庄市</a></span><span><a>太原市</a></span><span><a>济南市</a></span><span><a>重庆市</a></span><span><a>哈尔滨市</a></span><span><a>辽阳市</a></span><span><a>乌鲁木齐</a></span><span><a>信阳市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>吉林市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span><span><a>福州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>西宁市</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>汉中市</a></span><span><a>汕头市</a></span><span><a>廊坊市</a></span><span><a>牡丹江市</a></span></li>
                                    <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>太原市</a></span><span><a>哈尔滨市</a></span><span><a>咸阳市</a></span><span><a>乌鲁木齐</a></span><span><a>岳阳市</a></span><span><a>泰州市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>张家界市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>厦门市</a></span><span><a>贵阳市</a></span><span><a>漳州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>秦皇岛市</a></span><span><a>西宁市</a></span><span><a>澄迈县</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>咸宁市</a></span><span><a>海口市</a></span><span><a>牡丹江市</a></span></li>
                                    <li><div class="A"><b>A</b><span><a>安康市</a></span><span><a>安阳市</a></span></div><div class="B"><b>B</b><span><a>百色市</a></span><span><a>保定市</a></span><span><a>巴音郭楞蒙古自治州</a></span></div><div class="C"><b>C</b><span><a>长沙市</a></span><span><a>重庆市</a></span><span><a>成都市</a></span><span><a>承德市</a></span><span><a>澄迈县</a></span><span><a>长治市</a></span><span><a>郴州市</a></span></div><div class="D"><b>D</b><span><a>大同市</a></span><span><a>定西市</a></span></div></li>
                                    <li><div class="E"><b>E</b><span><a>恩施市</a></span><span><a>鄂州市</a></span></div><div class="F"><b>F</b><span><a>福州市</a></span></div><div class="G"><b>G</b><span><a>广安市</a></span><span><a>贵阳市</a></span><span><a>桂林市</a></span></div><div class="H"><b>H</b><span><a>黄冈市</a></span><span><a>哈尔滨市</a></span><span><a>衡水市</a></span><span><a>汉中市</a></span><span><a>海口市</a></span><span><a>衡阳市</a></span><span><a>合肥市</a></span></div><div class="J"><b>J</b><span><a>荆州市</a></span><span><a>济南市</a></span><span><a>吉安市</a></span><span><a>晋城市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>济宁市</a></span><span><a>晋中市</a></span></div></li>
                                    <li><div class="K"><b>K</b><span><a>昆明市</a></span><span><a>凯里市</a></span></div><div class="L"><b>L</b><span><a>辽阳市</a></span><span><a>六安市</a></span><span><a>兰州市</a></span><span><a>洛阳市</a></span><span><a>聊城市</a></span><span><a>凉山彝族自治州</a></span><span><a>陇南市</a></span><span><a>廊坊市</a></span></div><div class="M"><b>M</b><span><a>茂名市</a></span><span><a>牡丹江市</a></span></div><div class="N"><b>N</b><span><a>南阳市</a></span><span><a>南充市</a></span><span><a>南平市</a></span><span><a>南宁市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span></div><div class="P"><b>P</b><span><a>平凉市</a></span><span><a>濮阳市</a></span></div><div class="Q"><b>Q</b><span><a>秦皇岛市</a></span><span><a>钦州市</a></span><span><a>青岛市</a></span><span><a>庆阳市</a></span></div></li>
                                    <li><div class="S"><b>S</b><span><a>石家庄市</a></span><span><a>邵阳市</a></span><span><a>上海市</a></span><span><a>宿迁市</a></span><span><a>上饶市</a></span><span><a>苏州市</a></span><span><a>汕头市</a></span></div><div class="T"><b>T</b><span><a>唐山市</a></span><span><a>太原市</a></span><span><a>泰州市</a></span><span><a>天水市</a></span></div><div class="W"><b>W</b><span><a>武汉市</a></span><span><a>潍坊市</a></span><span><a>乌鲁木齐</a></span><span><a>武威市</a></span><span><a>威海市</a></span><span><a>无锡市</a></span></div></li>
                                    <li><div class="X"><b>X</b><span><a>孝感市</a></span><span><a>咸阳市</a></span><span><a>信阳市</a></span><span><a>厦门市</a></span><span><a>徐州市</a></span><span><a>西宁市</a></span><span><a>咸宁市</a></span></div><div class="Y"><b>Y</b><span><a>榆林市</a></span><span><a>盐城市</a></span><span><a>岳阳市</a></span><span><a>宜春市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>玉林市</a></span><span><a>宜昌市</a></span><span><a>伊犁哈萨克自治州</a></span></div><div class="Z"><b>Z</b><span><a>郑州市</a></span><span><a>张家界市</a></span><span><a>自贡市</a></span><span><a>漳州市</a></span><span><a>湛江市</a></span><span><a>周口市</a></span></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                    <div class="longLine1_R">
                        <div class="show">
                            <a lat="30.56421" lng="114.35065" store_id="195">楚河汉街店</a>
                            <div class="Arrow"></div>
                        </div>
                        <div style="display: none;" class="store_list" id="takeStoreList">
                            <!--行政区域-->
                            <div class="area"><a class="active">武昌区</a><a>洪山区</a><a>江汉区</a><a>汉阳区</a><a>硚口区</a><a>新洲区</a><a>黄陂区</a><a>东湖高新区</a><a>江岸区</a><a>青山区</a><a>东西湖区</a></div>
                            <!--门店-->
                            <div class="store"><ul style="display: block;"><li><a class="active" store_id="195" num="0" lng="114.35065" lat="30.56421">楚河汉街店</a></li><li><a store_id="457" num="15" lng="114.306479" lat="30.545612">阅马场服务点</a></li><li><a store_id="475" num="17" lng="114.35186" lat="30.598871">徐东店</a></li><li><a store_id="488" num="19" lng="114.352848" lat="30.558644">嘉华酒店服务点</a></li><li><a store_id="489" num="20" lng="114.366829" lat="30.580985">岳家嘴服务点</a></li><li><a store_id="490" num="21" lng="114.35065" lat="30.554477">水果湖广场服务点</a></li><li><a store_id="599" num="37" lng="114.338564" lat="30.584806">湖北大学服务点</a></li></ul><ul style="display: none;"><li><a store_id="305" num="1" lng="114.402906" lat="30.51176">光谷广场便捷店</a></li><li><a store_id="462" num="16" lng="114.359115" lat="30.532536">街道口服务点</a></li><li><a store_id="491" num="22" lng="114.419888" lat="30.513326">华科正门服务点</a></li><li><a store_id="492" num="23" lng="114.443029" lat="30.511566">森林公园服务点</a></li><li><a store_id="493" num="24" lng="114.384322" lat="30.526087">武汉体院服务点</a></li></ul><ul style="display: none;"><li><a store_id="199" num="2" lng="114.284545" lat="30.586841">友谊路便捷店</a></li><li><a store_id="439" num="14" lng="114.264759" lat="30.621742">汉口火车站店</a></li></ul><ul style="display: none;"><li><a store_id="202" num="3" lng="114.215413" lat="30.564594">王家湾便捷店</a></li><li><a store_id="224" num="6" lng="114.18285" lat="30.51282">经开万达店</a></li><li><a store_id="311" num="12" lng="114.277151" lat="30.555977">钟家村店</a></li><li><a store_id="552" num="27" lng="114.211797" lat="30.557874">人信汇服务点</a></li><li><a store_id="553" num="28" lng="114.233496" lat="30.56329">七里庙服务点</a></li></ul><ul style="display: none;"><li><a store_id="203" num="4" lng="114.218521" lat="30.595325">古田四路店</a></li><li><a store_id="551" num="26" lng="114.224446" lat="30.624233">园博园服务点</a></li><li><a store_id="584" num="31" lng="114.174287" lat="30.623512">宜家购物中心服务点</a></li><li><a store_id="585" num="32" lng="114.228429" lat="30.593122">南国大武汉家装服务点</a></li><li><a store_id="587" num="34" lng="114.195777" lat="30.595385">古田桥陈家墩服务点</a></li></ul><ul style="display: none;"><li><a store_id="223" num="5" lng="114.57158" lat="30.66198">新洲阳逻店</a></li><li><a store_id="302" num="11" lng="114.809957" lat="30.836516">新洲齐安大道店</a></li></ul><ul style="display: none;"><li><a store_id="225" num="7" lng="114.325427" lat="30.707439">黄陂汉口北店</a></li><li><a store_id="229" num="9" lng="114.37635" lat="30.86983">黄陂前川欣城店</a></li></ul><ul style="display: none;"><li><a store_id="228" num="8" lng="114.42618" lat="30.46205">金融港店</a></li></ul><ul style="display: none;"><li><a store_id="298" num="10" lng="114.32499" lat="30.631003">二七轻轨站店</a></li><li><a store_id="586" num="33" lng="114.304765" lat="30.620982">解放公园店</a></li><li><a store_id="590" num="35" lng="114.314532" lat="30.657988">汉口城市广场服务点</a></li><li><a store_id="591" num="36" lng="114.327657" lat="30.649561">百步亭花园路服务点</a></li></ul><ul style="display: none;"><li><a store_id="387" num="13" lng="114.387754" lat="30.62349">青山友谊大道店</a></li><li><a store_id="487" num="18" lng="114.431271" lat="30.613033">武汉火车站服务点</a></li><li><a store_id="573" num="29" lng="114.409531" lat="30.64489">青山百货商场服务点</a></li><li><a store_id="574" num="30" lng="114.367025" lat="30.626733">奥山世纪城服务点</a></li></ul><ul style="display: none;"><li><a store_id="544" num="25" lng="114.24875" lat="30.65718">金银潭地铁站送车点</a></li></ul></div>
                            <!--门店信息-->
                            <div class="storeInfo">
                                <div>
                                    <a>地址：</a>
                                    <p class="storeAddress">武汉市武昌区中北路周家大湾楚河汉街领寓大厦广场</p>
                                </div>
                                <div>
                                    <a>营业时间：</a>
                                    <p class="storeTime">08:00—19:30</p>
                                </div>
                                <div>
                                    <a>交通路线：</a>
                                    <p class="storeWay">19; 64; 64; 530; 537; 540; 577; 581; 583; 601; 702</p>
                                </div>
                                <a class="toMap">
                                    <img src="home/images/toMap.png"><br>
                                    查看位置
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--租赁时长、用车数量-->
                <span>租赁时长</span>
                <span class="longTitR">用车数量</span>
                <div class="longLine1">
                    <!--租赁时长-->
                    <div class="longLine1_L" id="longDuration">
                        <div class="show">
                            <a>1个月</a>
                            <div class="Arrow"></div>
                        </div>
                        <div class="longDurationBox" id="longDurationBox">
                            <ul>
                                <li>1个月</li>
                                <li>2个月</li>
                                <li>3个月</li>
                                <li>4个月</li>
                                <li>5个月</li>
                                <li>6个月</li>
                                <li>7个月</li>
                                <li>8个月</li>
                                <li>9个月</li>
                                <li>10个月</li>
                                <li>11个月</li>
                                <li>1年</li>
                                <li>2年</li>
                                <li class="bor">3年</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <!--用车数量-->
                    <div class="longLine1_R" id="carNumber">
                        <input placeholder="请输入用车数量" maxlength="5" type="text">
                    </div>
                </div>

                <!--品牌-->
                <span>品牌&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="longTitR">取车时间</span>
                <div class="longLine1">
                    <div class="longLine1_L" id="brand">
                    <div class="show">
                        <a>标致</a>
                        <div class="Arrow"></div>
                    </div>
                    <div id="brandBox">
                        <ul><li><a>标致</a></li><li><a>别克</a></li><li><a>长城</a></li><li><a>大众</a></li><li><a>风神</a></li><li><a>起亚</a></li><li><a>日产</a></li><li><a>雪佛兰</a></li><li><a>雪铁龙</a></li></ul>
                    </div>
                    </div>
                     <hr>
                    
                    <!--取车时间-->
                    <div class="longLine1_R" id="longDate">
                        <a>2016-09-09</a>
                        <div class="Arrow"></div>
                        <div id="calendarLong"></div>
                    </div>
                </div>

                <!--车型-->
                <span>车型</span>
                <div class="longLine2" id="carType">
                    <div class="show">
                        <a type_id="40" brand_id="13">508 / 三厢    / 2.0L / 自动   </a>
                        <div class="Arrow"></div>
                    </div>
                    <div id="carTypeBox">
                        <ul>
                            <li><a brand_id="13" type_id="40">508 / 三厢    / 2.0L / 自动   </a></li>
                            <li><a brand_id="13" type_id="45">207 / 三厢    / 1.4L / 手动   </a></li>
                            <li><a brand_id="13" type_id="61">301 / 三厢    / 1.6L / 自动   </a></li>
                        </ul>
                    </div>
                </div>
                <!--预订按钮-->
                <button id="longBook">
                    开始预订
                    <i></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!--幻灯片-->
<div class="slide">
    <!--图片-->
    <div class="bd">
        <ul class="img">
            <li class=""><a href="#" style="background: url(home/images/long/long-ppt-1.jpg) no-repeat top center" target="_blank"></a></li>
            <li class=""><a style="background: url(home/images/long/long-ppt-2.jpg) no-repeat top center" target="_blank"></a></li>
            <li class="active"><a style="background: url(home/images/long/long-ppt-3.jpg) no-repeat top center" target="_blank"></a></li>
        </ul>
    </div>
    <!--索引-->
    <div class="hd">
        <ul class="tit"></ul>
    </div>
</div>
<!--宣传图-->
<div class="card">
    <div class="card_box">
        <div class="card1">
            <i class="icon_3 icon_31"></i>
            <h2>经济低价</h2>
            <p>
                长租打包更优惠<br>
                经济实用车型，更高性价比
            </p>
        </div>
        <div class="card2">
            <i class="icon_3 icon_32"></i>
            <h2>尊享服务</h2>
            <p>
                优先挑选新车，专业贴心服务<br>
                解决事故救援、保险、维保等麻烦
            </p>
        </div>
        <div class="card3">
            <i class="icon_3 icon_33"></i>
            <h2>租期灵活</h2>
            <p>
                多样车型可选，随用随租<br>
                定期更换新车，安全可靠
            </p>
        </div>
        <div class="card4">
            <i class="icon_3 icon_34"></i>
            <h2>按需租车</h2>
            <p>
                根据公司需要随时用车<br>
                节省公司支出，减少管理成本
            </p>
        </div>
    </div>
</div>
<!--推荐车型-->
<div class="recommend">
    <div class="recTit">
        <h3>推荐车型</h3>
        <p>长租优惠，从这里开始</p>
    </div>
    <div class="recCar">
        <div class="p1 L0">
            <img src="home/images/long/1.jpg">
            <div class="text">
                <h2>起亚 K2</h2>
                <div>
                    <span>
                        三个月租金<br><b>3600元/月</b>
                    </span>
                    <span>
                        半年租金<br><b>3300元/月</b>
                    </span>
                    <span>
                        一年租金<br><b>3100元/月</b>
                    </span>
                </div>
            </div>
        </div>
        <div class="p2">
            <img src="home/images/long/2.jpg">
            <div class="text">
                <h2>风神 S30</h2>
                <div>
                    <span>
                        三个月租金<br><b>3100元/月</b>
                    </span>
                    <span>
                        半年租金<br><b>3000元/月</b>
                    </span>
                    <span>
                        一年租金<br><b>2900元/月</b>
                    </span>
                </div>
            </div>
        </div>
        <div class="p2">
            <img src="home/images/long/3.jpg">
            <div class="text">
                <h2>雪铁龙 爱丽舍</h2>
                <div>
                    <span>
                        三个月租金<br><b>3300元/月</b>
                    </span>
                    <span>
                        半年租金<br><b>3200元/月</b>
                    </span>
                    <span>
                        一年租金<br><b>3000元/月</b>
                    </span>
                </div>
            </div>
        </div>
        <div class="p2 L0">
            <img src="home/images/long/4.jpg">
            <div class="text">
                <h2>大众 新捷达</h2>
                <div>
                    <span>
                        三个月租金<br><b>3700元/月</b>
                    </span>
                    <span>
                        半年租金<br><b>3400元/月</b>
                    </span>
                    <span>
                        一年租金<br><b>3200元/月</b>
                    </span>
                </div>
            </div>
        </div>
        <div class="p2">
            <img src="home/images/long/5.jpg">
            <div class="text">
                <h2>标致 301</h2>
                <div>
                    <span>
                        三个月租金<br><b>3700元/月</b>
                    </span>
                    <span>
                        半年租金<br><b>3400元/月</b>
                    </span>
                    <span>
                        一年租金<br><b>3200元/月</b>
                    </span>
                </div>
            </div>
        </div>
        <div class="p1">
            <img src="home/images/long/6.jpg">
            <div class="text">
                <h2>大众 新桑塔纳</h2>
                <div>
                    <span>
                        三个月租金<br><b>3800元/月</b>
                    </span>
                    <span>
                        半年租金<br><b>3500元/月</b>
                    </span>
                    <span>
                        一年租金<br><b>3200元/月</b>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--长租申请框-->
<div class="longRentApply">
    <ul class="ul1">
        <li>企业/个人名称</li>
        <li><a>*</a>联系人</li>
        <li><a>*</a>联系电话</li>
        <li>Email</li>
    </ul>
    <ul class="ul2">
        <li>
            <input maxlength="30" id="company" placeholder="请输入企业名称 或 个人名称" type="text">
        </li>
        <li>
            <input maxlength="10" id="name" placeholder="请输入联系人姓名" type="text">
        </li>
        <li>
            <input maxlength="11" id="tel" placeholder="请输入联系人手机号" type="tel">
        </li>
        <li>
            <input id="email" placeholder="请输入您的Email地址" type="email">
        </li>
    </ul>
    <button id="submit">提交信息</button>
    <div>带*的为必填项</div>
</div>
<!--门店地图查看-->
<div id="storeMap"></div>

<!-- 底部 -->
<?php echo $__env->make('common.home_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- 
<div move="ok" class="layui-layer-title" style="cursor: move;">联系信息</div>
<div style="height: 367px;" class="layui-layer-content">
    
</div>
<span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a></span> -->