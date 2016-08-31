var shortCalendarNum = 0, FirstLoad = true;
var LNG1, LNG2, LAT1, LAT2;//取还车门店坐标
var brand_List = ["0"];//当前门店 车辆品牌 列表
var CarList;//车型列表

$(function () {
    index_Of();
    loading();//预订信息加载
    City();//城市
    storeInfoShow();//取还车门店信息展示
    calendar();
    discount();//优惠活动
});

//预订信息加载
function loading() {
    if (take_id != "" && takeWeek != "" && startHours1 != "" && endHours1 != "" && return_id != "" && returnWeek != "" && startHours2 != "" && endHours2 != "" && start_time != "" && stop_time != "" && begin_date != "" && end_date != "") {
        IN_TYPE = 1;
    } else if (shopID != "" && shopID && StartDateTime != " 10:00" && StartDateTime && EndDateTime != " 10:00" && EndDateTime) {
        IN_TYPE = 2;
    }
    else if (shopID != "" && shopID) {
        IN_TYPE = 3;
    } 
    switch (IN_TYPE) {
        case 0: {//直接进入
            position();//定位
        } break;
        case 1: {//首页进入
            if (take_id != "" && takeWeek != "" && startHours1 != "" && endHours1 != "" && return_id != "" && returnWeek != "" && startHours2 != "" && endHours2 != "" && start_time != "" && stop_time != "" && begin_date != "" && end_date != "") {
                var SearchModel = {//获取车型所需参数
                    "shop_id": take_id,
                    "start_time": start_time,
                    "stop_time": stop_time,
                    "begin_date": begin_date,
                    "end_date": end_date
                };
                //获取车型
                gain_info(SearchModel);

                $("#startDate").html(start_time.substr(0, 10));//日期
                $("#takeHour").find(".show a").html(start_time.substr(11, 5));//具体时间
                $("#takeWeek").html(takeWeek);//星期

                $("#endDate").html(stop_time.substr(0, 10));
                $("#returnHour").find(".show a").html(stop_time.substr(11, 5));
                $("#duration").html(returnWeek);

                //加载营业时间
                shopHours(startHours1, endHours1, 1);
                shopHours(startHours2, endHours2, 2);
                //门店信息获取
                storeInfo(take_id, return_id);
            }
            else {
                position();
            }
        } break;
        case 2: {//套餐进入
            storeInfo(shopID, shopID);//获取门店信息
            $("#startDate").html(StartDateTime.substr(0, 10));//具体时间
            $("#endDate").html(EndDateTime.substr(0, 10));
            Duration(StartDateTime.substr(0, 10), "10:00", EndDateTime.substr(0, 10), "10:00");
            var week = "";
            var x = date_subtract(new Date(), StartDateTime.substr(0, 10)).days;
            switch (x) {
                case 0: week = "今天"; break;
                case 1: week = "明天"; break;
                case 2: week = "后天"; break;
                default: week = day_in_week(StartDateTime.substr(0, 10), 1); break;
            }
            $("#takeWeek").html(week);
        } break;
        case 3: {//门店进入
            storeInfo(shopID, shopID);
        } break;
    }
    /*
     IN_TYPE
     0 : 直接进入  预订
     1 : 首页进入  预订
     2 : 套餐进入  预订
     3 : 门店进入  预订
     */
}

//获取门店信息
function storeInfo(takeID, returnID) {
    jQuery.ajax({
        url: shop_info_url,
        type: "get",
        dataType: 'jsonp',
        data: { "start_shop_id": takeID, "stop_shop_id": returnID },
        success: function (result) {
            var t = result.start_shop,
                r = result.stop_shop;
            if (FirstLoad) {
                if (IN_TYPE == 2 || IN_TYPE == 3) {
                    city_store(t.city, 0);
                }
                else if (IN_TYPE == 1) {
                    city_store(t.city, 1, 0); //门店加载
                    city_store(r.city, 2, 0);
                }
                FirstLoad = false;
            }

            $("#takeCity").find(".show a").html(t.city);
            $("#takeStore").find(".show a").attr({ "store_id": takeID }).html(t.shop_name);
            $("#takeCarInfo h4").html(/*t.district+" - "+*/ t.shop_name);//数据库门店区域有误
            $("#takeAddress").html(t.street);
            $("#takeWay").html(t.traffic_line);
            $("#takeEva").attr({ "href": "/home/appraise/"+ takeID + "" }).html(t.count + "条评论");
            $("#takeCarInfo").find("i").addClass("icon_eva" + t.score + "");

            $("#returnCity").find(".show a").html(r.city);
            $("#returnStore").find(".show a").attr({ "store_id": returnID }).html(r.shop_name);
            $("#returnCarInfo h4").html(/*r.district+" - "+ */r.shop_name);
            $("#returnAddress").html(r.street);
            $("#returnWay").html(r.traffic_line);
            $("#returnEva").attr({ "href": "#" + returnID + "" }).html(r.count + "条评论");
            $("#returnCarInfo").find("i").attr({ "class": "" })
                .addClass("icon_eva icon_eva" + r.score);

            LNG1 = t.lat;
            LAT1 = t.lng;
            LNG2 = r.lat;
            LAT2 = r.lng;
            initMap(new BMap.Point(LNG1, LAT1));
        }
    });
}

