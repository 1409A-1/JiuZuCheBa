@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/index.css">
<script type="text/javascript" src="home/js/index.js"></script>

<!--预定框-->
<div class="bookBox noCopy">
    <div class="book">
        <div class="bookTit">
            <div class="shortRent active">
                自驾短租<a>(1-29天)</a>
            </div>
            <div class="longRent">
                优惠套餐<img src="home/images/hot.gif">
            </div>
        </div>
        <div class="bookBody">
            <!--短租-->
            <div class="shortBox">
                <!--取车城市-->
                <span>取车城市</span>
                <div class="shortCar" id="takeCar">
                    <!--取车城市-->
                    <div class="shortCity" id="takeCity">
                        <div class="show">
                            <a>北京市</a>
                            <div class="Arrow"></div>
                        </div>
                        <div class="city_list" id="takeCityList">
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
                                    <li><span><a onclick="tuijian_clik('武汉市')">武汉市</a></span><span><a onclick="tuijian_clik('长沙市')">长沙市</a></span><span><a onclick="tuijian_clik('石家庄市')">石家庄市</a></span><span><a onclick="tuijian_clik('太原市')">太原市</a></span><span><a onclick="tuijian_clik('济南市')">济南市</a></span><span><a onclick="tuijian_clik('重庆市')">重庆市</a></span><span><a onclick="tuijian_clik('哈尔滨市')">哈尔滨市</a></span><span><a onclick="tuijian_clik('辽阳市')">辽阳市</a></span><span><a onclick="tuijian_clik('乌鲁木齐')">乌鲁木齐</a></span><span><a onclick="tuijian_clik('信阳市')">信阳市</a></span><span><a onclick="tuijian_clik('南宁市')">南宁市</a></span><span><a onclick="tuijian_clik('上海市')">上海市</a></span><span><a onclick="tuijian_clik('吉林市')">吉林市</a></span><span><a onclick="tuijian_clik('南昌市')">南昌市</a></span><span><a onclick="tuijian_clik('南京市')">南京市</a></span><span><a onclick="tuijian_clik('兰州市')">兰州市</a></span><span><a onclick="tuijian_clik('福州市')">福州市</a></span><span><a onclick="tuijian_clik('成都市')">成都市</a></span><span><a onclick="tuijian_clik('苏州市')">苏州市</a></span><span><a onclick="tuijian_clik('洛阳市')">洛阳市</a></span><span><a onclick="tuijian_clik('西宁市')">西宁市</a></span><span><a onclick="tuijian_clik('青岛市')">青岛市</a></span><span><a onclick="tuijian_clik('延边朝鲜族自治州')">延边朝鲜族自治州</a></span><span><a onclick="tuijian_clik('汉中市')">汉中市</a></span><span><a onclick="tuijian_clik('汕头市')">汕头市</a></span><span><a onclick="tuijian_clik('廊坊市')">廊坊市</a></span><span><a onclick="tuijian_clik('牡丹江市')">牡丹江市</a></span></li>
                                    <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>太原市</a></span><span><a>哈尔滨市</a></span><span><a>咸阳市</a></span><span><a>乌鲁木齐</a></span><span><a>岳阳市</a></span><span><a>泰州市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>张家界市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>厦门市</a></span><span><a>贵阳市</a></span><span><a>兰州市</a></span><span><a>漳州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>秦皇岛市</a></span><span><a>西宁市</a></span><span><a>澄迈县</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>咸宁市</a></span><span><a>海口市</a></span><span><a>牡丹江市</a></span></li>
                                    <li><div class="A"><b>A</b><span><a>安康市</a></span><span><a>安阳市</a></span></div><div class="B"><b>B</b><span><a>百色市</a></span><span><a>保定市</a></span><span><a>巴音郭楞蒙古自治州</a></span></div><div class="C"><b>C</b><span><a>长沙市</a></span><span><a>重庆市</a></span><span><a>成都市</a></span><span><a>承德市</a></span><span><a>澄迈县</a></span><span><a>长治市</a></span><span><a>郴州市</a></span></div><div class="D"><b>D</b><span><a>大同市</a></span><span><a>定西市</a></span></div></li>
                                    <li><div class="E"><b>E</b><span><a>恩施市</a></span><span><a>鄂州市</a></span></div><div class="F"><b>F</b><span><a>福州市</a></span></div><div class="G"><b>G</b><span><a>广安市</a></span><span><a>贵阳市</a></span><span><a>桂林市</a></span></div><div class="H"><b>H</b><span><a>黄冈市</a></span><span><a>哈尔滨市</a></span><span><a>衡水市</a></span><span><a>汉中市</a></span><span><a>海口市</a></span><span><a>衡阳市</a></span><span><a>合肥市</a></span></div><div class="J"><b>J</b><span><a>荆州市</a></span><span><a>济南市</a></span><span><a>吉安市</a></span><span><a>晋城市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>济宁市</a></span><span><a>晋中市</a></span></div></li>
                                    <li><div class="K"><b>K</b><span><a>昆明市</a></span><span><a>凯里市</a></span></div><div class="L"><b>L</b><span><a>辽阳市</a></span><span><a>六安市</a></span><span><a>兰州市</a></span><span><a>洛阳市</a></span><span><a>聊城市</a></span><span><a>凉山彝族自治州</a></span><span><a>陇南市</a></span><span><a>廊坊市</a></span></div><div class="M"><b>M</b><span><a>茂名市</a></span><span><a>牡丹江市</a></span></div><div class="N"><b>N</b><span><a>南阳市</a></span><span><a>南充市</a></span><span><a>南平市</a></span><span><a>南宁市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span></div><div class="P"><b>P</b><span><a>平凉市</a></span><span><a>濮阳市</a></span></div><div class="Q"><b>Q</b><span><a>秦皇岛市</a></span><span><a>钦州市</a></span><span><a>青岛市</a></span><span><a>庆阳市</a></span></div></li>
                                    <li><div class="S"><b>S</b><span><a>石家庄市</a></span><span><a>邵阳市</a></span><span><a>上海市</a></span><span><a>宿迁市</a></span><span><a>上饶市</a></span><span><a>苏州市</a></span><span><a>汕头市</a></span></div><div class="T"><b>T</b><span><a>唐山市</a></span><span><a>太原市</a></span><span><a>泰州市</a></span><span><a>天水市</a></span></div><div class="W"><b>W</b><span><a>武汉市</a></span><span><a>潍坊市</a></span><span><a>乌鲁木齐</a></span><span><a>武威市</a></span><span><a>威海市</a></span><span><a>无锡市</a></span></div></li>
                                    <li><div class="X"><b>X</b><span><a>孝感市</a></span><span><a>咸阳市</a></span><span><a>信阳市</a></span><span><a>厦门市</a></span><span><a>徐州市</a></span><span><a>西宁市</a></span><span><a>咸宁市</a></span></div><div class="Y"><b>Y</b><span><a>榆林市</a></span><span><a>盐城市</a></span><span><a>岳阳市</a></span><span><a>宜春市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>玉林市</a></span><span><a>宜昌市</a></span><span><a>伊犁哈萨克自治州</a></span></div><div class="Z"><b>Z</b><span><a>郑州市</a></span><span><a>张家界市</a></span><span><a>自贡市</a></span><span><a>漳州市</a></span><span><a>湛江市</a></span></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--取车门店-->
                    <div class="shortStore" id="takeStore">
                        <div class="show">
                            <a>请选择门店</a>
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
                                <a class="toMap">
                                    <img src="home/images/toMap.png"><br>
                                    查看位置
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--还车城市-->
                <span>还车城市</span>
                <div class="shortCar" id="returnCar">
                    <!--还车城市-->
                    <div class="shortCity" id="returnCity">
                        <div class="show">
                            <a>北京市</a>
                            <div class="Arrow"></div>
                        </div>
                        <div class="city_list" id="returnCityList">
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
                                    <li><span><a onclick="tuijian_clik('武汉市')">武汉市</a></span><span><a onclick="tuijian_clik('长沙市')">长沙市</a></span><span><a onclick="tuijian_clik('石家庄市')">石家庄市</a></span><span><a onclick="tuijian_clik('太原市')">太原市</a></span><span><a onclick="tuijian_clik('济南市')">济南市</a></span><span><a onclick="tuijian_clik('重庆市')">重庆市</a></span><span><a onclick="tuijian_clik('哈尔滨市')">哈尔滨市</a></span><span><a onclick="tuijian_clik('辽阳市')">辽阳市</a></span><span><a onclick="tuijian_clik('乌鲁木齐')">乌鲁木齐</a></span><span><a onclick="tuijian_clik('信阳市')">信阳市</a></span><span><a onclick="tuijian_clik('南宁市')">南宁市</a></span><span><a onclick="tuijian_clik('上海市')">上海市</a></span><span><a onclick="tuijian_clik('吉林市')">吉林市</a></span><span><a onclick="tuijian_clik('南昌市')">南昌市</a></span><span><a onclick="tuijian_clik('南京市')">南京市</a></span><span><a onclick="tuijian_clik('兰州市')">兰州市</a></span><span><a onclick="tuijian_clik('福州市')">福州市</a></span><span><a onclick="tuijian_clik('成都市')">成都市</a></span><span><a onclick="tuijian_clik('苏州市')">苏州市</a></span><span><a onclick="tuijian_clik('洛阳市')">洛阳市</a></span><span><a onclick="tuijian_clik('西宁市')">西宁市</a></span><span><a onclick="tuijian_clik('青岛市')">青岛市</a></span><span><a onclick="tuijian_clik('延边朝鲜族自治州')">延边朝鲜族自治州</a></span><span><a onclick="tuijian_clik('汉中市')">汉中市</a></span><span><a onclick="tuijian_clik('汕头市')">汕头市</a></span><span><a onclick="tuijian_clik('廊坊市')">廊坊市</a></span><span><a onclick="tuijian_clik('牡丹江市')">牡丹江市</a></span></li>
                                    <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>太原市</a></span><span><a>哈尔滨市</a></span><span><a>咸阳市</a></span><span><a>乌鲁木齐</a></span><span><a>岳阳市</a></span><span><a>泰州市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>张家界市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>厦门市</a></span><span><a>贵阳市</a></span><span><a>兰州市</a></span><span><a>漳州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>秦皇岛市</a></span><span><a>西宁市</a></span><span><a>澄迈县</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>咸宁市</a></span><span><a>海口市</a></span><span><a>牡丹江市</a></span></li>
                                    <li><div class="A"><b>A</b><span><a>安康市</a></span><span><a>安阳市</a></span></div><div class="B"><b>B</b><span><a>百色市</a></span><span><a>保定市</a></span><span><a>巴音郭楞蒙古自治州</a></span></div><div class="C"><b>C</b><span><a>长沙市</a></span><span><a>重庆市</a></span><span><a>成都市</a></span><span><a>承德市</a></span><span><a>澄迈县</a></span><span><a>长治市</a></span><span><a>郴州市</a></span></div><div class="D"><b>D</b><span><a>大同市</a></span><span><a>定西市</a></span></div></li>
                                    <li><div class="E"><b>E</b><span><a>恩施市</a></span><span><a>鄂州市</a></span></div><div class="F"><b>F</b><span><a>福州市</a></span></div><div class="G"><b>G</b><span><a>广安市</a></span><span><a>贵阳市</a></span><span><a>桂林市</a></span></div><div class="H"><b>H</b><span><a>黄冈市</a></span><span><a>哈尔滨市</a></span><span><a>衡水市</a></span><span><a>汉中市</a></span><span><a>海口市</a></span><span><a>衡阳市</a></span><span><a>合肥市</a></span></div><div class="J"><b>J</b><span><a>荆州市</a></span><span><a>济南市</a></span><span><a>吉安市</a></span><span><a>晋城市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>济宁市</a></span><span><a>晋中市</a></span></div></li>
                                    <li><div class="K"><b>K</b><span><a>昆明市</a></span><span><a>凯里市</a></span></div><div class="L"><b>L</b><span><a>辽阳市</a></span><span><a>六安市</a></span><span><a>兰州市</a></span><span><a>洛阳市</a></span><span><a>聊城市</a></span><span><a>凉山彝族自治州</a></span><span><a>陇南市</a></span><span><a>廊坊市</a></span></div><div class="M"><b>M</b><span><a>茂名市</a></span><span><a>牡丹江市</a></span></div><div class="N"><b>N</b><span><a>南阳市</a></span><span><a>南充市</a></span><span><a>南平市</a></span><span><a>南宁市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span></div><div class="P"><b>P</b><span><a>平凉市</a></span><span><a>濮阳市</a></span></div><div class="Q"><b>Q</b><span><a>秦皇岛市</a></span><span><a>钦州市</a></span><span><a>青岛市</a></span><span><a>庆阳市</a></span></div></li>
                                    <li><div class="S"><b>S</b><span><a>石家庄市</a></span><span><a>邵阳市</a></span><span><a>上海市</a></span><span><a>宿迁市</a></span><span><a>上饶市</a></span><span><a>苏州市</a></span><span><a>汕头市</a></span></div><div class="T"><b>T</b><span><a>唐山市</a></span><span><a>太原市</a></span><span><a>泰州市</a></span><span><a>天水市</a></span></div><div class="W"><b>W</b><span><a>武汉市</a></span><span><a>潍坊市</a></span><span><a>乌鲁木齐</a></span><span><a>武威市</a></span><span><a>威海市</a></span><span><a>无锡市</a></span></div></li>
                                    <li><div class="X"><b>X</b><span><a>孝感市</a></span><span><a>咸阳市</a></span><span><a>信阳市</a></span><span><a>厦门市</a></span><span><a>徐州市</a></span><span><a>西宁市</a></span><span><a>咸宁市</a></span></div><div class="Y"><b>Y</b><span><a>榆林市</a></span><span><a>盐城市</a></span><span><a>岳阳市</a></span><span><a>宜春市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>玉林市</a></span><span><a>宜昌市</a></span><span><a>伊犁哈萨克自治州</a></span></div><div class="Z"><b>Z</b><span><a>郑州市</a></span><span><a>张家界市</a></span><span><a>自贡市</a></span><span><a>漳州市</a></span><span><a>湛江市</a></span></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--还车门店-->
                    <div class="shortStore" id="returnStore">
                        <div class="show">
                            <a>请选择门店</a>
                            <div class="Arrow"></div>
                        </div>
                        <div class="store_list" id="returnStoreList">
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
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!--取车时间-->
                <span>取车时间</span>
                <div class="shortTime" id="takeTime">
                    <div class="shortDate" id="takeDate">
                        <a id="startDate">2016-09-01</a>
                        <div class="Arrow"></div>
                        <span id="takeWeek">明天</span>
                    </div>
                    <div class="shortHour" id="takeHour">
                        <div class="show">
                            <a id="startHour">10:00</a>
                            <div class="Arrow"></div>
                        </div>
                        <!--营业时间-->
                        <div class="hourBox"></div>
                    </div>
                </div>

                <!--还车时间-->
                <span>还车时间</span>
                <div class="shortTime" id="returnTime">
                    <div class="shortDate" id="returnDate">
                        <a id="endDate">2016-09-03</a>
                        <div class="Arrow"></div>
                        <span id="duration">2天</span>
                    </div>
                    <div class="shortHour" id="returnHour">
                        <div class="show">
                            <a id="endHour">10:00</a>
                            <div class="Arrow"></div>
                        </div>
                        <div class="hourBox"></div>
                    </div>
                </div>


                <form id="fm" method="post" action="/Home/doom" onsubmit="return check();">
                    <input id="take_id" name="take_id" type="hidden">
                    <input id="week" name="takeWeek" type="hidden">
                    <input id="startHours1" name="startHours1" type="hidden">
                    <input id="endHours1" name="endHours1" type="hidden">
                    <input id="return_id" name="return_id" type="hidden">
                    <input id="returnWeek" name="returnWeek" type="hidden">
                    <input id="startHours2" name="startHours2" type="hidden">
                    <input id="endHours2" name="endHours2" type="hidden">
                    <input id="start_time" name="start_time" type="hidden">
                    <input id="stop_time" name="stop_time" type="hidden">
                    <input id="begin_date" name="begin_date" type="hidden">
                    <input id="end_date" name="end_date" type="hidden">
                <!--预订按钮-->
                <input id="startBook" value="开始预订" onclick="return yuding();" type="submit">
                </form>
            </div>
            <!--优惠套餐-->
            <div class="setMeal">
                <div>
                    <div class="sM_L">
                        <b>3</b>天<br>
                        打包套餐
                    </div>
                    <div class="hr"></div>
                    <div class="sM_R">
                        <a>9</a>折起
                        <button class="sM_arr">立即<br>预订</button>
                    </div>
                </div>
                <div>
                    <div class="sM_L">
                        <b>4-6</b>天<br>
                        打包套餐
                    </div>
                    <div class="hr"></div>
                    <div class="sM_R">
                        <a>8</a>折起
                        <button class="sM_arr">立即<br>预订</button>
                    </div>
                </div>
                <div>
                    <div class="sM_L">
                        <b>7天+</b><br>
                        打包套餐
                    </div>
                    <div class="hr"></div>
                    <div class="sM_R">
                        <a>7</a>折起
                        <button class="sM_arr">立即<br>预订</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--幻灯片-->
