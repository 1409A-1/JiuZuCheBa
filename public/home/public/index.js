var shortCalendarNum = 0;

$(function () {
    jQuery(".menu_box li")[0].className = " on_menu";
    index_Of();
    position();//定位
    City();//城市
    calendar();//日历
    slide();//幻灯片
    discount();//优惠活动
    evaluate();//评价滚动
    Advertisement();//广告图

});

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
        $(".ta_calendar").hide();
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
        $(".ta_calendar").hide();
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
        $(".ta_calendar").hide();
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
        $(".ta_calendar").hide();
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
    takeHour.click(function (e) {
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
    returnHour.click(function (e) {
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

    //预订按钮
    //$("#startBook").click(function () {
    //    if (Duration($("#startDate").html(), $("#startHour").html(), $("#endDate").html(), $("#endHour").html())) {
    //        setShortInfo();//短租预订信息存储
    //    }
    //});

    //查看门店位置
    $(".toMap").click(function () {
        var temp = $(this).attr("out_in"), store;
        if (temp == "0") {
            store = $("#takeStore").find(".store a");
        } else {
            store = $("#returnStore").find(".store a");
        }
        var id = $(this).attr("storeID"), name, lng, lat;
        for (var i = 0; i < store.length; i++) {
            if (id == store.eq(i).attr("store_id")) {
                store.eq(i).click();
                name = store.eq(i).html();
                lng = store.eq(i).attr("lng");
                lat = store.eq(i).attr("lat");
                layer.open({
                    type: 1,
                    scrollbar: false,
                    area: '1000px',
                    shade: [0.8, '#000'],
                    title: false,
                    content: $("#storeMap")
                });
                storeMap(lng, lat, id, name);
                break;
            }
        }
    });
}

//门店信息 加载
function city_store(cityName, temp) {
    //temp：
    // 1为取车
    // 2为还车
    // 0为初始化加载
    jQuery.ajax({
        url: district_shop_list_url,
        dataType: 'jsonp',
        data: { "city_name": cityName },
        success: function (result) {
            switch (temp) {
                case 0: {
                    storeLoad(result);
                } break;
                case 1: {
                    takeStore(result);
                } break;
                case 2: {
                    returnStore(result);
                } break;
            }
        }
    });
}

//更改城市，门店加载
function storeLoad(result) {
    var id = [], area = [], address = [], start = [], end = [], traffic = [], name = [], data = [], lng = [], lat = [],
      startHours, endHours, t1, t2, html = "";
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
                html = "<li><a store_id='" + id[l] + "' num='" + l + "' lng='" + lng[l] + "' lat='" + lat[l] + "'>" + name[l] + "</a></li>";
                $(".store ul").eq(m).append(html);
            }
        }
    }
    $("#returnStore .store").html($("#takeStore .store").html());

    //默认门店初始化
    var defaultStore = $("#takeStore .store a").eq(0);
    $("#takeStore .show>a").html('请选择门店');
    $("#returnStore .show>a").html('请选择门店');




    setMeal();//优惠套餐
    book();//预定事件

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
        $("#takeStore .toMap").attr({ "storeID": id[n], "out_in": 0 });
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
        $("#returnStore .toMap").attr({ "storeID": id[n], "out_in": 1 });
    });

    //初始化 默认门店信息
    $("#takeStore .area a").eq(0).click();
    $("#returnStore .area a").eq(0).click();

    //初始化营业时间
    var N = $(".store ul").eq(0).find("a").eq(0).attr("num");
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
        $("#takeStore .toMap").attr({ "storeID": id[n], "out_in": 0 });
        startHours = start[n];
        endHours = end[n];
    }).click(function () {
        $("#takeStore .show>a").html($(this).html()).attr({
            "store_id": $(this).attr("store_id"),
            "lng": $(this).attr("lng"),
            "lat": $(this).attr("lat")
        });
        $("#takeStore .store_list").hide();
        shopHours(startHours, endHours, 1);//加载营业时间
        if ($("#takeCity .show>a").html() == $("#returnCity .show>a").html()) {
            $("#returnStore .show>a").html($(this).html()).attr({
                "store_id": $(this).attr("store_id"),
                "lng": $(this).attr("lng"),
                "lat": $(this).attr("lat")
            });
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
        $("#returnStore .toMap").attr({ "storeID": id[n], "out_in": 1 });
        startHours = start[n];
        endHours = end[n];
    }).click(function () {
        $("#returnStore .show>a").html($(this).html()).attr({
            "store_id": $(this).attr("store_id"),
            "lng": $(this).attr("lng"),
            "lat": $(this).attr("lat")
        });
        $("#returnStore .store_list").hide();
        shopHours(startHours, endHours, 2);
        if ($(this).attr("store_id") != $("#takeStore .show>a").attr("store_id")) {
            layer.tips('温馨提示：会产生异店还车费', '#returnStore', { tips: [2, '#ff7937'] });
        }
    });
}//取还车门店
function takeStore(result) {
    var id1 = [], area1 = [], address1 = [], start1 = [], end1 = [], traffic1 = [], name1 = [], data1 = [], lng1 = [], lat1 = [],
      startHours, endHours, t1, t2, html = "";
    $("#takeStore .store").html("");
    //获取数据
    for (var i = 0; i < result.length; i++) {
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
    for (var j = 0; j < area1.length; j++) {
        if (data1.indexOf(area1[j]) == -1) data1.push(area1[j]);
    }
    //添加区域
    for (var k = 0; k < data1.length; k++) {
        html += "<a>" + data1[k] + "</a>";
        $("#takeStore .store").append("<ul></ul>");
    }
    $("#takeStore .area").html(html);
    //添加门店
    for (var l = 0; l < area1.length; l++) {
        for (var m = 0; m < data1.length; m++) {
            if (area1[l] == data1[m]) {
                html = "<li><a store_id='" + id1[l] + "' num='" + l + "' lng='" + lng1[l] + "' lat='" + lat1[l] + "'>" + name1[l] + "</a></li>";
                $("#takeStore .store ul").eq(m).append(html);
            }
        }
    }
    //默认显示门店
    var defaultStore = $("#takeStore .store a").eq(0);
    $("#takeStore .show>a").html('请选择门店');
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
        $("#takeStore .toMap").attr({ "storeID": id1[n], "out_in": 0 });
    });
    //初始化营业时间
    var N = $("#takeStore .store ul").eq(0).find("a").eq(0).attr("num");
    startHours = start1[N];
    endHours = end1[N];
    shopHours(startHours, endHours, 1);
    //取车门店
    $("#takeStore .store a").hover(function () {
        $("#takeStore .store a").removeClass("active");
        $(this).addClass("active");
        var n = $(this).attr("num");
        $("#takeStore .storeAddress").html(address1[n]);
        $("#takeStore .storeTime").html(start1[n] + "—" + end1[n]);
        $("#takeStore .storeWay").html(traffic1[n]);
        $("#takeStore .toMap").attr({ "storeID": id1[n], "out_in": 0 });
        startHours = start1[n];
        endHours = end1[n];
    }).click(function () {
        $("#takeStore .show>a").html($(this).html()).attr({
            "store_id": $(this).attr("store_id"),
            "lng": $(this).attr("lng"),
            "lat": $(this).attr("lat")
        });
        $("#takeStore .store_list").hide();
        shopHours(startHours, endHours, 1);//加载营业时间
        if ($("#takeCity .show>a").html() == $("#returnCity .show>a").html()) {
            $("#returnStore .show>a").html($(this).html()).attr({
                "store_id": $(this).attr("store_id"),
                "lng": $(this).attr("lng"),
                "lat": $(this).attr("lat")
            });
            shopHours(startHours, endHours, 2);//加载营业时间
        }
    });
}//取车门店
function returnStore(result) {
    var id2 = [], area2 = [], address2 = [], start2 = [], end2 = [], traffic2 = [], name2 = [], data2 = [], lng2 = [], lat2 = [],
      startHours, endHours, t1, t2, html = "";
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
                html = "<li><a store_id='" + id2[l] + "' num='" + l + "' lng='" + lng2[l] + "' lat='" + lat2[l] + "'>" + name2[l] + "</a></li>";
                $("#returnStore .store ul").eq(m).append(html);
            }
        }
    }
    //默认显示门店
    var defaultStore = $("#returnStore .store a").eq(0);
    $("#returnStore .show>a").html('请选择门店');
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
        $("#returnStore .toMap").attr({ "storeID": id2[n], "out_in": 1 });
    });
    //初始化营业时间
    var N = $("#takeStore .store ul").eq(0).find("a").eq(0).attr("num");
    startHours = start2[N];
    endHours = end2[N];
    shopHours(startHours, endHours, 2);
    //还车门店
    $("#returnStore .store a").hover(function () {
        $("#returnStore .store a").removeClass("active");
        $(this).addClass("active");
        var n = $(this).attr("num");
        $("#returnStore .storeAddress").html(address2[n]);
        $("#returnStore .storeTime").html(start2[n] + "—" + end2[n]);
        $("#returnStore .storeWay").html(traffic2[n]);
        $("#returnStore .toMap").attr({ "storeID": id2[n], "out_in": 1 });
        startHours = start2[n];
        endHours = end2[n];
    }).click(function () {
        $("#returnStore .show>a").html($(this).html()).attr({
            "store_id": $(this).attr("store_id"),
            "lng": $(this).attr("lng"),
            "lat": $(this).attr("lat")
        });
        $("#returnStore .store_list").hide();
        shopHours(startHours, endHours, 2);
        if ($(this).attr("store_id") != $("#takeStore .show>a").attr("store_id")) {
            layer.tips('温馨提示：会产生异店还车费', '#returnStore', { tips: [2, '##ff7937'] });
        }
    });
}//还车门店