//短租
function book() {
    var bookTit = $(".bookTit>div");
    bookTit.click(function () {
        var n = bookTit.index($(this));
        bookTit.removeClass("active").eq(n).addClass("active");
        $(".bookBody>div").hide().eq(n).show();
    });

    var takeCity = $("#takeCity"),
         takeStore = $("#takeStore"),
         takeDate = $("#takeDate"),
         takeHour = $("#takeHour"),
         returnCity = $("#returnCity"),
         returnStore = $("#returnStore"),
         returnDate = $("#returnDate"),
         returnHour = $("#returnHour"),
         takeCityList = $("#takeCityList"),
         takeStoreList = $("#takeStoreList"),
         returnCityList = $("#returnCityList"),
         returnStoreList = $("#returnStoreList");
    var tit1 = takeCity.find(".city_list_tit a"),//城市 列表 箭头 滑动
        tit2 = returnCity.find(".city_list_tit a"),
        opt_takeCity = takeCity.find(".show>a"), //取车城市
        opt_returnCity = returnCity.find(".show>a");//还车城市

    //立即选车按钮
    $("#startBook").click(function () {
        if (Duration($("#startDate").html(), $("#startHour").html(), $("#endDate").html(), $("#endHour").html())) {
            IN_TYPE = 0;
            $("#takeCarTit").click();
            $("#startBook").attr("disabled", true).css({ "background": "#aaa" });
            $(".carList").html("");
            $(".load").show();

            //存储预订信息
            var take_id, return_id, start_time, stop_time, begin_date, end_date;

            take_id = $("#takeStore").find(".show a").attr("store_id");
            return_id = $("#returnStore").find(".show a").attr("store_id");
            start_time = $("#startDate").html() + " " + $("#takeHour").find(".show a").html() + ":00";
            start_time = date_format(start_time, "yyyy-MM-dd HH:mm:ss");
            stop_time = $("#endDate").html() + " " + $("#returnHour").find(".show a").html() + ":00";
            stop_time = date_format(stop_time, "yyyy-MM-dd HH:mm:ss");
            end_date = date_adddays(stop_time, 7);
            end_date = date_format(end_date, "yyyy-MM-dd HH:mm:ss");

            var ts = date_subtract(new Date(), start_time);//提前预订 多长时间
            if (ts.totaldays < 7) {
                begin_date = date_format(new Date(), "yyyy-MM-dd HH:mm:ss");
            }
            else {
                begin_date = date_format(date_adddays(start_time, -1), "yyyy-MM-dd HH:mm:ss");
            }

            var SearchModel = {
                "shop_id": take_id,
                "start_time": start_time,
                "stop_time": stop_time,
                "begin_date": begin_date,
                "end_date": end_date
            };

            gain_info(SearchModel);//获取车型
            storeInfo(take_id, return_id);//更新页面信息
        }
    });

    //点击空白处关闭
    $(document).click(function (e) {
        var target = $(e.target);
        if (target.closest("#takeCityList").length == 0) {
            $("#takeCityList").fadeOut("fast");
        }
        if (target.closest("#returnCityList").length == 0) {
            $("#returnCityList").fadeOut("fast");
        }
        if (target.closest("#takeStoreList").length == 0) {
            $("#takeStoreList").fadeOut("fast");
        }
        if (target.closest("#returnStoreList").length == 0) {
            $("#returnStoreList").fadeOut("fast");
        }
        if (target.closest("#takeHour .hourBox").length == 0) {
            $("#takeHour .hourBox").fadeOut("fast");
        }
        if (target.closest("#returnHour .hourBox").length == 0) {
            $("#returnHour .hourBox").fadeOut("fast");
        }
        $(".Arrow").removeClass('ArrowHover');
    });

    //城市列表
    takeCity.find(".show").click(function (e) {
        e.stopPropagation();
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        } else {
            $(this).find(".Arrow").addClass('ArrowHover');
        }

        returnCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        returnCityList.hide();
        takeStoreList.hide();
        returnStoreList.hide();
        $(".ta_calendar").eq(0).hide();
        takeCityList.fadeToggle("fast");

        if (takeCityList.height() == "100")
            takeCityList.find("li").eq(0).show();//默认显示热门城市
    });
    returnCity.find(".show").click(function (e) {
        e.stopPropagation();
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        } else {
            $(this).find(".Arrow").addClass('ArrowHover');
        }

        takeCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        takeCityList.hide();
        takeStoreList.hide();
        returnStoreList.hide();
        $(".ta_calendar").eq(0).hide();
        returnCityList.fadeToggle("fast");

        if (returnCityList.height() == "100")
            returnCityList.find("li").eq(0).show();//默认显示热门城市
    });

    //城市分类选择
    tit1.hover(function () {
        tit1.css({ "color": "#24354b" });
        $(this).css({ "color": "#EA5506" });
        var w = $(this).width(),
            left = $(this).position().left;
        takeCity.find(".city_list_arrow").css({ "left": left + w / 2 });
        var n = tit1.index($(this));
        takeCity.find(".city_list_body li").hide().eq(n).show();
    });//取车
    tit2.hover(function () {
        tit2.css({ "color": "#24354b" });
        $(this).css({ "color": "#EA5506" });
        var w = $(this).width(),
            left = $(this).position().left;
        returnCity.find(".city_list_arrow").css({ "left": left + w / 2 });
        var n = tit2.index($(this));
        returnCity.find(".city_list_body li").hide().eq(n).show();
    });//还车

    //城市选择
    takeCity.find(".city_list_body a").click(function () {//取车城市
        if ($(this).html() != opt_takeCity.html()) {
            opt_takeCity.html($(this).html());
            opt_returnCity.html($(this).html());
            city_store($(this).html(), 1);
            city_store($(this).html(), 2);
        }
        takeCity.find(".Arrow").removeClass('ArrowHover');
        takeCityList.fadeOut("fast");
    });
    returnCity.find(".city_list_body a").click(function () {//还车城市
        if ($(this).html() != opt_returnCity.html()) {
            opt_returnCity.html($(this).html());
            city_store($(this).html(), 2);
        }
        returnCity.find(".Arrow").removeClass('ArrowHover');
        returnCityList.fadeOut("fast");
    });

    //门店列表
    takeStore.find(".show").click(function (e) {
        e.stopPropagation();
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        } else {
            $(this).find(".Arrow").addClass('ArrowHover');
        }

        takeCity.find(".Arrow").removeClass('ArrowHover');
        returnCity.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        takeCityList.hide();
        returnCityList.hide();
        returnStoreList.hide();
        $(".ta_calendar").eq(0).hide();
        takeStoreList.fadeToggle("fast");

        if (takeStoreList.find(".store").height() == 0) {
            takeStoreList.find(".store ul").eq(0).show();
            takeStoreList.find(".area a").eq(0).click();
        }
    });
    returnStore.find(".show").click(function (e) {
        e.stopPropagation();
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        } else {
            $(this).find(".Arrow").addClass('ArrowHover');
        }

        takeCity.find(".Arrow").removeClass('ArrowHover');
        returnCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        takeCityList.hide();
        returnCityList.hide();
        takeStoreList.hide();
        $(".ta_calendar").eq(0).hide();
        returnStoreList.fadeToggle("fast");

        if (returnStoreList.find(".store").height() == 0) {
            returnStoreList.find(".store ul").eq(0).show();
            returnStoreList.find(".area a").eq(0).click();
        }
    });

    //日历点击
    $("#startDate").click(function (e) {
        e.stopPropagation();
        takeDate.find(".Arrow").addClass('ArrowHover');
        takeCity.find(".Arrow").removeClass('ArrowHover');
        returnCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        takeCityList.hide();
        returnCityList.hide();
        takeStoreList.hide();
        returnStoreList.hide();
        $(".ta_calendar").eq(1).hide();
    });
    $("#endDate").click(function (e) {
        e.stopPropagation();
        returnDate.find(".Arrow").addClass('ArrowHover');
        takeCity.find(".Arrow").removeClass('ArrowHover');
        returnCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        takeCityList.hide();
        returnCityList.hide();
        takeStoreList.hide();
        returnStoreList.hide();
        $(".ta_calendar").eq(0).hide();
    });

    //营业时间打开
    takeHour.find(".show").click(function (e) {
        e.stopPropagation();
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        } else {
            $(this).find(".Arrow").addClass('ArrowHover');
        }

        takeCity.find(".Arrow").removeClass('ArrowHover');
        returnCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".hourBox").hide();
        takeCityList.hide();
        returnCityList.hide();
        takeStoreList.hide();
        returnStoreList.hide();
        $(".ta_calendar").hide();
        takeHour.find(".hourBox").fadeToggle("fast");
    });
    returnHour.find(".show").click(function (e) {
        e.stopPropagation();
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        } else {
            $(this).find(".Arrow").addClass('ArrowHover');
        }

        takeCity.find(".Arrow").removeClass('ArrowHover');
        returnCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        takeCityList.hide();
        returnCityList.hide();
        takeStoreList.hide();
        returnStoreList.hide();
        $(".ta_calendar").hide();
        returnHour.find(".hourBox").fadeToggle("fast");
    });

    //日历点击
    $("#calendar").click(function () {
        takeCity.find(".Arrow").removeClass('ArrowHover');
        returnCity.find(".Arrow").removeClass('ArrowHover');
        takeStore.find(".Arrow").removeClass('ArrowHover');
        returnStore.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".Arrow").removeClass('ArrowHover');
        returnHour.find(".Arrow").removeClass('ArrowHover');
        takeHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        returnHour.find(".hourBox").hide();
        takeCityList.hide();
        returnCityList.hide();
        takeStoreList.hide();
        returnStoreList.hide();
    });
}