<div class="slide">
    <!--图片-->
    <div class="bd">
        <ul class="img">
            <li><a href="#" style="background:url(home/images/123.jpg);background-size:100% 100%; " target="_blank"></a></li>
            <li><a href="#" style="background:url(home/images/123.jpg);background-size:100% 100%; " target="_blank"></a></li>
            <li><a href="#" style="background:url(home/images/123.jpg);background-size:100% 100%; " target="_blank"></a></li>
            <li><a href="#" style="background:url(home/images/123.jpg);background-size:100% 100%; " target="_blank"></a></li>
        </ul>
    </div>
    <!--索引-->
    <div class="hd">
        <ul class="tit">
        </ul>
    </div>
</div>
<!--宣传图-->
<div class="card">
    <div class="card_box">
        <div class="card1">
            <h2>互联网连锁租车</h2>
            <span class="icon icon11"></span>
            <p>比传统租车便宜30%</p>
            <i class="icon icon1"></i>
        </div>
        <div class="card2">
            <h2>门店数量全国前三</h2>
            <span class="icon icon12"></span>
            <p>遍布100多座城市</p>
            <i class="icon icon2"></i>
        </div>
        <div class="card3">
            <h2>连锁标准化服务</h2>
            <span class="icon icon13"></span>
            <p>安全更靠谱</p>
            <i class="icon icon3"></i>
        </div>
        <div class="card4">
            <h2>100%车险全保</h2>
            <span class="icon icon14"></span>
            <p>出行无忧</p>
            <i class="icon icon4"></i>
        </div>
    </div>
