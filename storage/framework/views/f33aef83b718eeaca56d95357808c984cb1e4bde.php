<?php echo $__env->make('common.home_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    var shopID = "1";
    var StartDateTime = ""+" 10:00";
    var EndDateTime = "" + " 10:00";
    var carID = "";
    var IN_TYPE = 0;
    /*
     IN_TYPE
       0 : 直接进入  预订
       1 : 首页进入  预订
       2 : 套餐进入  预订
       3 : 门店进入  预订
    */
    var take_id, takeWeek, startHours1, endHours1, return_id, returnWeek, startHours2, endHours2, start_time, stop_time, begin_date, end_date;
    take_id = "";
    takeWeek = "";
    startHours1 = "";
    endHours1 = "";
    return_id = "";
    returnWeek = "";
    startHours2 = "";
    endHours2 = "";
    start_time = "";
    stop_time = "";
    begin_date = "";
    end_date = "";
    var autoclass_list_ = [];
    var offer_list_ = [];
    var order_info_;
</script>

<link type="text/css" rel="stylesheet" href="home/css/shortRent.css">
<script type="text/javascript" src="home/js/shortRent.js"></script>
<script type="text/javascript" src="home/js/linq.js"></script>
<script type="text/javascript" src="home/js/special_offers.js"></script>

<!--导航标题-->
<div class="title">
    <div class="titleL">当前位置：短租自驾 &gt; 选择车型</div>
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
            <li class="dns">提交订单</li>
            <li class="dns">订单完成</li>
        </ul>
    </div>
</div>
<!--预定框-->
<div class="bookBox noCopy">
    <!--预订按钮-->
    <button id="startBook">立即选车</button>
    <!--取车-->
    <div class="take">
        取车门店
        <!--城市-->
        <div class="shortCity" id="takeCity">
            <div class="show">
                <a></a>
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
        <hr>
        <!--门店-->
        <div class="shortStore" id="takeStore">
            <div class="show">
                <a store_id=""></a>
                <div class="Arrow"></div>
            </div>
            <div class="store_list" id="takeStoreList">
                <!--行政区域-->
                <div class="area"></div>
                <!--门店-->
                <div class="store"><ul></ul></div>
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
        取车时间
        <div class="shortDate" id="takeDate">
            <i></i>
            <a id="startDate"></a>
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
    <!--还车-->
    <div class="return">
        还车门店
        <!--城市-->
        <div class="shortCity" id="returnCity">
            <div class="show">
                <a></a>
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
        <hr>
        <!--门店-->
        <div class="shortStore" id="returnStore">
            <div class="show">
                <a store_id=""></a>
                <div class="Arrow"></div>
            </div>
            <div class="store_list" id="returnStoreList">
                <!--行政区域-->
                <div class="area"></div>
                <!--门店-->
                <div class="store"><ul></ul></div>
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
        还车时间
        <div class="shortDate" id="returnDate">
            <i></i>
            <a id="endDate"></a>
            <div class="Arrow"></div>
            <span id="duration">2天</span>
        </div>
        <div class="shortHour" id="returnHour">
            <div class="show">
                <a id="endHour">10:00</a>
                <div class="Arrow"></div>
            </div>
            <!--营业时间-->
            <div class="hourBox"></div>
        </div>
    </div>
</div>
<!--筛选-->
<div class="filter noCopy">
    <div class="type" num="0">
        <b>类型：</b>
        <a class="active">全部</a>
        <?php foreach($type as $v): ?>
        <a><?php echo e($v['type_name']); ?></a>
        <?php endforeach; ?>
        <a>其他</a>
    </div>
    <div class="brand" num="0">
        <b>品牌：</b>
        <a class="active">全部</a>
        <span></span>
    </div>
    <div class="price" num="0">
        <b>价格：</b>
        <a class="active">全部</a>
        <a>￥0-￥150</a>
        <a>￥150-￥300</a>
        <a>￥300-￥500</a>
        <a>￥500以上</a>
    </div>
</div>
<!--车辆-->
<div class="carBox">
    <!--车型列表-->
    <div class="carBoxL noCopy">
        <div class="sort">
            <ul>
                <li class="active">默认排序</li>
                <li>只看可租车型</li>
            </ul>
            <span>
                共 <b id="carNum">0</b> 种可租车型
            </span>
        </div>
        <ul class="carList">
        </ul>
       <div class="Prompt">
            <!--加载提示-->
            <div class="load">
                <img src="home/images/car.gif">
                正在为您挑选车型，请稍后...
            </div>
            <!--筛选无车型提示-->
            <div class="noCar">
                没有更多车型...
            </div>
        </div>
    </div>
    <!--门店信息 优惠活动-->
    <div class="carBoxR">
        <!--地图-->
        <div id="map"></div>
        <!--门店信息-->
        <div class="store_info">
            <div class="carInfoTit active" id="takeCarTit">取车</div>
            <div class="carInfoTit" id="returnCarTit">还车</div>
            <hr>
            <div class="carInfo" id="takeCarInfo">
                <h4>楚河汉街店</h4>
                <p>
                    <a>取车地址：</a>
                    <span id="takeAddress">武汉市武昌区中北路周家大湾楚河汉街领寓大厦广场</span>
                </p>
                <p>
                    <a>交通路线：</a>
                    <span id="takeWay">19; 64; 64; 530; 537; 540; 577; 581; 583; 601; 702</span>
                </p>
                <div class="evaluate">
                    <a href="http://www.dafang24.com/home/appraise/195" id="takeEva">1385条评论</a>
                    <i class="icon_eva icon_eva5 icon_eva4"></i>
                </div>
            </div>
            <div class="carInfo" id="returnCarInfo">
                <h4>楚河汉街店</h4>
                <p>
                    <a>取车地址：</a>
                    <span id="returnAddress">武汉市武昌区中北路周家大湾楚河汉街领寓大厦广场</span>
                </p>
                <p>
                    <a>交通路线：</a>
                    <span id="returnWay">19; 64; 64; 530; 537; 540; 577; 581; 583; 601; 702</span>
                </p>
                <div class="evaluate">
                    <a href="#195" id="returnEva">1385条评论</a>
                    <i class="icon_eva icon_eva4"></i>
                </div>
            </div>
        </div>
        <!--优惠活动-->
        <div class="discount">
            <ul>
               <li>
                  <a href="http://www.dafang24.com/home/newsdetail/379" target="_blank">
                    <img src="home/images/20160123093757708.jpg">
                    <h4>微信下单，立减10元</h4>
                    <p></p>
                  </a>
               </li>
               <li>
                  <a href="http://www.dafang24.com/home/newsdetail/93" target="_blank">
                        <img src="home/images/20160122020611786.jpg">
                        <h4>早订更省钱，提前预订享特价！</h4>
                        <p></p>
                  </a>
               </li>
               <li class="active">
                   <a href="http://huodong2.dafang24.com/" target="_blank">
                       <img src="home/images/20160203055035758.jpg">
                       <h4>新用户首日0租金</h4>
                       <p></p>
                  </a>
               </li>
            </ul>
        </div>
    </div>
</div>
        <input type="hidden" value="<?php echo e(Session::get('user_name')); ?>" id="user_name"/>
    <form id="order_fm" method="post" action="<?php echo e(url('subOrder')); ?>" onsubmit="">
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
        <input id="start_shop_id" name="start_shop_id" type="hidden">
        <input id="stop_shop_id" name="stop_shop_id" type="hidden">
        <input id="start_date" name="start_date" type="hidden">
        <input id="stop_date" name="stop_date" type="hidden">
        <input id="class_id" name="class_id" type="hidden">
        <input id="offersid" name="offersid" type="hidden">
    </form>

<!--底部-->
<?php echo $__env->make('common.home_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
//车辆预订
    function carBook(n)
    {
        if (Duration_alert($("#startDate").html(), $("#startHour").html(), $("#endDate").html(), $("#endHour").htmltext)) {
            var user_name = $('#user_name').val();   //用户信息
            var li = $(".carList>li").eq(n);
            var out_id = $("#takeStore").find(".show a").attr("store_id"),
                out_time = $("#startDate").html() + " " + $("#takeHour").find(".show a").html(),
                in_id = $("#returnStore").find(".show a").attr("store_id"),
                in_time = $("#endDate").html() + " " + $("#returnHour").find(".show a").html(),
                car_id = li.attr("car_id"),
                car_info_id = li.attr("car_info_id"),
                offers_id = [];

            var nowTime = new Date(), outTime, inTime;
            nowTime = date_format(nowTime, "yyyy-MM-dd HH-mm-ss");
            outTime = date_format(out_time, "yyyy-MM-dd HH-mm-ss");
            inTime = date_format(in_time, "yyyy-MM-dd HH-mm-ss");
            //春节等特殊时期 租期限制！
//            if (checked_price_list(CarList[n].prices, outTime, inTime)) {
            if (true) {
                //判断时间
                if (date_subtract(nowTime, outTime).times >= 0) {//取车时间 须 大于 当前时间
                    //活动信息
//                    for (var i = 0; i < li.find(".discountName div").length; i++) {
//                        offers_id.push(li.find(".discountName div").eq(i).attr("dis_id"));
//                    }
                    $("#start_shop_id").val(out_id);
                    $("#stop_shop_id").val(in_id);
                    $("#start_date").val(out_time);
                    $("#stop_date").val(in_time);
                    $("#class_id").val(car_id);
                    $("#offersid").val(car_info_id);
                    localStorage.setItem("page_jump", 503);
                    localStorage.setItem("start_shop_id", out_id);
                    localStorage.setItem("stop_shop_id", in_id);
                    localStorage.setItem("start_date", out_time);
                    localStorage.setItem("stop_date", in_time);
                    localStorage.setItem("class_id", car_id);
                    //localStorage.setItem("offersid", offers_id);
                    if (user_name != '') {
                        $("#order_fm").submit();
                    } else {
                        layer.open({
                            type: 2,
                            scrollbar: false,
                            area: ['346px', '368px'],
                            shade: [0.8, '#000'],
                            title: false,
                            content: ['loginBox', 'yes']
                        });
                    }
                }
                else {
                    layer.alert("取车时间不得小于当前时间，请重新选取时间");
                }
            }
        }
    }

    function _callback()
    {
        var in_id, start_time, stop_time, total, type, grade;
        in_id = $("#returnStore").find(".show a").attr("store_id");
        start_time = $("#startDate").html() + " " + $("#takeHour").find(".show a").html() + ":00";
        start_time = date_format(start_time);
        stop_time = $("#endDate").html() + " " + $("#returnHour").find(".show a").html() + ":00";
        stop_time = date_format(stop_time);
        var cus = JSON.parse(jQuery.cookie("login_user"));
        if (cus) {
            total = cus.total_rent_times;
            type = cus.customer_type;
            grade = cus.customer_grade;
        }
        autoclass_list_.form_date = start_time;//取车时间
        autoclass_list_.to_date = stop_time;//还车时间
        var in_id = $("#returnStore .show a").attr("store_id");

//        if (offer_list_) {
        if (false) {
            for (var i = 0; i < autoclass_list_.length; i++) {
                var offers_amount = 0;
                var enabled_offers = get_enabled_offers(offer_list_, autoclass_list_[i].ac.class_id, start_time, stop_time, in_id, total, type, grade, autoclass_list_[i].prices);
                if (enabled_offers) {
                    var combine = offers_combine_new(enabled_offers);
                    for (var j = 0; j < combine.length; j++) {
                        var or = new Array();
                        for (var k = 0; k < autoclass_list_[i].prices.length; k++) {
                            or[k] = {
                                price_date: autoclass_list_[i].prices[k].price_date,
                                date_type: autoclass_list_[i].prices[k].date_type,
                                normal_price: autoclass_list_[i].prices[k].normal_price,
                                real_price: autoclass_list_[i].prices[k].real_price,
                                ok_price: autoclass_list_[i].prices[k].real_price,
                                calc_date: autoclass_list_[i].prices[k].calc_date
                            };
                        }
                        calc_offers_result(combine[j], or, start_time, stop_time);
                        combine[j].price = or;
                    }
                    var best = get_best_offer(combine);
                    autoclass_list_[i].best_offers = best;
                    autoclass_list_[i].offers_name = get_offer_name(best);//优惠活动 
                    autoclass_list_[i].offers_amount = get_amount(best);//优惠价格
                    autoclass_list_[i].offers_id = get_offer_id(best);//优惠活动编号
                    if (autoclass_list_[i].offers_amount > 0)
                        autoclass_list_[i].is_offer = true;
                    else
                        autoclass_list_[i].is_offer = false;

                    if (autoclass_list_[i].ac.auto_count > 0)
                        autoclass_list_[i].is_rent = true;
                    else
                        autoclass_list_[i].is_rent = false;
                    if (combine[0]) {
                        autoclass_list_[i].prices = best.price;
                    }
                }
                //平均价格 总价格
                var aggr = aggregation(autoclass_list_[i].prices, start_time, stop_time);
                autoclass_list_[i].avg = aggr.avg;
                autoclass_list_[i].sum = aggr.sum + autoclass_list_[i].offers_amount;
            }
        }
        autoclass_list_ = Enumerable.From(autoclass_list_).OrderByDescending(function (a) {
            return a.avg
        }).OrderBy(function (a) {
            return a.is_offer
        }).OrderByDescending(function (a) {
            return a.is_rent
        }).ToArray();
        add_car(autoclass_list_, start_time, stop_time);//添加车型


        var cus = JSON.parse(jQuery.cookie("login_user"));
        $(".no_user").hide();
        $(".yes_user").show();
        $(".yes_user>a").html(cus.customer_name);
        $(".layui-layer-close").click();
    }
</script>