//门店信息 加载
function city_store(cityName, temp, NUM) {//temp：1为取车 or 2为还车 or 0为初始化加载
    var id = [], area = [], address = [], start = [], end = [], traffic = [], name = [], data = [], lng = [], lat = [],
        id1 = [], area1 = [], address1 = [], start1 = [], end1 = [], traffic1 = [], name1 = [], data1 = [], lng1 = [], lat1 = [],
        id2 = [], area2 = [], address2 = [], start2 = [], end2 = [], traffic2 = [], name2 = [], data2 = [], lng2 = [], lat2 = [],
        startHours, endHours, t1, t2, html = "";

    jQuery.ajax({
        url: district_shop_list_url,
        dataType: 'jsonp',
        data: { "city_name": cityName },
        success: function (result) {
            if (result.length == 0) {//当前城市无门店
                IN_TYPE = 3;
                storeInfo(195, 195);
                calendar(1);//日历
            }
            else {
                switch (temp) {
                    case 0: {
                        //获取数据
                        for (var i = 0; i < result.length; i++) {
                            t1 = result[i].start_work_date;
                            t2 = result[i].stop_work_date;
                            id[i] = result[i].id;
                            area[i] = result[i].district;
                            address[i] = result[i].street;
                            start[i] = t1.substr(11, 5);
                            end[i] = t2.substr(11, 5);
                            traffic[i] = result[i].traffic_line;
                            name[i] = result[i].structure_name;
                            lng[i] = result[i].latitude;
                            lat[i] = result[i].longitude;
                        }
                        for (var j = 0; j < area.length; j++) {
                            if (data.indexOf(area[j]) == -1) data.push(area[j]);
                        }
                        //添加区域
                        for (var k = 0; k < data.length; k++) {
                            html += "<a>" + data[k] + "</a>";
                            $(".store").append("<ul></ul>");
                        }
                        $(".area").html(html);
                        //添加门店
                        for (var l = 0; l < area.length; l++) {
                            for (var m = 0; m < data.length; m++) {
                                if (area[l] == data[m]) {
                                    html = "<li><a store_id='" + id[l] + "' num='" + l + "' lng='" + lng[l] + "' lat='" + lat[l] + "''>" + name[l] + "</a></li>";
                                    $(".store ul").eq(m).append(html);
                                }
                            }
                        }
                        $("#returnStore .store").html($("#takeStore .store").html());//还车门店复制

                        //book();//预定事件

                        //区域点击
                        $("#takeStore .area a").click(function () {
                            $("#takeStore .area a").removeClass("active");
                            $(this).addClass("active");
                            var m = $("#takeStore .area a").index($(this));
                            $("#takeStore .store ul").hide().eq(m).show();
                            $("#takeStore .store ul").eq(m).find("a").eq(0).addClass("active");
                            var n = $("#takeStore .store ul").eq(m).find("a").eq(0).attr("num");
                            $("#takeStore .storeAddress").html(address[n]);
                            $("#takeStore .storeTime").html(start[n] + "—" + end[n]);
                            $("#takeStore .storeWay").html(traffic[n]);
                        });
                        $("#returnStore .area a").click(function () {
                            $("#returnStore .area a").removeClass("active");
                            $(this).addClass("active");
                            var m = $("#returnStore .area a").index($(this));
                            $("#returnStore .store ul").hide().eq(m).show();
                            $("#returnStore .store ul").eq(m).find("a").eq(0).addClass("active");
                            var n = $("#returnStore .store ul").eq(m).find("a").eq(0).attr("num");
                            $("#returnStore .storeAddress").html(address[n]);
                            $("#returnStore .storeTime").html(start[n] + "—" + end[n]);
                            $("#returnStore .storeWay").html(traffic[n]);
                        });

                        var N;
                        if (IN_TYPE == 2 || IN_TYPE == 3) {
                            for (var ii = 0; ii < $(".store ul a").length; ii++) {//初始化营业时间
                                if ($(".store ul a").eq(ii).attr("store_id") == shopID) {
                                    N = $(".store ul a").eq(ii).attr("num");
                                    break;
                                }
                            }
                        } else {
                            //默认门店初始化
                            var defaultStoreId = $("#takeStore .store a").eq(0).attr("store_id");
                            //初始化 默认区域门店信息
                            $("#takeStore .area a").eq(0).click();
                            $("#returnStore .area a").eq(0).click();
                            //初始化营业时间
                            N = $(".store ul").eq(0).find("a").eq(0).attr("num");
                            storeInfo(defaultStoreId, defaultStoreId);
                        }

                        startHours = start[N];
                        endHours = end[N];
                        shopHours(startHours, endHours, 1);
                        shopHours(startHours, endHours, 2);

                        //取车门店
                        $("#takeStore .store a").hover(function () {
                            $("#takeStore .store a").removeClass("active");
                            $(this).addClass("active");
                            var n = $(this).attr("num");
                            $("#takeStore .storeAddress").html(address[n]);
                            $("#takeStore .storeTime").html(start[n] + "—" + end[n]);
                            $("#takeStore .storeWay").html(traffic[n]);
                            startHours = start[n];
                            endHours = end[n];
                        })
                            .click(function () {
                                $("#takeStore .show>a").html($(this).html()).attr({
                                    "store_id": $(this).attr("store_id")
                                });
                                $("#takeStore .store_list").hide();
                                $("#takeHour .hourBox").attr({ "startHours": startHours, "endHours": endHours });
                                shopHours(startHours, endHours, 1);//加载营业时间
                                if ($("#takeCity .show>a").html() == $("#returnCity .show>a").html()) {
                                    $("#returnStore .storeAddress").html($("#takeStore .storeAddress").html());
                                    $("#returnStore .storeWay").html($("#takeStore .storeWay").html());

                                    $("#returnStore .show>a").html($(this).html()).attr({
                                        "store_id": $(this).attr("store_id")
                                    });
                                    $("#returnHour .hourBox").attr({ "startHours": startHours, "endHours": endHours });
                                    shopHours(startHours, endHours, 2);//加载营业时间
                                }
                            });
                        //还车门店
                        $("#returnStore .store a").hover(function () {
                            $("#returnStore .store a").removeClass("active");
                            $(this).addClass("active");
                            var n = $(this).attr("num");
                            $("#returnStore .storeAddress").html(address[n]);
                            $("#returnStore .storeTime").html(start[n] + "—" + end[n]);
                            $("#returnStore .storeWay").html(traffic[n]);
                            startHours = start[n];
                            endHours = end[n];
                        })
                            .click(function () {
                                $("#returnStore .show>a").html($(this).html()).attr({
                                    "store_id": $(this).attr("store_id")
                                });
                                $("#returnStore .store_list").hide();
                                $("#returnHour .hourBox").attr({ "startHours": startHours, "endHours": endHours });
                                shopHours(startHours, endHours, 2);
                                if ($(this).attr("store_id") != $("#takeStore .show>a").attr("store_id")) {
                                    layer.tips('温馨提示：会产生异店还车费', '#returnStore', { tips: [3, '##ff7937'] });
                                }
                            });

                        //获取车型
                        var take_id, start_time, stop_time, begin_date, end_date;
                        if (IN_TYPE == 2 || IN_TYPE == 3) {
                            take_id = shopID;
                        } else {
                            take_id = defaultStoreId;
                        }
                        start_time = $("#startDate").html() + " " + $("#takeHour").find(".show a").html() + ":00";
                        stop_time = $("#endDate").html() + " " + $("#returnHour").find(".show a").html() + ":00";
                        if (IN_TYPE == 2) {
                            start_time = StartDateTime;
                            stop_time = EndDateTime;
                        }
                        start_time = date_format(start_time, "yyyy-MM-dd HH:mm:ss");
                        stop_time = date_format(stop_time, "yyyy-MM-dd HH:mm:ss");
                        end_date = date_adddays(stop_time, 7);
                        end_date = date_format(end_date, "yyyy-MM-dd HH:mm:ss");
                        var ts = date_subtract(new Date(), start_time);//提前预订 多长时间
                        if (ts.totaldays < 7) {
                            begin_date = date_format(new Date(), "yyyy-MM-dd HH:mm:ss");
                        }
                        else {
                            begin_date = date_format(date_adddays(start_time, -1), "yyyy-MM-dd HH:mm:ss");
                        }
                        var SearchModel = {//获取车型所需参数
                            "shop_id": take_id,
                            "start_time": start_time,
                            "stop_time": stop_time,
                            "begin_date": begin_date,
                            "end_date": end_date
                        };
                        gain_info(SearchModel);

                        if (IN_TYPE != 2 && IN_TYPE != 3) {
                            LNG1 = result[0].latitude;
                            LAT1 = result[0].longitude;
                            initMap(new BMap.Point(LNG1, LAT1));
                        }
                    } break;
                    case 1: {
                        $("#takeStore .store").html("");
                        //获取数据
                        for (i = 0; i < result.length; i++) {
                            t1 = result[i].start_work_date;
                            t2 = result[i].stop_work_date;
                            id1[i] = result[i].id;
                            area1[i] = result[i].district;
                            address1[i] = result[i].street;
                            start1[i] = t1.substr(11, 5);
                            end1[i] = t2.substr(11, 5);
                            traffic1[i] = result[i].traffic_line;
                            name1[i] = result[i].structure_name;
                            lng1[i] = result[i].latitude;
                            lat1[i] = result[i].longitude;
                        }
                        for (j = 0; j < area1.length; j++) {
                            if (data1.indexOf(area1[j]) == -1) data1.push(area1[j]);
                        }
                        //添加区域
                        for (k = 0; k < data1.length; k++) {
                            html += "<a>" + data1[k] + "</a>";
                            $("#takeStore .store").append("<ul></ul>");
                        }
                        $("#takeStore .area").html(html);
                        //添加门店
                        for (l = 0; l < area1.length; l++) {
                            for (var m = 0; m < data1.length; m++) {
                                if (area1[l] == data1[m]) {
                                    html = "<li><a store_id='" + id1[l] + "' num='" + l + "' lng='" + lng1[l] + "' lat='" + lat1[l] + "''>" + name1[l] + "</a></li>";
                                    $("#takeStore .store ul").eq(m).append(html);
                                }
                            }
                        }

                        //营业时间
                        if (NUM != 0) {//更换城市时 默认加载 第一个门店 的营业时间
                            var defaultStore = $("#takeStore .store a").eq(0);
                            $("#takeStore .show>a").html(defaultStore.html())
                                .attr({ "store_id": defaultStore.attr("store_id") });
                            N = $("#takeStore .store ul").eq(0).find("a").eq(0).attr("num");
                            startHours = start1[N];
                            endHours = end1[N];
                            shopHours(startHours, endHours, 1);
                        }

                        //区域点击
                        $("#takeStore .area a").click(function () {
                            $(".area a").removeClass("active");
                            $(this).addClass("active");
                            var m = $("#takeStore .area a").index($(this));
                            $("#takeStore .store ul").hide().eq(m).show();

                            $("#takeStore .store ul").eq(m).find("a").eq(0).addClass("active");
                            var n = $("#takeStore .store ul").eq(m).find("a").eq(0).attr("num");
                            $("#takeStore .storeAddress").html(address1[n]);
                            $("#takeStore .storeTime").html(start1[n] + "—" + end1[n]);
                            $("#takeStore .storeWay").html(traffic1[n]);
                        });

                        //取车门店
                        $("#takeStore .store a").hover(function () {
                            $("#takeStore .store a").removeClass("active");
                            $(this).addClass("active");
                            var n = $(this).attr("num");
                            $("#takeStore .storeAddress").html(address1[n]);
                            $("#takeStore .storeTime").html(start1[n] + "—" + end1[n]);
                            $("#takeStore .storeWay").html(traffic1[n]);
                            startHours = start1[n];
                            endHours = end1[n];
                        }).click(function () {
                            $("#takeStore .show>a").html($(this).html()).attr({
                                "store_id": $(this).attr("store_id")
                            });
                            $("#takeStore .store_list").hide();
                            $("#takeHour .hourBox").attr({ "startHours": startHours, "endHours": endHours });
                            shopHours(startHours, endHours, 1);//加载营业时间
                            if ($("#takeCity .show>a").html() == $("#returnCity .show>a").html()) {
                                $("#returnStore .storeAddress").html($("#takeStore .storeAddress").html());
                                $("#returnStore .storeWay").html($("#takeStore .storeWay").html());

                                $("#returnStore .show>a").html($(this).html()).attr({
                                    "store_id": $(this).attr("store_id")
                                });
                                $("#returnHour .hourBox").attr({ "startHours": startHours, "endHours": endHours });
                                shopHours(startHours, endHours, 2);//加载营业时间
                            }
                        });
                    } break;
                    case 2: {
                        $("#returnStore .store").html("");
                        //获取数据
                        for (var i = 0; i < result.length; i++) {
                            t1 = result[i].start_work_date;
                            t2 = result[i].stop_work_date;
                            id2[i] = result[i].id;
                            area2[i] = result[i].district;
                            address2[i] = result[i].street;
                            start2[i] = t1.substr(11, 5);
                            end2[i] = t2.substr(11, 5);
                            traffic2[i] = result[i].traffic_line;
                            name2[i] = result[i].structure_name;
                            lng2[i] = result[i].latitude;
                            lat2[i] = result[i].longitude;
                        }
                        for (var j = 0; j < area2.length; j++) {
                            if (data2.indexOf(area2[j]) == -1) data2.push(area2[j]);
                        }
                        //添加区域
                        for (var k = 0; k < data2.length; k++) {
                            html += "<a>" + data2[k] + "</a>";
                            $("#returnStore .store").append("<ul></ul>");
                        }
                        $("#returnStore .area").html(html);
                        //添加门店
                        for (var l = 0; l < area2.length; l++) {
                            for (var m = 0; m < data2.length; m++) {
                                if (area2[l] == data2[m]) {
                                    html = "<li><a store_id='" + id2[l] + "' num='" + l + "' lng='" + lng2[l] + "' lat='" + lat2[l] + "''>" + name2[l] + "</a></li>";
                                    $("#returnStore .store ul").eq(m).append(html);
                                }
                            }
                        }

                        //营业时间
                        if (NUM != 0) {
                            defaultStore = $("#returnStore .store a").eq(0);
                            $("#returnStore .show>a").html(defaultStore.html())
                                .attr({ "store_id": defaultStore.attr("store_id") });
                            N = $("#takeStore .store ul").eq(0).find("a").eq(0).attr("num");
                            startHours = start2[N];
                            endHours = end2[N];
                            shopHours(startHours, endHours, 2);
                        }

                        //区域点击
                        $("#returnStore .area a").click(function () {
                            $(".area a").removeClass("active");
                            $(this).addClass("active");
                            var m = $("#returnStore .area a").index($(this));
                            $("#returnStore .store ul").hide().eq(m).show();
                            $("#returnStore .store ul").eq(m).find("a").eq(0).addClass("active");
                            var n = $("#returnStore .store ul").eq(m).find("a").eq(0).attr("num");
                            $("#returnStore .storeAddress").html(address2[n]);
                            $("#returnStore .storeTime").html(start2[n] + "—" + end2[n]);
                            $("#returnStore .storeWay").html(traffic2[n]);
                        });

                        //还车门店
                        $("#returnStore .store a").hover(function () {
                            $("#returnStore .store a").removeClass("active");
                            $(this).addClass("active");
                            var n = $(this).attr("num");
                            $("#returnStore .storeAddress").html(address2[n]);
                            $("#returnStore .storeTime").html(start2[n] + "—" + end2[n]);
                            $("#returnStore .storeWay").html(traffic2[n]);
                            startHours = start2[n];
                            endHours = end2[n];
                        }).click(function () {
                            $("#returnStore .show>a").html($(this).html()).attr({
                                "store_id": $(this).attr("store_id")
                            });
                            $("#returnStore .store_list").hide();
                            $("#returnHour .hourBox").attr({ "startHours": startHours, "endHours": endHours });
                            shopHours(startHours, endHours, 2);
                            if ($(this).attr("store_id") != $("#takeStore .show>a").attr("store_id")) {
                                layer.tips('温馨提示：会产生异店还车费', '#returnStore', { tips: [3, '##ff7937'] });
                            }
                        });
                    } break;
                }
            }
        }
    });
}

