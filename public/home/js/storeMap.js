var _token = $('meta[name=_token]').attr('content');
var Data = [],
    id = [],
    province = [],
    city = [],
    cityId = [],
    add_Province = [],//省份 添加
    add_Store = [],//门店添加
    add_Coordinate = [],//坐标添加
    city_num = [],//覆盖城市数量
    store_num = [],//该省门店数量
    province_,//去重省份
    city_;//去重城市

$(function () {
    dataLoad();//获取信息
    loadCity();
});

//获取信息
function dataLoad() {
    jQuery.ajax({
        // url: countryMap,
        // dataType: 'jsonp',
        url: nationalMap,
        dataType: 'json',
        type: 'post',
        data: {'_token': _token},
        success: function (result) {
            for (var i = 0; i < result.length; i++) {

                // -------- 国家重点保护单位 (*^_^*) --------
                for (var s in dsy.Items) {              // 循环全国地区列表 area.js
                    if (s == 0) continue;               // 如过键名为0跳过本次循环（0为省得数组）
                    if  ($.inArray(result[i].city_name, dsy.Items[s]) != -1) {
                        var key = s.split('_').pop();   //找当前城市的省键名
                        break;                          //找到后直接退出循环
                    }
                }
                // ------------------------------------------

                var x = result[i];
                // var y = name(x.province, x.city);//省市名称判断
                var y = name(dsy.Items[0][key], x.city_name);//省市名称判断

                x.province = y.province;
                x.city = y.city;

                var temp = {
                    "id": x.server_id,
                    "province": x.province,
                    "city": x.city,
                    "lng": x.coordinate.split(',')[0],
                    "lat": x.coordinate.split(',')[1],
                    "cityId": x.address_id
                };
                Data.push(temp);
            }
            index();
            City();
            Store();
            add_province();
            echarts();
        }
    });
}

//省市名称判断
function name(province, city) {
    var p = province, c = city;

    //省份
    if (p.substr(p.length - 1, 1) == "省" || p.substr(p.length - 1, 1) == "市") {
        p = p.substr(0, p.length - 1);
    }
    if (p.substr(p.length - 3, 3) == "自治区") {
        if (p.substr(0, 2) == "新疆") {
            p = "新疆";
        }
        else if (p.substr(0, 2) == "广西") {
            p = "广西";
        }
        else if (p.substr(0, 2) == "宁夏") {
            p = "宁夏";
        }
        else {
            p = p.substr(0, p.length - 3);
        }
    }
    if (p.substr(0, 2) == "香港") {
        p = "香港";
    }
    if (p.substr(0, 2) == "澳门") {
        p = "澳门";
    }
    //城市
    if (c.substr(c.length - 1, 1) == "市") {
        c.substr(0, c.length - 1);
    }
    if (c.substr(0, 2) == "香港") {
        c = "香港";
    }
    if (c.substr(0, 2) == "澳门") {
        c = "澳门";
    }

    var x = {
        province: p,
        city: c
    };
    return x;
}