//营业时间
function shopHours(startHours, endHours, temp) {//temp 1为取车时间  2为还车时间
    var startH = parseInt(startHours.substr(0, 2)),//时
        startM = parseInt(startHours.substr(3, 2)),//分
        endH = parseInt(endHours.substr(0, 2)),
        endM = parseInt(endHours.substr(3, 2)),
        html = "", k, time, hour, min;
    var startHour = $("#startHour"),
        endHour = $("#endHour"),
        takeHour = $("#takeHour").find(".hourBox"),
        returnHour = $("#returnHour").find(".hourBox");

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
        for (i = startH; i < endH; i++) {
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
            takeHour.html(html).attr({ "startHours": startHours, "endHours": endHours });
            time = startHour.html();
            hour = parseInt(time.substr(0, 2));
            min = parseInt(time.substr(3, 2));
            //当前选中时间不在此门店营业时间内时
            if (hour < startH || hour > endH) {
                startHour.html("10:00");
            }
            else if (hour == startH) {
                if (min < startM) {
                    startHour.html("10:00");
                }
            }
            else if (hour == endH) {
                if (min > endM) {
                    startHour.html("10:00");
                }
            }
        } break;
        case 2: {
            returnHour.html(html).attr({ "startHours": startHours, "endHours": endHours });
            time = endHour.html();
            hour = parseInt(time.substr(0, 2));
            min = parseInt(time.substr(3, 2));
            //当前选中时间不在此门店营业时间内时
            if (hour < startH || hour > endH) {
                endHour.html("10:00");
            }
            else if (hour == startH) {
                if (min < startM) {
                    endHour.html("10:00");
                }
            }
            else if (hour == endH) {
                if (min > endM) {
                    endHour.html("10:00");
                }
            }
        } break;
    }

    //营业时间选择
    takeHour.find("a").click(function () {
        startHour.html($(this).html());
        endHour.html($(this).html());
        //计算租期
        Duration($("#startDate").html(), startHour.html(), $("#endDate").html(), endHour.html());
    });
    returnHour.find("a").click(function () {
        endHour.html($(this).html());
        Duration($("#startDate").html(), startHour.html(), $("#endDate").html(), endHour.html());
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
            startDate.html(date_format(out_time, "yyyy-MM-dd"));
            endDate.html(date_format(in_time, "yyyy-MM-dd"));
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
        layer.tips('还车时间应大于取车时间', '#returnHour', { tips: [2, '#3ac9fb'] });
        duration = "×";
    }
    else if (x.times > maxDuration) {
        layer.tips('短租租期不得超过29天<br>超过29天请选择长租更划算', '#returnHour', { tips: [2, '#3ac9fb'] });
    }
    else if (x.totalhours < 24) {
        layer.tips('租车时长不得小于24小时', '#returnHour', { tips: [2, '#3ac9fb'] });
    }
    else if (date_subtract(nowTime, start).times < 0) {
        layer.tips('取车时间不得小于当前时间<br>请重新选取时间', '#takeHour', { tips: [2, '#3ac9fb'] });
    }
    else if ($('#takeStore a').html() == '请选择门店') {
        layer.tips('请选择门店', '#takeStore', { tips: [2, '#3ac9fb'] });
    }
    else {
        isOK = true;
    }
    $("#duration").html(duration);//租期显示
    return isOK;
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
                allCity = '',//全部城市

                letter = [],//首字母集合
                temp;
            for (var i = 0; i < result.length; i++) {
                if ((result[i].city_type & 4) == 4)//旅游城市
                {
                    touristCity += "<span><a>" + result[i].city_name + "</a></span>";
                }

                if ((result[i].city_type & 2) == 2)//热门城市
                {
                    hotCity += "<span><a onclick=\"tuijian_clik('" + result[i].city_name + "')\">" + result[i].city_name + "</a></span>";
                }

                temp = result[i].city_name;//全部城市列表
                if (temp != "乌鲁木齐") {
                    temp = temp.substr(0, temp.length - 1);
                }
                letter.push(result[i].city_abridge.substr(0, 1));//取第一个首字母
            }
            $(".hotCityList div").html(hotCity);//推荐车型 热门城市
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

    //还车城市
    $("#returnCar .city_list_body").html($("#takeCity .city_list_body").html());
}