//城市
function City() {
    //加载城市
    jQuery.ajax({
        url: city_list_url,
        dataType: 'jsonp',
        success: function (result) {
            var hotCity = "",//热门城市
                touristCity = '',//旅游城市
                letter = [],//首字母集合
                temp;
            for (var i = 0; i < result.length; i++) {
                if ((result[i].city_type & 4) == 4)//旅游城市
                {
                    touristCity += "<span><a>" + result[i].city_name + "</a></span>";
                }

                if ((result[i].city_type & 2) == 2)//热门城市
                {
                    hotCity += "<span><a>" + result[i].city_name + "</a></span>";
                }

                temp = result[i].city_name;//全部城市列表
                if (temp != "乌鲁木齐") {
                    temp = temp.substr(0, temp.length - 1);
                }

                letter.push(result[i].city_abridge.substr(0, 1));//取第一个首字母

            }

            bookCity(hotCity, touristCity, letter, result);
        }
    });
}

//预订城市
function bookCity(hotCity, touristCity, letter, result) {
    var li = $(".city_list_body li");
    li.eq(0).html(hotCity);
    li.eq(1).html(touristCity);

    var data = []; //排序并去重的 首字母索引
    for (var i = 0; i < letter.length; i++) {
        if (data.indexOf(letter[i]) == -1)
            data.push(letter[i]);
    }
    data.sort();//排序A-Z

    for (var j = 0; j < data.length; j++) {
        if (data[j] == "A" || data[j] == "B" || data[j] == "C" || data[j] == "D") {
            li.eq(2).append("<div class='" + data[j] + "'><b>" + data[j] + "</b></div>");
        }
        if (data[j] == "E" || data[j] == "F" || data[j] == "G" || data[j] == "H" || data[j] == "J") {
            li.eq(3).append("<div class='" + data[j] + "'><b>" + data[j] + "</b></div>");
        }
        if (data[j] == "K" || data[j] == "L" || data[j] == "M" || data[j] == "N" || data[j] == "P" || data[j] == "Q") {
            li.eq(4).append("<div class='" + data[j] + "'><b>" + data[j] + "</b></div>");
        }
        if (data[j] == "R" || data[j] == "S" || data[j] == "T" || data[j] == "W") {
            li.eq(5).append("<div class='" + data[j] + "'><b>" + data[j] + "</b></div>");
        }
        if (data[j] == "X" || data[j] == "Y" || data[j] == "Z") {
            li.eq(6).append("<div class='" + data[j] + "'><b>" + data[j] + "</b></div>");
        }
    }

    for (var k = 0; k < result.length; k++) {
        $("." + letter[k] + "").append("<span><a>" + result[k].city_name + "</a></span>");
    }

    $("#returnCity .city_list_body").html($("#takeCity .city_list_body").html());//还车城市

    book();

}