</div>
<!--推荐车型-->
<div class="recommendBox">
    <div class="recommend">
        <div class="recTit">
            <a>推荐车型</a>
            <div class="hotCity">
                <i class="icon icon_location1"></i>
                <b>北京市</b>
                <div class="arrowR"></div>
                <!--热门城市-->
                <div class="hotCityList">
                    <div><span><a onclick="tuijian_clik('武汉市')">武汉市</a></span><span><a onclick="tuijian_clik('长沙市')">长沙市</a></span><span><a onclick="tuijian_clik('石家庄市')">石家庄市</a></span><span><a onclick="tuijian_clik('太原市')">太原市</a></span><span><a onclick="tuijian_clik('济南市')">济南市</a></span><span><a onclick="tuijian_clik('重庆市')">重庆市</a></span><span><a onclick="tuijian_clik('哈尔滨市')">哈尔滨市</a></span><span><a onclick="tuijian_clik('辽阳市')">辽阳市</a></span><span><a onclick="tuijian_clik('乌鲁木齐')">乌鲁木齐</a></span><span><a onclick="tuijian_clik('信阳市')">信阳市</a></span><span><a onclick="tuijian_clik('南宁市')">南宁市</a></span><span><a onclick="tuijian_clik('上海市')">上海市</a></span><span><a onclick="tuijian_clik('吉林市')">吉林市</a></span><span><a onclick="tuijian_clik('南昌市')">南昌市</a></span><span><a onclick="tuijian_clik('南京市')">南京市</a></span><span><a onclick="tuijian_clik('兰州市')">兰州市</a></span><span><a onclick="tuijian_clik('福州市')">福州市</a></span><span><a onclick="tuijian_clik('成都市')">成都市</a></span><span><a onclick="tuijian_clik('苏州市')">苏州市</a></span><span><a onclick="tuijian_clik('洛阳市')">洛阳市</a></span><span><a onclick="tuijian_clik('西宁市')">西宁市</a></span><span><a onclick="tuijian_clik('青岛市')">青岛市</a></span><span><a onclick="tuijian_clik('延边朝鲜族自治州')">延边朝鲜族自治州</a></span><span><a onclick="tuijian_clik('汉中市')">汉中市</a></span><span><a onclick="tuijian_clik('汕头市')">汕头市</a></span><span><a onclick="tuijian_clik('廊坊市')">廊坊市</a></span><span><a onclick="tuijian_clik('牡丹江市')">牡丹江市</a></span></div>
                </div>
            </div>
        </div>
        <div class="recCar"><div><div class="recCarBox"><div class="carImg"><div class="noImg"></div></div><a href="http://www.dafang24.com/home/doom" class="button">查看其他车型</a></div></div></div>
    </div>