//优惠活动
function discount() {
    var li = $(".discountBox li");
    li.hover(function () {
        li.removeClass("active");
        $(this).addClass("active");
    });
}

//定位
function position() {
    $.ajax({
        url: "http://api.map.baidu.com/location/ip?ak=G1124lxcYCI56HOSOx1YIN6e",
        dataType: 'jsonp',
        success: function (e) {

            var city = e.content.address_detail.city,
                point = new BMap.Point(e.content.point.x, e.content.point.y);

            city_store(city, 0);//初始化加载门店
            $("#takeCity .show>a").html(city);
            $("#returnCity .show>a").html(city);

            $(".aroundStore>a>b").html(city);//附近门店 显示城市
            initMap(point, city);
            $(".hotCity b").html(city);
            bind_tuijian(city);
        }
    });

}

//百度地图
function initMap(point, city) {
    var map = new BMap.Map("map");// 初始化地图
    map.centerAndZoom(point, 11);     // 设置中心点坐标和地图级别,point为定位地点

    var navigationControl = new BMap.NavigationControl({
        // 靠左上角位置
        anchor: BMAP_ANCHOR_TOP_RIGHT,
        // LARGE类型
        type: BMAP_NAVIGATION_CONTROL_ZOOM
        // 启用显示定位
    });
    map.addControl(navigationControl);
    // 添加定位控件

    var A = new BMap.Icon("/content/images/index/map1.png", new BMap.Size(25, 35)),//门店标注样式
        B = new BMap.Icon("/content/images/index/map2.png", new BMap.Size(25, 35)),
        C = new BMap.Icon("/content/images/index/map3.png", new BMap.Size(25, 35)),
        D = new BMap.Icon("/content/images/index/map4.png", new BMap.Size(25, 35));

    add_marker(city); //添加门店标注
    //根据 城市 添加 附近门店 标注
    function add_marker(city) {
        jQuery.ajax({
            url: district_shop_list_url,
            dataType: 'jsonp',
            data: { "city_name": city },
            success: function (result) {
                map.centerAndZoom(new BMap.Point(result[0].latitude, result[0].longitude), 11);//设置当前城市第一个门店为中心点
                var store = $(".aroundStore li"),
                    num = result.length;
                if (num > 4)
                    num = 4;
                for (var i = 0; i < num; i++) {
                    //获取门店信息
                    var store_id = result[i].id,
                        store_name = result[i].structure_name,
                        lat = result[i].latitude,//经度
                        lon = result[i].longitude;//纬度

                    store.eq(i).html(store_name);

                    //添加当前城市门店标注
                    var storePoint = new BMap.Point(lat, lon),
                        storeMarker,
                        url = "/home/doom?shop_id=" + store_id,
                        add = "<a href='" + url + "' style='color: #ea5506;font-size: 12px'>进入门店</a>",
                        opts = { title: store_name },
                        infoWindow = new BMap.InfoWindow(add, opts);  // 创建信息窗口对象

                    switch (i) {
                        case 0:
                            store.eq(i).html("A.<a href='" + url + "'>" + store_name + "</a>");
                            storeMarker = new BMap.Marker(storePoint, { icon: A });
                            break;
                        case 1:
                            store.eq(i).html("B.<a href='" + url + "'>" + store_name + "</a>");
                            storeMarker = new BMap.Marker(storePoint, { icon: B });
                            break;
                        case 2:
                            store.eq(i).html("C.<a href='" + url + "'>" + store_name + "</a>");
                            storeMarker = new BMap.Marker(storePoint, { icon: C });
                            break;
                        case 3:
                            store.eq(i).html("D.<a href='" + url + "'>" + store_name + "</a>");
                            storeMarker = new BMap.Marker(storePoint, { icon: D });
                            break;
                    }
                    map.addOverlay(storeMarker);
                    addClickHandler(storeMarker, url);
                }
            }
        });

    }

    //标注 点击
    function addClickHandler(storeMarker, url) {
        storeMarker.addEventListener("click", function () {
            window.open(url);
        });
    }
}