//营业时间
function shopHours(startHours, endHours, temp) {//temp 1为取车时间  2为还车时间
    var startH,//时
        startM = parseInt(startHours.substr(3, 2)),//分
        endH,
        endM = parseInt(endHours.substr(3, 2)),
        html = "", k, time, hour, min, timeBox;

    if (startHours.substr(0, 1) == "0") {//此处为兼容IE8,parseInt("08")=0;正常为8;
        startH = parseInt(startHours.substr(1, 1));
    }
    else {
        startH = parseInt(startHours.substr(0, 2));
    }
    if (endHours.substr(0, 1) == "0") {
        endH = parseInt(endHours.substr(1, 1));
    }
    else {
        endH = parseInt(endHours.substr(0, 2));
    }

    if (startM != 0) {
        html = "<a>" + startHours + "</a>";
        for (var i = startH + 1; i < endH; i++) {
            k = i;
            if (i < 10)
                k = "0" + i;
            html += "<a>" + k + ":00</a>" +
                "<a>" + k + ":30</a>";
        }
        if (endM != 0) {
            html += "<a>" + endH + ":00</a>" +
                "<a>" + endHours + "</a>";
        }
        else {
            html += "<a>" + endHours + "</a>";
        }
    }
    else {
        for (var i = startH; i < endH; i++) {
            k = i;
            if (i < 10)
                k = "0" + i;
            html += "<a>" + k + ":00</a><a>" + k + ":30</a>";
        }
        if (endM != 0) {
            html += "<a>" + endH + ":00</a><a>" + endHours + "</a>";
        }
        else {
            html += "<a>" + endHours + "</a>";
        }
    }
    switch (temp) {
        case 1: {
            $("#takeHour .hourBox").html(html);
            timeBox = $("#takeHour .show a");
            time = timeBox.html();
            hour = parseInt(time.substr(0, 2));
            min = parseInt(time.substr(3, 2));
            //当前选中时间不在此门店营业时间内时
            if (hour < startH || hour > endH) {
                timeBox.html("10:00");
            }
            else if (hour == startH) {
                if (min < startM) {
                    timeBox.html("10:00");
                }
            }
            else if (hour == endH) {
                if (min > endM) {
                    timeBox.html("10:00");
                }
            }
        } break;
        case 2: {
            $("#returnHour .hourBox").html(html);
            timeBox = $("#returnHour .show a");
            time = timeBox.html();
            hour = parseInt(time.substr(0, 2));
            min = parseInt(time.substr(3, 2));
            //当前选中时间不在此门店营业时间内时
            if (hour < startH || hour > endH) {
                timeBox.html("10:00");
            }
            else if (hour == startH) {
                if (min < startM) {
                    timeBox.html("10:00");
                }
            }
            else if (hour == endH) {
                if (min > endM) {
                    timeBox.html("10:00");
                }
            }
        } break;
    }

    //营业时间选择
    $("#takeHour .hourBox a").click(function () {
        $("#takeHour .show>a").html($(this).html());
        $("#returnHour .show>a").html($(this).html());
        $("#takeHour .hourBox").hide();
        //计算租期
        Duration($("#takeDate>a").html(),
            $("#takeHour .show>a").html(),
            $("#returnDate>a").html(),
            $("#returnHour .show>a").html());
    });
    $("#returnHour .hourBox a").click(function () {
        $("#returnHour .show>a").html($(this).html());
        $("#returnHour .hourBox").hide();
        //计算租期
        Duration($("#takeDate>a").html(),
            $("#takeHour .show>a").html(),
            $("#returnDate>a").html(),
            $("#returnHour .show>a").html());
    });
}

//日历
function calendar() {
    var startDate = $("#startDate"),
        startHour = $("#startHour"),
        endDate = $("#endDate"),
        endHour = $("#endHour");
    var Available_days,// 从当天起 可 预订 多少天内 车辆
        now_time = new Date(),
        out_time = date_adddays(now_time, 1),//默认取车日期
        in_time = date_adddays(now_time, 3),//默认还车日期
        start_time = now_time,//可选的 租车开始日期
        end_time,//可选的 取车日期
        end_time1;//可选的 还车日期
    var s0 = startDate.html();
    var e0 = endDate.html();
    $.ajax({
        url: maxrent_auto_url,
        dataType: 'jsonp',
        success: function (e) {
            Available_days = e.parameter_value1;//获取 可提前预订天数
            end_time = date_adddays(start_time, Available_days);//可选的 取车日期
            end_time1 = date_adddays(start_time, (Available_days + 7));//可选的 还车日期
            //加载日历
            startDateRange(start_time, end_time);//取车日历
            endDateRange(start_time, end_time1);//还车日历
            $(".ta_calendar").find(".i_next").click();//点击下月
            //初始化默认日期
            if (IN_TYPE != 1 && IN_TYPE != 2) {
                startDate.html(date_format(out_time, "yyyy-MM-dd"));
                endDate.html(date_format(in_time, "yyyy-MM-dd"));
            } else {
                startDate.html(s0);
                endDate.html(e0);
            }
        }
    });
    //取车 日期
    function startDateRange() {
        var time = timeCycle(start_time, end_time),
            start = time.start, end = time.end;
        new pickerDateRange('startDate', {
            isTodayValid: true,
            isSingleDay: true,//单天选择
            minValidDate: start,
            maxValidDate: end,
            autoSubmit: true,
            theme: 'ta',
            success: function (obj) {
                $("#takeDate").find(".Arrow").removeClass('ArrowHover');
                startDate.html(obj.startDate);
                endDate.html(date_format(date_adddays(obj.startDate, 2), "yyyy-MM-dd"));
                var week = "";
                var x = date_subtract(date_format(now_time, "yyyy-MM-dd"), obj.startDate).days;
                switch (x) {
                    case 0: week = "今天"; break;
                    case 1: week = "明天"; break;
                    case 2: week = "后天"; break;
                    default: week = day_in_week(obj.startDate, 1); break;
                }
                $("#takeWeek").html(week);
                //计算租期
                Duration(startDate.html(), startHour.html(), endDate.html(), endHour.html());
            }
        });
    }
    //还车 日期
    function endDateRange(start, end) {
        var time = timeCycle(start, end);
        start = time.start; end = time.end;
        new pickerDateRange('endDate', {
            isTodayValid: true,
            isSingleDay: true,//单天选择
            minValidDate: start,
            maxValidDate: end,
            autoSubmit: true,
            theme: 'ta',
            success: function (obj) {
                $("#returnDate").find(".Arrow").removeClass('ArrowHover');
                endDate.html(obj.endDate);
                Duration(startDate.html(), startHour.html(), endDate.html(), endHour.html());
            }
        });
    }
    //时间转换
    function timeCycle(start_time, end_time) {
        var start = new Date(date_format(date_adddays(start_time, 1), "yyyy-MM-dd")).getTime();//开始日期
        var end = new Date(date_format(date_adddays(end_time, 2), "yyyy-MM-dd")).getTime();//结束日期
        var a = new Date("1980-01-02").getTime() - new Date("1970-01-02").getTime();
        var b = 315507600 / a;//参数
        start = start * b;
        end = end * b;
        return { start: start, end: end };
    }
}

