@include('common.home_header')
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
                            <a></a>
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
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="longLine1_R">
                        <div class="show">
                            <a lat="" lng="" store_id=""></a>
                            <div class="Arrow"></div>
                        </div>
                        <div class="store_list" id="takeStoreList">
                            <!--行政区域-->
                            <div class="area"></div>
                            <!--门店-->
                            <div class="store"></div>
                            <!--门店信息-->
                            <div class="storeInfo">
                                <div>
                                    <a>地址：</a>
                                    <p class="storeAddress"></p>
                                </div>
                                <div>
                                    <a>营业时间：</a>
                                    <p class="storeTime"></p>
                                </div>
                                <div>
                                    <a>交通路线：</a>
                                    <p class="storeWay"></p>
                                </div>
                                <a out_in="" storeid="" class="toMap">
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
                            <a></a>
                            <div class="Arrow"></div>
                        </div>
                        <div id="brandBox">
                            <ul></ul>
                        </div>
                    </div>
                    <hr>
                    
                    <!--取车时间-->
                    <div class="longLine1_R" id="longDate">
                        <a></a>
                        <div class="Arrow"></div>
                        <div id="calendarLong"></div>
                    </div>
                </div>

                <!--车型-->
                <span>车型</span>
                <div class="longLine2" id="carType">
                    <div class="show">
                        <a></a>
                        <div class="Arrow"></div>
                    </div>
                    <div id="carTypeBox">
                        <ul></ul>
                    </div>
                </div>
                <!--预订按钮-->
                <button id="longBook" style="cursor: pointer">
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
        <li><a>*</a> 联系人</li>
        <li><a>*</a> 联系电话</li>
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
@include('common.home_footer')

<script type="text/javascript">
$("#submit").click(function () {
    var company = $("#company"),
        name = $("#name"),
        tel = $("#tel"),
        email = $("#email"),
        nameReg = /^([\u4e00-\u9fa5]+|([a-z]+\s?)+)$/,
        telReg = /^0?(13[0-9]|14[0-9]|15[0-9]|16[0-9]|17[0-9]|18[0-9]|19[0-9])[0-9]{8}$/,
        city = $("#longCity").find(".show a").html(),
        date = $("#longDate").find("a").html(),
        duration = $("#longDuration").find(".show a").html(),
        carNum = $("#carNumber").find("input").val(),
        type_id = $("#carType").find(".show a").attr("type_id"),
        car_brand = $('#brand').find(".show a").attr("brand_id");
        
    if (name.val() == '') {
        name.focus();
        layer.tips('姓名不能为空', '#submit', { tips: [3, '#0FA6D8'] });
    } else {
        if (nameReg.test(name.val())) {
            if (tel.val() == '') {
                tel.focus();
                layer.tips('手机号不能为空', '#submit', { tips: [3, '#0FA6D8'] });
            } else {
                if (telReg.test(tel.val())) {
                    save(name.val(), tel.val(), city, duration, carNum, type_id, date, car_brand);
                } else {
                    tel.focus();
                    layer.tips('手机号格式不正确', '#submit', { tips: [3, '#0FA6D8'] });
                }
            }
        } else {
            name.focus();
            layer.tips('姓名请输入中文', '#submit', { tips: [3, '#0FA6D8'] });
        }
    }
});
</script>