//评价滚动
function evaluate() {
    var list = $(".experience2"),
        num = list.find("li").length,
        t = 3000,
        h = 111,
        top,//到顶部高度
        uh = h * (num - 3);

    var move = function () {
        top = list.scrollTop();
        if (top >= uh)
            top = -h;
        list.animate({ "scrollTop": top + h });
    };

    var auto = setInterval(move, t);
    list.hover(function () {
        clearInterval(auto)
    }, function () {
        auto = setInterval(move, t);
    })
}

//广告图
function Advertisement() {
    var img = $(".Advertisement"),
        img1 = $(".Advertisement img"),
        exit = $(".AdvertisementExit");

    exit.click(function () {
        img.css({ "left": "-100%" });
        setTimeout(function () {
            img1.css({ "left": 0 });
        }, 500);
    });
    img1.hover(function () {
        img1.css({ "left": "-120px" });
        setTimeout(function () {
            img.css({ "left": 0 });
        }, 500);
    });
    //定时关闭
    setTimeout(function () {
        img.css({ "left": "-100%" });
        setTimeout(function () {
            img1.css({ "left": 0 });
        }, 500);
    }, 8000);
}

//套餐预订
function setMeal() {
    var setMeal = $(".setMeal>div");

    setMeal.click(function () {
        var n = setMeal.index($(this)),
            shopId = $("#takeStore").find(".show>a").attr("store_id"),
            outTime, inTime,
            nowTime = new Date();

        outTime = date_adddays(nowTime, 1);
        outTime = date_format(outTime, "yyyy-MM-dd");

        switch (n) {
            case 0: {
                inTime = date_adddays(outTime, 3);
            } break;
            case 1: {
                inTime = date_adddays(outTime, 4);
            } break;
            case 2: {
                inTime = date_adddays(outTime, 7);
            } break;
        }
        inTime = date_format(inTime, "yyyy-MM-dd");
        //传值到短租页面
        location.href = '/home/doom?shop_id=' + shopId + '&StartDateTime=' + outTime + '&EndDateTime=' + inTime;
    });

    setMeal.hover(function () {
        $(this).addClass("active");
    }, function () {
        $(this).removeClass("active");
    });

}