</div><!--其他-->
<div class="other">
    <div class="oBox1">
        <!--优惠活动-->
        <div class="discount">
            <a class="o_tit">优惠活动</a>
            <div class="discountBox oBox2">
                <ul>

                            <li>
                            <a href="http://www.dafang24.com/home/newsdetail/93" target="_blank">
                            <img src="home/images/20160122055927177.jpg">
                            <div>早订更省钱，提前预订享特价！</div>
                            </a>
                            </li>
                            <li>
                            <a href="http://phone.dafang24.com/" target="_blank">
                            <img src="home/images/20160118080407266.jpg">
                            <div>微信下单立减10元</div>
                            </a>
                            </li>
                            <li class="active">
                            <a href="http://www.dafang24.com/home/newsdetail/1533" target="_blank">
                            <img src="home/images/20160824094140057.jpg">
                            <div>节假日不涨价！长租最划算！</div>
                            </a>
                            </li>
                </ul>
            </div>
        </div>
        <!--附近门店-->
        <div class="around">
            <a class="o_tit">附近门店</a>
            <div class="aroundBox oBox2">
                <div id="map"></div>
                <a class="moreStore" href="citymap">更多门店</a>
                <div class="aroundStore">
                    <a>当前城市：<b>北京市</b></a>
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--大方新闻-->
        <div class="news1">
            <a class="o_tit">大方新闻</a>
            <div class="news1Box oBox2">

                    <a href="http://www.dafang24.com/Home/NewsDetail/1117" target="_blank">
                    <div class="news1_L">
                        <img src="home/images/20160119101501966.jpg">
                        <div>大方租车A轮融资新闻发布会</div>
                    </div>
                    </a>
                
                <div class="news1_R">

                        <div>
                            <a href="http://www.dafang24.com/home/newsdetail/1278" target="_blank">
                            <img src="home/images/20160118074532813.jpg">
                            <div> 长江日报</div>
                            </a>
                        </div>
                         <div style="margin: 3px 0">
                            <a href="http://www.dafang24.com/home/newsdetail/1268" target="_blank">
                            <img src="home/images/20160118074546907.jpg">
                            <div> 第一财经</div>
                            </a>
                        </div>
                        <div>
                            <a href="http://www.dafang24.com/home/newsdetail/1284" target="_blank">
                            <img src="home/images/20160118074603970.jpg">
                            <div> 中国新闻网</div>
                            </a>
                        </div>
                </div>
            </div>
        </div>
        <div class="news2">
            <a>新闻资讯</a>
            <div class="news2Box">
                   <div>
                    <a href="http://www.dafang24.com/home/newsdetail/1534" target="_blank">迎中秋，大方租车郑州威海安徽三店同开业</a>
                    <span>2016-08-30</span>
                   </div> 
                   <div>
                    <a href="http://www.dafang24.com/home/newsdetail/1531" target="_blank">大方租车宜昌西陵店震撼开业</a>
                    <span>2016-08-12</span>
                   </div> 
                   <div>
                    <a href="http://www.dafang24.com/home/newsdetail/1530" target="_blank">大方租车南阳泰山路店开业在即</a>
                    <span>2016-08-10</span>
                   </div> 
                   <div>
                    <a href="http://www.dafang24.com/home/newsdetail/1526" target="_blank">大方租车衡阳解放大道店震撼开业</a>
                    <span>2016-08-05</span>
                   </div> 
                   <div>
                    <a href="http://www.dafang24.com/home/newsdetail/1517" target="_blank">喜迎大方租车甘肃陇南武都火车站店开业</a>
                    <span>2016-07-30</span>
                   </div> 
                   <div>
                    <a href="http://www.dafang24.com/home/newsdetail/1509" target="_blank">大方租车昆明子君店隆重开业</a>
                    <span>2016-07-26</span>
                   </div> 
            </div>
        </div>
        <!--租车体验-->
        <div class="experience1">
            <a class="o_tit">大方用户与您分享不同的租车体验</a>
            <div class="experience1Box oBox2">
                <div class="evaluate1">
                    <img src="home/images/comment.jpg">
                    <div>
                        <h4>致力于成为中国最受欢迎的</h4>
                        <p>
                            互联网连锁租车平台<br>
                            让您体验便宜又安全的租车<br>
                            分享每一个用户的真实评论<br>
                        </p>
                    </div>
                </div>
                <div class="cityShow">
                    <img src="home/images/store.png">
                </div>
            </div>
        </div>
        <div class="experience2">
            <ul class="evaluate2">
                <li>
                    <div class="photo icon_user icon_user3"></div>
                    <div class="evaluate2_body">
                        <a class="name">张先生</a>
                        <span class="order">订单号：<a>DC*********03</a></span>
                        <p>
                            很好，第二次租了，店长特別好，车辆很干净，提前预订有活动，租车价格很便宜，比较满意的一次体验，下次还会来租。
                        </p>
                        <span class="address">
                            <i class="icon icon_location2"></i>
                            <a>湖北省武汉市</a>
                        </span>
                        <a class="time">2016-01-12</a>
                    </div>
                </li>
            </ul>
        </div>
        <!--城市列表-->
        @include('common.home_city_list')
    </div>