//租期计算
function Duration(D1, H1, D2, H2) {
    var start = D1 + " " + H1,
        end = D2 + " " + H2;
    start = date_format(start, "yyyy-MM-dd HH:mm");
    end = date_format(end, "yyyy-MM-dd HH:mm");
    var nowTime = new Date(), isOK = false;
    nowTime = date_format(nowTime);
    var maxDuration = 29 * 86400000;//最长租期毫秒数
    var x = date_subtract(start, end);
    var duration = x.days + "天";
    if (parseInt(x.hours) != 0) {
        duration += x.hours + "时";
    }
    if (parseInt(x.hours) == 0 && parseInt(x.minutes) != 0) {
        duration += "零";
    }
    if (parseInt(x.minutes) != 0) {
        duration += x.minutes + "分";
    }
    if (x.times <= 0) {
        layer.tips('还车时间应大于取车时间', '#returnHour', { tips: [3, '#3ac9fb'] });
        duration = "&times;";
    }
    else if (x.times > maxDuration) {
        layer.tips('短租租期不得超过29天<br>超过29天请选择长租更划算', '#endDate', { tips: [3, '#3ac9fb'] });
    }
    else if (x.totalhours < 24) {
        layer.tips('租车时长不得小于24小时', '#returnHour', { tips: [3, '#3ac9fb'] });
    }
    else if (date_subtract(nowTime, start).times < 0) {
        layer.tips('取车时间不得小于当前时间<br>请重新选取时间', '#startDate', { tips: [1, '#3ac9fb'] });
    }
    else {
        isOK = true;
    }
    $("#duration").html(duration);//租期显示
    return isOK;
}

//租期计算
function Duration_alert(D1, H1, D2, H2) {
    var start = D1 + " " + H1,
        end = D2 + " " + H2;
    start = date_format(start, "yyyy-MM-dd HH:mm");
    end = date_format(end, "yyyy-MM-dd HH:mm");
    var nowTime = new Date(), isOK = false;
    nowTime = date_format(nowTime);
    var maxDuration = 29 * 86400000;//最长租期毫秒数
    var x = date_subtract(start, end);
    var duration = x.days + "天";
    if (parseInt(x.hours) != 0) {
        duration += x.hours + "时";
    }
    if (parseInt(x.hours) == 0 && parseInt(x.minutes) != 0) {
        duration += "零";
    }
    if (parseInt(x.minutes) != 0) {
        duration += x.minutes + "分";
    }
    if (x.times <= 0) {
        layer.tips('还车时间应大于取车时间', '#returnHour', { tips: [3, '#3ac9fb'] });
        duration = "&times;";
        layer.alert('还车时间应大于取车时间');
    }
    else if (x.times > maxDuration) {
        layer.tips('短租租期不得超过29天<br>超过29天请选择长租更划算', '#endDate', { tips: [3, '#3ac9fb'] });
        layer.alert('短租租期不得超过29天<br>超过29天请选择长租更划算');
    }
    else if (x.totalhours < 24) {
        layer.tips('租车时长不得小于24小时', '#returnHour', { tips: [3, '#3ac9fb'] });
        layer.alert('租车时长不得小于24小时');
    }
    else if (date_subtract(nowTime, start).times < 0) {
        layer.tips('取车时间不得小于当前时间<br>请重新选取时间', '#startDate', { tips: [1, '#3ac9fb'] });
        layer.alert('取车时间不得小于当前时间<br>请重新选取时间');
    }
    else {
        isOK = true;
    }
    $("#duration").html(duration);//租期显示
    return isOK;
}

//定位
function position() {
    $.ajax({
        url: "http://api.map.baidu.com/location/ip?ak=G1124lxcYCI56HOSOx1YIN6e",
        dataType: 'jsonp',
        success: function (e) {
            var city = e.content.address_detail.city;

            //初始化加载门店
            $("#takeCity").find(".show>a").html(city);
            $("#returnCity").find(".show>a").html(city);
            city_store(city, 0);

            initMap(city);
        }
    });
}

//百度地图
function initMap(point) {
    var map = new BMap.Map("map");// 初始化地图
    map.centerAndZoom(point, 13); // 设置中心点坐标和地图级别,point为定位地点
    map.disableScrollWheelZoom(); //禁止默认滚轮缩放

    var navigationControl = new BMap.NavigationControl({
        // 靠左上角位置
        anchor: BMAP_ANCHOR_TOP_RIGHT,
        // LARGE类型
        type: BMAP_NAVIGATION_CONTROL_ZOOM
        // 启用显示定位
    });// 添加缩放定位控件
    map.addControl(navigationControl);

    var icon = new BMap.Icon("/content/images/index/map.png", new BMap.Size(25, 35));//门店标注样式
    var Marker = new BMap.Marker(point, { icon: icon });

    map.addOverlay(Marker);
}

//取还车门店信息展示
function storeInfoShow() {
    $("#takeCarTit").click(function () {
        $("#takeCarInfo").show();
        $(".carInfoTit").removeClass("active");
        $(this).addClass("active");
        if ($("#takeStore").find(".show a").html() != $("#returnStore").find(".show a").html()) {
            initMap(new BMap.Point(LNG1, LAT1));
        }
    });
    $("#returnCarTit").click(function () {
        $("#takeCarInfo").hide();
        $(".carInfoTit").removeClass("active");
        $(this).addClass("active");
        if ($("#takeStore").find(".show a").html() != $("#returnStore").find(".show a").html()) {
            initMap(new BMap.Point(LNG2, LAT2));
        }
    });
}

//优惠活动
function discount() {
    var li = $(".discount li");
    li.eq(li.length - 1).addClass("active");
    li.hover(function () {
        li.removeClass("active");
        $(this).addClass("active");
    });
}