//绑定推荐车型
function bind_tuijian(city) {
    //加载城市
    jQuery.ajax({
        url: special_class_list_url,
        data: { city: city },
        dataType: 'jsonp',
        success: function (result) {
            var html = [];
            if (result) {
                for (var i = 0; i < result.length; i++) {
                    html.push("<div>");
                    html.push("<div class=\"recCarBox\" onclick=\"doom_tj(" + result[i].id + "," + result[i].class_id + ")\">");
                    html.push("<div class=\"carImg\">");
                    html.push("<p>" + result[i].brand_name + result[i].honda + "</p>");
                    html.push("<img src=" + result[i].class_image.replace('~', api_url) + ">");
                    html.push("</div>");
                    html.push("<div class=\"price\">");
                    html.push("<b>￥" + result[i].work_week_price + "</b>");
                    html.push("<span>" + date_format(date_adddays(new Date(), 5), "yyyy-MM-dd") + "</span>");
                    html.push("</div>");
                    html.push("<div class=\"carIcon\">");
                    html.push("<div>");
                    html.push("<i class=\"icon icon_car2\"></i>");
                    html.push("<a>" + result[i].gearbox + "</a>");
                    html.push("</div>");
                    html.push("<div>");
                    html.push("<i class=\"icon icon_car3\"></i>");
                    html.push("<a>" + result[i].let_litre + "</a>");
                    html.push("</div>");
                    html.push("<div class=\"last_carIcon\">");
                    html.push("<i class=\"icon icon_car4\"></i>");
                    html.push("<a>乘坐" + result[i].seat_count + "人</a>");
                    html.push("</div>");
                    html.push("</div>");
                    html.push("</div>");
                    html.push("</div>");
                }
                if (result.length < 5) {
                    html.push("<div>");
                    html.push("<div class=\"recCarBox\">");
                    html.push("<div class=\"carImg\">");
                    html.push("<div class=\"noImg\"></div>");
                    html.push("</div>");
                    html.push("<a href=\"/home/doom\" class=\"button\">查看其他车型</a>");
                    html.push("</div>");
                    html.push("</div>");
                }
            } else {
                html.push("<div>");
                html.push("<div class=\"recCarBox\">");
                html.push("<div class=\"carImg\">");
                html.push("<div class=\"noImg\"></div>");
                html.push("</div>");
                html.push("<a href=\"/home/doom\" class=\"button\">查看其他车型</a>");
                html.push("</div>");
                html.push("</div>");
            }
            $(".recCar").html(html.join(''));
        }
    });
}