</div>
<form id="fmtuijian" method="post" action="/Home/doom">
   <input id="shop_id" name="shop_id" type="hidden">
   <input id="class_id" name="class_id" type="hidden">
   <input id="StartDateTime" name="StartDateTime" type="hidden">
   <input id="EndDateTime" name="EndDateTime" type="hidden">
</form>
{{--<div class="footTop"></div>--}}
{{--<!--广告图-->--}}
{{--<div style="left: -100%;" class="Advertisement">--}}
    {{--<div>--}}
        {{--<div class="AdvertisementExit"></div>--}}
    {{--</div>--}}
    {{--<img style="left: 0px;" src="home/images/advertisement1.png">--}}
{{--</div>--}}
{{--<!--门店地图查看-->--}}
{{--<div id="storeMap"></div>--}}

<!--底部-->
@include('common.home_footer')

<script>
    //预订按钮
    function yuding() {
        if (Duration($("#startDate").html(), $("#startHour").html(), $("#endDate").html(), $("#endHour").html())) {
            setShortInfo();
            return true;
        } else {
            return false;
        }
    };

    function check() {
        return true;
    }

    //短租预订信息存储
    function setShortInfo() {
       var take_id = $("#takeStore").find(".show a").attr("store_id");
       var takeWeek = $("#takeWeek").html();
       var startHours1 = $("#takeHour").find(".hourBox").attr("startHours");
       var endHours1 = $("#takeHour").find(".hourBox").attr("endHours");

       var return_id = $("#returnStore").find(".show a").attr("store_id");
       var returnWeek = $("#duration").html();
       var startHours2 = $("#returnHour").find(".hourBox").attr("startHours");
       var endHours2 = $("#returnHour").find(".hourBox").attr("endHours");

       var start_time = $("#startDate").html() + " " + $("#takeHour").find(".show a").html() + ":00";
           start_time = date_format(start_time, "yyyy-MM-dd HH:mm:ss");
       var stop_time = $("#endDate").html() + " " + $("#returnHour").find(".show a").html() + ":00";
           stop_time = date_format(stop_time, "yyyy-MM-dd HH:mm:ss");
       var end_date = date_adddays(stop_time, 7);
           end_date = date_format(end_date, "yyyy-MM-dd HH:mm:ss");

       var ts = date_subtract(new Date(), start_time);//提前预订 多长时间
       var begin_date;
       if (ts.totaldays < 7) {
            begin_date = date_format(new Date(), "yyyy-MM-dd HH:mm:ss");
       }
       else {
            begin_date = date_format(date_adddays(start_time, -1), "yyyy-MM-dd HH:mm:ss");
       }
       $("#take_id").val(take_id);
       $("#week").val(takeWeek);
       $("#startHours1").val(startHours1);
       $("#endHours1").val(endHours1);
       $("#return_id").val(return_id);
       $("#returnWeek").val(returnWeek);
       $("#startHours2").val(startHours2);
       $("#endHours2").val(endHours2);
       $("#start_time").val(start_time);
       $("#stop_time").val(stop_time);
       $("#begin_date").val(begin_date);
       $("#end_date").val(end_date);
    }
</script>