//获取当前门店车型
function gain_info(data) {
    var start_week,
        start = date_format(data.start_time),
        end = date_format(data.stop_time),
        term,//租期
        car_list,//获取到的所有车型列表
        offer_list,//优惠活动列表
        order_info;//订单信息

    var total_rent_times = 0, customer_type = 1, customer_grade = 3;//用户登录信息
    var cus = JSON.parse(jQuery.cookie("login_user"));
    if (cus) {
        total_rent_times = cus.total_rent_times;
        customer_type = cus.customer_type;
        customer_grade = cus.customer_grade;
    }
    jQuery.ajax({
        url: class_list_auto_url,
        dataType: 'jsonp',
        data: data,
        success: function (result) {
            //计算取车日期是星期几
            start_week = new Date(start).getDay();
            //计算价格
            car_list = result.clazz;
            offer_list = result.offers;
            order_info = result.order_info;
            autoclass_list_=result.clazz;
            offer_list_ = result.offers;
            order_info_ = result.order_info;
            //计算租期
            var total_days = date_subtract(start, end).totaldays;
            term = parseInt(total_days);   //租期
            if (term + order_info.time_out_max_minute / (60 * 24) <= total_days) {
                term++;//超出最大超时时间则租期加一天
            }

            car_list.form_date = start;//取车时间
            car_list.to_date = end;//还车时间
            var form_datetime = date_clone(start);
            get_date(start);//时分秒置为0
            end = date_adddays(start, term);//根据租期计算的还车日期（年月日，时分秒置为0）
            var to_datetime = date_adddays(form_datetime, term);//根据租期计算的还车具体时间

            var in_id = $("#returnStore .show a").attr("store_id");
            //计算价格
            for (var i = 0; i < car_list.length; i++) {
                var offers_amount = 0;
                if (offer_list) {
                    //活动列表、车型ID、取车时间、根据租期计算的还车时间、还车门店ID、当前租车用户信息3个、车型价格
                    var enabled_offers = get_enabled_offers(offer_list, car_list[i].ac.class_id, form_datetime, to_datetime, in_id, total_rent_times, customer_type, customer_grade, car_list[i].prices);
                    if (enabled_offers) {
                        var combine = offers_combine(enabled_offers);
                        for (var j = 0; j < combine.length; j++) {
                            if (combine[j]) {
                                var or = new Array();
                                for (var k = 0; k < result.clazz[i].prices.length; k++) {
                                    or[k] = {
                                        price_date: result.clazz[i].prices[k].price_date,
                                        date_type: result.clazz[i].prices[k].date_type,
                                        normal_price: result.clazz[i].prices[k].normal_price,
                                        real_price: result.clazz[i].prices[k].real_price,
                                        ok_price: result.clazz[i].prices[k].real_price,
                                        calc_date: result.clazz[i].prices[k].calc_date,
                                        holiday_name: result.clazz[i].prices[k].holiday_name,
                                        min_inner_rent_days: result.clazz[i].prices[k].min_inner_rent_days,
                                        min_rent_days: result.clazz[i].prices[k].min_rent_days,
                                        begin_date: result.clazz[i].prices[k].begin_date,
                                        end_date: result.clazz[i].prices[k].end_date
                                    };
                                }
                                calc_offers_result(combine[j], or, start, end);
                                combine[j].price = or;
                            }
                        }
                        var best = get_best_offer(combine);
                        car_list[i].best_offers = best;//符合的优惠活动的详细信息
                        car_list[i].offers_name = get_offer_name(best);//优惠活动名称
                        car_list[i].offers_amount = get_amount(best);//优惠价格
                        car_list[i].offers_id = get_offer_id(best);//优惠活动编号

                        if (combine[0]) {
                            car_list[i].prices = best.price;
                        }

                    }
                    offers_amount = Math.round(car_list[i].offers_amount);
                }

                if (car_list[i].offers_amount > 0 && car_list[i].offers_amount)
                    car_list[i].is_offer = true;
                else
                    car_list[i].is_offer = false;

                if (car_list[i].ac.auto_count > 0 && car_list[i].ac.auto_count)
                    car_list[i].is_rent = true;
                else
                    car_list[i].is_rent = false;
                //平均价格 总价格
                var aggr = aggregation(car_list[i].prices, start, end);
                car_list[i].avg = Math.round(aggr.avg);
                car_list[i].sum = Math.round(aggr.sum + offers_amount);
            }

            //根据 价格、活动、是否满租 来排序
            car_list = Enumerable.From(car_list).OrderByDescending(function (a) {
                return a.avg
            }).OrderBy(function (a) {
                return a.is_offer
            }).OrderByDescending(function (a) {
                return a.is_rent
            }).ToArray();
            CarList = car_list;
            add_brand(car_list);//添加品牌
            add_car(car_list, start, end);//添加车型
        }
    });
}

//添加车型
function add_car(car_list, start, end) {
    var add_html = "", checked = true;//判断活动
    for (var i = 0; i < car_list.length; i++) {
        if (checked) {
            checked = checked_price_list(car_list[i].prices, start, end);
        }
        var brand = car_list[i].ac.brand.brand_name,//品牌
            honda = car_list[i].ac.honda,//型号
            con = car_list[i].ac.body_construction,//厢数
            vol = car_list[i].ac.let_litre,//排量
            gear = car_list[i].ac.gearbox,//手自动
            seat_count = car_list[i].ac.seat_count,//乘坐人数
            type = car_list[i].ac.class_category,//乘坐人数
            img = car_list[i].ac.class_image.substr(1),//图片
            deposit = car_list[i].standard_price ? car_list[i].standard_price.deposit : 0,//预授权
            rent = car_list[i].ac.auto_count,//判断是否可租
            basic = car_list[i].standard_price ? car_list[i].standard_price.basic_insurance : 0,//基本保险
            car_id = car_list[i].ac.class_id,//车型id
            offers = car_list[i].offers_name;//可参与的活动

        if (rent == 0) {
            if (car_id == carID) {
                add_html += "<li class='NoBookCar active' car_id='" + car_id + "'>";
            } else {
                add_html += "<li class='NoBookCar' car_id='" + car_id + "'>";
            }
        } else {
            if (car_id == carID) {
                add_html += "<li car_id='" + car_id + "' class='active'>";
            } else {
                add_html += "<li car_id='" + car_id + "'>";
            }
        }

        add_html += "<img src='" + api_url + img + "'>" +
            "<div class='info'>" +
            "<b><a>" + brand + "</a> " + honda + "</b>" +
            " <a>" + type + "</a>" +
            "<div class='carIcon'><div><i class='icon icon_car1'></i>" +
            "<a>" + con + "</a></div><div><i class='icon icon_car2'></i>" +
            "<a>" + gear + "</a></div><div><i class='icon icon_car3'></i>" +
            "<a>" + vol + "</a></div><div><i class='icon icon_car4'></i>" +
            "<a>乘坐" + seat_count + "人</a></div></div></div>";

        add_html += add_special_offers(car_list, i);//优惠活动添加

        if (rent == 0) {
            add_html += "<div class='bookButton noBook'>" +
                "<div class='avePrice'>日均 <b>" + car_list[i].avg + "</b> 元</div>" +
            "<input type='button' value='满 租' class='book'>";
        }
        else {
            add_html += "<div class='bookButton canBook'>" +
                "<div class='avePrice'>日均 <b>" + car_list[i].avg + "</b> 元</div>" +
                "<input type='button' value='预 订' class='book' " +
                "onclick='carBook(" + i + ")'>";
        }

        add_html += add_daily_price(car_list, i, start, end);//每日价格添加
        add_html += "</ul><div class='safe'>";

        var offersAmount = Math.round(car_list[i].offers_amount),
            sumAmount = Math.round(car_list[i].sum);
        if (offersAmount && offersAmount > 0) {
            add_html += "原价 <s><a>" + Math.round(sumAmount) + "</a></s> 元&nbsp;&nbsp;" +
                "节省 <a>" + Math.round(offersAmount) + "</a> 元";
        } else {
            add_html += "总价 <a>" + sumAmount + "</a> 元";
        }

        add_html += "<br/>基本险 <a>" + basic + "</a> 元/天 " +
            "&nbsp;&nbsp;预授权 <a>" + deposit + "</a> 元</div></div></div></div></li>";

    }

    //车型添加
    $(".carList").html(add_html);

    //可租车型数量
    $("#carNum").html($(".carList>li").length - $(".carList>.NoBookCar").length);

    //优惠活动样式
    var carDiscount = $(".carDiscount"),
        top = ($(".carList li").height() - carDiscount.height()) / 2;
    carDiscount.css({ "margin-top": top });
    $(".discountPrice").css({ "line-height": carDiscount.height() + "px" });
    //每日价格样式
    var n = $(".daily_price_body").eq(0).find("li").length;
    n = Math.ceil(n / 7);
    $(".daily_price_body").height(n * 50);

    carFilter();//车辆筛选
    $(".load").hide();
    $("#startBook").attr("disabled", false).css({ "background": "#e15517" });


}

