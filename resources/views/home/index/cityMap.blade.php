@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/storeList.css">
<script>
    eval("var CityName = '{{ $cityName or '北京' }}'");//420100
</script>
<script type="text/javascript" src="home/js/storeList.js"></script>

<!--地图-->
<div id="map"></div>

<!--门店列表-->
<div class="BOX">
    <!--城市-->
    <div class="left">
        <p>
            <b id="city"></b><br>
            [切换城市]
        </p>
        <div class="city_list">
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
    <!--门店-->
    <div class="center store_list">
        <!--行政区域-->
        <div class="area"></div>
        <!--门店-->
        <div class="store"></div>
       <!--门店信息-->
        <div class="storeInfo">
            <h5></h5>
            <a></a>
            <p></p>
            <div id="way"></div>
        </div>
    </div>
    <!--全国地图-->
    <div class="right">
        <a href="{{ url('nationalMap') }}">
            <i class="iconMap icon_M1"></i>
            切换到全国地图
        </a>
    </div>
</div>
<!-- 租车攻略&&优惠活动 -->
<!-- <div class="activity clear">
    <div class="fl">
        <h2>租车攻略</h2>
        <ul>
            <li><a target="_blank">中秋租车生意火，租金上涨难掩消费热情</a></li>
            <li><a target="_blank">中秋节将至，武汉租车市场预订火热！</a></li>
            <li><a target="_blank">郑州租车如何更省钱？听听专业人士解答</a></li>
            <li><a target="_blank">长沙大方租车为90后提供多样租车选择</a></li>
            <li><a target="_blank">中秋遇出行高峰，自驾游计划如何顺利进行？</a></li>
            <li><a target="_blank">中秋租车享百元大礼包，提前订更便宜</a></li>
            <li><a target="_blank">教师节在即，大方为武汉便捷出行助力</a></li>
            <li><a target="_blank">高校开学季，大方租车助力便捷出行</a></li>
            <li><a target="_blank">这些车辆维修陷阱 你知道几个？</a></li>
        </ul>
        <a class="btn" href="http://www.dafang24.com/home/newslist?t_id=43">更多攻略</a>
    </div>
    <div class="fr">
        <h2>优惠活动</h2>
        <ul class="clear">
            <li>
            <img src="home/images/ad_1_3.jpg">
            <dl>
                <dt>提前预订享特价</dt>
                <dd>根据提前预订的时间不同，享受相应打折优惠，越早预订越便宜。</dd>
            </dl>
            <div class="see_it"><a href="http://www.dafang24.com/home/newsdetail/93" target="_blank">立即查看</a></div>
            </li>
            <li>
            <img src="home/images/ad_2_3.jpg">
            <dl>
                <dt>微信下单立减10元</dt>
                <dd>1.关注大方租车官方微信，新老客户通过手机端预订的订单，即可减免10元。 2.参与本活动的订单，可与其它优惠活动同享； 3.订单续租不再重复参与活动。</dd>
            </dl>
            <div class="see_it"><a href="http://phone.dafang24.com/" target="_blank">立即查看</a></div>
            </li>
            <li>
            <img src="home/images/ad_3_3.jpg">
            <dl>
                <dt>新用户首日0租金</dt>
                <dd>  1.必须关注大方租车官方微信方可参加此活动。        2.参与此活动的新会员首次预订用车，免除订单第一天车辆租金部分，基本保险费、手续费等          其他费用正常收取。       </dd>
            </dl>
            <div class="see_it"><a href="http://huodong2.dafang24.com/" target="_blank">立即查看</a></div>
            </li>
        </ul>
        <a class="btn" href="http://www.dafang24.com/home/newslist?t_id=3">更多优惠</a>
    </div>
</div> -->

<!-- 底部 -->
@include('common.home_footer')