//获取信息分类
function index() {
    for (var i = 0; i < Data.length; i++) {
        id.push(Data[i].id);
        province.push(Data[i].province);
        city.push(Data[i].city);

        var t = Data[i].cityId;
        cityId.push(t);
        var obj1 = { "name": t };
        var obj2 = {
            "name": t,
            "lng": Data[i].lng,
            "lat": Data[i].lat
        };
        add_Store.push(obj1);
        add_Coordinate.push(obj2);
    }
    province_ = removal(province);
    city_ = removal(city);
    add_Coordinate = count(add_Coordinate);
}
//省份 城市数量
function City() {
    for (var i = 0; i < province_.length; i++) {
        var temp = [];
        for (var j = 0; j < Data.length; j++) {
            if (Data[j].province == province_[i]) {
                temp.push(Data[j].city);
            }
        }
        city_num.push(removal(temp).length);
    }
}
//省份 门店数量
function Store() {
    for (var i = 0; i < province_.length; i++) {
        var num = 0;
        for (var j = 0; j < Data.length; j++) {
            if (Data[j].province == province_[i]) {
                num++;
            }
        }
        store_num.push(num);
    }
}
//省份添加
function add_province() {
    var t1 = [], t2 = [], t3 = [], t4 = [], html = "";
    for (var i = 0; i < province_.length; i++) {
        for (var j = 0; j < Data.length; j++) {
            if (Data[j].province == province_[i]) {
                t1.push(Data[j].city);
                t2.push(Data[j].cityId);
            }
        }
        t3 = removal(t1);
        t4 = removal(t2);

        for (var k = 0; k < t3.length; k++) {
            var m = t3[k];
            if (m == "县") {
                m = province_[i];
            }
            // html += "<a href='cityMap?city_id=" + t4[k] + "'>" + m + "<span>(";
            html += "<a href='cityMap?cityName=" + m + "'>" + m + "<span>(";
            var num = 0;
            for (var l = 0; l < Data.length; l++) {
                if (Data[l].cityId == t4[k]) {
                    num++;
                }
            }
            html += num + "家门店)</span></a><br/>"
        }

        var obj = {
            "name": province_[i],
            "rank": "覆盖" + city_num[i] + "座城市，共" + store_num[i] + "家门店",
            "count": html
        };
        add_Province.push(obj);
        t1 = []; t2 = []; t3 = []; t4 = []; html = "";
    }
}
//坐标添加
function count(x) {
    var point = "{";
    for (var i = 0; i < x.length; i++) {
        point += "\"" + x[i].name + "\":[" + x[i].lng + "," + x[i].lat + "],"
    }
    point = point.substr(0, point.length - 1) + "}";
    point = eval('(' + point + ')');
    return point;
}
//数组去重
function removal(initial) {
    var data = []; //排序并去重的
    for (var i = 0; i < initial.length; i++) {
        if (data.indexOf(initial[i]) == -1) data.push(initial[i]);
    }
    //data.sort();//排序A-Z
    return data;
}
//e charts
function echarts() {
    require.config({
        paths: {
            echarts: './Scripts'
        }
    });
    require(
        [
            'echarts',
            'echarts/chart/map'
        ],
        function (ec) {
            // --- 地图 ---
            var myMap = ec.init(document.getElementById('Map'));
            myMap.setOption({
                title: {
                    text: '全国门店查询',
                    x: 'center'
                },
                //悬浮框
                tooltip: {
                    trigger: 'item',
                    enterable: true,
                    hideDelay: 1000,
                    backgroundColor: 'rgba(0,0,0,0.8)',    //背景色
                    borderRadius: '2',                      //圆角
                    formatter: function (params, ticket, callback) {
                        if (!params.data.rank) {
                            params.data.rank = "暂无门店，敬请期待..."
                        }
                        var res = '<div class="tit">' + params.name + '</div>';//标题
                        res += '<div class="text">' + params.data.rank + '</div>';//简介
                        if (params.data.count) {
                            res += '<hr><div class="store">' + params.data.count + '</div>';//门店
                        }
                        setTimeout(function () { callback(ticket, res); }, 0);
                        return 'loading';
                    }
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    y: 'center',
                    data: ['China']
                },
                series: [
                    {
                        name: '中国',
                        type: 'map',
                        mapType: 'china',
                        selectedMode: 'multiple',
                        itemStyle: {
                            normal: {
                                label: { show: true },
                                color: '#EEEEEE',          //地图颜色
                                borderColor: '#CCCCCC'     //地区边界颜色
                            },
                            emphasis: {
                                label: { show: true },
                                color: 'rgba(180,180,180,0.5)', //鼠标滑过 地区颜色
                                borderColor: '#fff'             //鼠标滑过 地区边界颜色
                            }
                        },
                        //地区门店信息
                        data: add_Province,
                        //地区门店标记
                        markPoint: {
                            symbolSize: 2,  // 标注大小
                            tooltip: {
                                show: false,
                                showDelay: 10000
                            },
                            itemStyle: {
                                normal: {
                                    borderColor: '#FF6600',    //标注颜色
                                    borderWidth: 4,            // 标注边线线宽，单位px，默认为1
                                    label: { show: false }
                                },
                                emphasis: {
                                    borderColor: '#339933',    //鼠标滑过 标注颜色
                                    borderWidth: 5,              //鼠标滑过 标注边线线宽
                                    label: { show: false }
                                }
                            },
                            data: add_Store
                        },
                        geoCoord: add_Coordinate
                    }
                ]
            });
        }
    );
}

//获取 城市
function loadCity() {
    //加载城市
    $.post(getCityList, {'_token': _token}, function(result){
        var hotCity="",//热门城市
            touristCity='',//旅游城市
            letter=[];//首字母集合
        for(var i=0;i<result.length;i++)
        {
            if(result[i].city_type == 1)//旅游城市
            {
                // touristCity+="<span><a href='cityMap?city_id=" + result[i].city_id + "'>"+result[i].city_name+"市</a></span>";
                touristCity+="<span><a href='cityMap?cityName=" + result[i].city_name + "'>"+result[i].city_name+"市</a></span>";
            }
            if(result[i].city_type == 2)//热门城市
            {
                // hotCity+="<span><a href='cityMap?city_id=" + result[i].city_id + "'>"+result[i].city_name+"市</a></span>";
                hotCity+="<span><a href='cityMap?cityName=" + result[i].city_name + "'>"+result[i].city_name+"市</a></span>";
            }
            letter.push(result[i].city_abridge.substr(0, 1));//取第一个首字母

        }
        addCity(hotCity, touristCity, letter, result);
    }, 'json');
}

//添加 城市
function addCity(hotCity, touristCity, letter, result) {
    var specialCity = $(".hotCity");
        specialCity.eq(0).append(hotCity);
        specialCity.eq(1).append(touristCity);

    var data = []; //排序并去重的 首字母索引
    for (var i = 0; i < letter.length; i++) {
        if (data.indexOf(letter[i]) == -1)
            data.push(letter[i]);
    }
    data.sort();//排序A-Z

    var ul = $(".otherCity ul");

    for (var j = 0; j < data.length; j++) {
        ul.append("<li class='" + data[j] + "'><b>" + data[j] + "</b></li>");
    }

    for (var k = 0; k < result.length; k++) {
        // $("." + letter[k] + "").append("<a href='cityMap?city_id=" + result[k].city_id + "'>" + result[k].city_name + "市</a>");
        $("." + letter[k] + "").append("<a href='cityMap?cityName=" + result[k].city_name + "'>" + result[k].city_name + "市</a>");
    }
}