//添加品牌
function add_brand(car_list) {
    var brand = [], temp = [], html = "";
    brand_List = ["0"];
    for (var i = 0; i < car_list.length; i++) {
        brand.push(car_list[i].ac.brand.brand_name);
    }
    for (var j = 0; j < brand.length; j++) {
        if (temp.indexOf(brand[j]) == -1) {
            temp.push(brand[j]);
        }
    }
    for (var k = 0; k < temp.length; k++) {
        html += "<a>" + temp[k] + "</a>";
        brand_List.push(temp[k]);
    }
    $(".brand>span").html(html);
    $(".brand>a").addClass("active");
}

//添加优惠活动
function add_special_offers(car_list, i) {
    var x = 0, html = "<div class='carDiscount'><div class='discountName'>";
    if (car_list[i].offers_name) {
        var activity_name = car_list[i].offers_name.split(",");
        var offers_listid = car_list[i].offers_id.toString().split(',');
        for (var j = 0; j < activity_name.length; j++) {
            if (activity_name[j]) {
                html += "<div dis_id='" + offers_listid[j] + "'>" + activity_name[j] + "</div>";
                x++;
            }
        }
    }
    if (x == 0) {
        return "";
    } else {
        html += "</div><div class='discountPrice'>节省 <b>" + Math.round(car_list[i].offers_amount) + "</b> 元</div></div>";
        return html;
    }
}

//添加每日价格
function add_daily_price(car_list, i, start, end) {
    var price_list = car_list[i].prices;
    var price_begin = price_list[0].price_date;
    var price_end = price_list[price_list.length - 1].price_date;

    var begin_date = new Date(price_begin);//开始的时间
    var begin_date_day = begin_date.getDay();//开始时间是周几
    var total_days = date_subtract(date_format(price_begin), date_format(price_end)).totaldays;//价格表总天数

    var start_date = date_format(price_begin, "yyyy-MM-dd"),
        end_date = date_format(date_adddays(price_end, -1), "yyyy-MM-dd"),
        html = "<div class='daily_price'><div class='arrow'></div>" +
            "<div class='daily_price_box'>" +
            "<div class='date'>" + start_date + " 至 " + end_date + "</div>" +
            "<ul class='week'><li>日</li><li>一</li>" +
            "<li>二</li><li>三</li><li>四</li><li>五</li><li>六</li></ul>" +
            "<ul class='daily_price_body'>";

    if (price_list != null && price_list.length > 0) {//价格表不为空
        for (var x = 0; x < begin_date_day; x++) {
            html += "<li></li>";
        }
        for (var j = 0; j < total_days; j++) {
            var day = date_format(date_adddays(start_date, j), "yyyy-MM-dd").substr(8, 2);
            day = parseInt(day);

            if (between_date(start, end, date_format(price_list[j].price_date, "yyyy-MM-dd"))) {
                if (price_list[j].ok_price >= 0) {
                    html += "<li class='active'>" + day + "<br>￥<a>" +
                        Math.round(price_list[j].ok_price) + "</a></li>";
                }
                else {
                    html += "<li class='active'>" + day + "<br>￥<a>" +
                        Math.round(price_list[j].real_price) + "</a></li>";
                }
            }
            else {
                if (price_list[j].ok_price >= 0) {
                    html += "<li>" + day + "<br>￥" + price_list[j].ok_price + "</li>";
                }
                else {
                    html += "<li>" + day + "<br>￥" + price_list[j].real_price + "</li>";
                }
            }
        }
    }
    return html;
}

//车辆筛选、排序
function carFilter() {
    //筛选
    var n1, n2, n3,
        type = $(".type"),
        brand = $(".brand"),
        price = $(".price"),
        Type = type.find("a"),
        Brand = brand.find("a"),
        Price = price.find("a");

    //类型
    Type.click(function () {
        Type.removeClass("active");
        $(this).addClass("active");//css

        n1 = Type.index($(this));
        n2 = brand.attr("num");
        n3 = price.attr("num");

        type.attr({ "num": n1 });

        Filter(n1, n2, n3);
    });

    //品牌
    Brand.click(function () {
        Brand.removeClass("active");
        $(this).addClass("active");//css

        n1 = type.attr("num");
        n2 = Brand.index($(this));
        n3 = price.attr("num");

        brand.attr({ "num": n2 });

        Filter(n1, n2, n3);
    });

    //品牌
    Price.click(function () {
        Price.removeClass("active");
        $(this).addClass("active");//css

        n1 = type.attr("num");
        n2 = brand.attr("num");
        n3 = Price.index($(this));

        price.attr({ "num": n3 });

        Filter(n1, n2, n3);
    });

    //排序
    var Sort = $(".sort li");
    Sort.click(function () {
        Sort.removeClass("active");
        $(this).addClass("active");
        var n = Sort.index($(this));
        if (n == 0) {
            Type.eq(0).click();
            Brand.eq(0).click();
            Price.eq(0).click();
            $(".NoBookCar").show();
        }
        else {//不看满租
            Type.eq(0).click();
            Brand.eq(0).click();
            Price.eq(0).click();
            $(".NoBookCar").hide();
        }
    });
}

//筛选
function Filter(n1, n2, n3) {
    $(".noCar").hide();
    n1 = parseInt(n1);
    n2 = parseInt(n2);
    n3 = parseInt(n3);
    var carList = $(".carList>li"),
        TYPE = ["0", "紧凑型轿车", "舒适型轿车", "商务型轿车", "豪华型轿车", "SUV", "6至15座商务车", "其他"],
        BRAND = brand_List;
    carList.show();
    for (var i = 0; i < carList.length; i++) {
        var car = carList.eq(i),
            brand = car.find(".info>b>a").html(),
            type = car.find(".info>a").html(),
            price = car.find(".avePrice>b").html();
        if (TYPE[n1] == 0) {
            if (BRAND[n2] == 0) {
                if (priceRatio(price, n3) == false) {
                    car.hide();
                }
            }
            else {
                if (brand != BRAND[n2]) {
                    car.hide();
                }
                else {
                    if (priceRatio(price, n3) == false) {
                        car.hide();
                    }
                }
            }
        }
        else {
            if (type != TYPE[n1]) {
                car.hide();
            }
            else {
                if (BRAND[n2] == 0) {
                    if (priceRatio(price, n3) == false) {
                        car.hide();
                    }
                }
                else {
                    if (brand != BRAND[n2]) {
                        car.hide();
                    }
                    else {
                        if (priceRatio(price, n3) == false) {
                            car.hide();
                        }
                    }
                }
            }
        }
    }

    //计算可租车型数量
    var x = 0, y = 0;
    for (var j = 0; j < carList.length; j++) {
        var z = carList.eq(j);
        if (z.css("display") != "none") {
            x++;
            if (!z.hasClass("NoBookCar")) {
                y++;
            }
        }
    }
    $("#carNum").html(y);
    if (x == 0) {
        $(".noCar").show();
    }

}

//比较价格
function priceRatio(price, n) {
    price = parseInt(price);
    var isShow = true;
    switch (n) {
        case 1: {
            if (price > 150)
                isShow = false;
        } break;
        case 2: {
            if (price < 150 || price > 300)
                isShow = false;
        } break;
        case 3: {
            if (price < 300 || price > 500)
                isShow = false;
        } break;
        case 4: {
            if (price < 500)
                isShow = false;
        } break;
        default: isShow = true; break;
    }
    return isShow;
}

//登录
function login() {

}