function tuijian_clik(city) {
    $(".hotCity b").html(city);
    bind_tuijian(city);
}

function doom_tj(id, class_id) {
    $("#shop_id").val(id);
    $("#class_id").val(class_id);
    $("#StartDateTime").val(date_format(date_adddays(new Date(), 5), "yyyy-MM-dd"));
    $("#EndDateTime").val(date_format(date_adddays(new Date(), 7), "yyyy-MM-dd"));
    $("#fmtuijian").submit();
}

//门店地图 查看
function storeMap(lng, lat, id, name) {
    var storePoint = new BMap.Point(lng, lat),
      mapIcon = new BMap.Icon("/content/images/index/map.png", new BMap.Size(25, 35)),
      storeMarker = new BMap.Marker(storePoint, { icon: mapIcon });
    var map = new BMap.Map("storeMap");
    map.centerAndZoom(storePoint, 20);
    map.enableScrollWheelZoom(true);
    map.addOverlay(storeMarker);
    //添加地图标注 点击 打开窗口信息
    var infoWindow, url, html;
    url = "http://www.dafang24.com/home/doom?shop_id=" + id;
    html = "<div class='box' id='" + id + "'>" +
      "<a class='title' href='" + url + "'>大方租车 " + name + "</a>" +
      "<a class='comments' href='#" + id + "'>查看评论</a>" +
      "<a class='toStore' href='" + url + "'>立 即 订 车<i></i></a>" +
      "<div class='nav'><div class='toHere active'>" +
      "<i class='iconMap icon_M2'></i>到这里去</div>" +
      "<div class='goHere'>从这里出发<i class='iconMap icon_M4'></i></div>" +
      "<div class='find'>在附近找<i class='iconMap icon_M5'></i></div></div>" +
      "<div class='navBox'><div class='to'>" +
      "<input type='text' placeholder='请输入起点' class='place'>" +
      "<input type='button' value='驾车' class='car'>" +
      "<input type='button' value='公交' class='bus'></div>" +
      "<div class='go'>" +
      "<input type='text' placeholder='请输入终点' class='place'>" +
      "<input type='button' value='驾车' class='car'>" +
      "<input type='button' value='公交' class='bus'></div>" +
      "<div class='search'>" +
      "<input type='text' placeholder='请输入您要查找的地方' class='place'>" +
      "<input type='button' value='搜索' class='seaBut'></div></div>" +
      "</div>";
    infoWindow = new BMap.InfoWindow(html); // 创建信息窗口对象
    addClickHandler(storeMarker, storePoint, infoWindow, id);//开启信息窗口

    //标注 点击
    function addClickHandler(storeMarker, storePoint, infoWindow) {
        storeMarker.addEventListener("click", function () {
            map.openInfoWindow(infoWindow, storePoint); //开启信息窗口
            nav(storePoint);//导航
        });
    }

    //导航
    function nav(point) {
        var title = $(".nav>div"), body = $(".navBox>div"), n;
        //功能切换
        $(".toHere").click(function () {
            title.removeClass("active");
            $(this).addClass("active").
              find("i").removeClass("icon_M3").addClass("icon_M2");
            title.eq(1).find("i").removeClass("icon_M2").addClass("icon_M4");
            title.eq(2).find("i").removeClass("icon_M6").addClass("icon_M5");
            n = title.index($(this));
            body.hide().eq(n).show();
        });
        $(".goHere").click(function () {
            title.removeClass("active");
            $(this).addClass("active").
              find("i").removeClass("icon_M4").addClass("icon_M2");
            title.eq(0).find("i").removeClass("icon_M2").addClass("icon_M3");
            title.eq(2).find("i").removeClass("icon_M6").addClass("icon_M5");
            n = title.index($(this));
            body.hide().eq(n).show();
        });
        $(".find").click(function () {
            title.removeClass("active");
            $(this).addClass("active").
              find("i").removeClass("icon_M5").addClass("icon_M6");
            title.eq(0).find("i").removeClass("icon_M2").addClass("icon_M3");
            title.eq(1).find("i").removeClass("icon_M2").addClass("icon_M4");
            n = title.index($(this));
            body.hide().eq(n).show();
        });
        var dom = $("#storeMap"),
          start, end, search;
        //到这里去
        dom.find(".to .car").click(function () {
            start = dom.find(".to .place").val();//输入起点
            var driving = new BMap.DrivingRoute(map,
              {
                  renderOptions: {
                      map: map,
                      panel: "way",
                      autoViewport: true
                  }, policy: 1
              });
            driving.search(start, point);
        });
        dom.find(".to .bus").click(function () {
            start = dom.find(".to .place").val();
            var transit = new BMap.TransitRoute(map, {
                renderOptions: { map: map }
            });
            transit.search(start, point);
        });
        //从这里出发
        dom.find(".go .car").click(function () {
            end = dom.find(".go .place").val();//输入终点
            var driving = new BMap.DrivingRoute(map, { renderOptions: { map: map, autoViewport: true }, policy: 1 });
            driving.search(point, end);
        });
        dom.find(".go .bus").click(function () {
            end = dom.find(".go .place").val();
            var transit = new BMap.TransitRoute(map, {
                renderOptions: { map: map }
            });
            transit.search(point, end);
        });
        //搜索
        dom.find(".seaBut").click(function () {
            var local = new BMap.LocalSearch(map, {
                renderOptions: {
                    map: map,
                    autoViewport: false
                }
            });
            search = dom.find(".search .place").val();
            local.searchNearby(search, point, 1000);
            map.setZoom(16);//放大地图
        });
    }
}