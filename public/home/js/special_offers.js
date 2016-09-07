grade = {};
grade["普通会员"] = 3;
grade["银卡会员"]=4;
grade["金卡会员"]=5;
grade["白金会员"]=6;
grade["黑名单禁租"]=1;
grade["黑名单警告"] = 2;
type = {};
type["正常"]=1;
type["禁租"]=2;
type["警告"]=3;

var weeks = [64, 1, 2, 4, 8, 16, 32];
var charge_mode_times = 2;

var weeks = [64, 1, 2, 4, 8, 16, 32];
var charge_mode_times = 2
function get_enabled_offers(offers_list, class_id, start_date, stop_date, stop_shop_id, total_rent_times, customer_type, customer_grade, price_list) {
    var data = new Array();
    if (offers_list && offers_list.length > 0) {
        for (var i = 0; i < offers_list.length; i++) {
            //判断当前优惠活动是否对应当前订单的车型
            if (offers_list[i].special_offers_auto_class && offers_list[i].special_offers_auto_class.length > 0) {
                var has_auto_class = false;
                for (var j = 0; j < offers_list[i].special_offers_auto_class.length; j++) {
                    if (offers_list[i].special_offers_auto_class[j].auto_class_id == class_id) {
                        has_auto_class = true;
                        break;
                    }
                }
                if (!has_auto_class) {
                    continue;
                }
            }
            //判断优惠活动是否在租赁的时间范围内
            var start = date_format(start_date);
            var stop = date_format(stop_date);
            if (offers_list[i].start_date && date_format(offers_list[i].start_date) >= stop) {
                continue;
            }
            if (offers_list[i].end_date && date_format(offers_list[i].end_date) < start) {
                continue;
            }
            start = get_date(date_clone(start));
            stop = get_date(date_clone(stop));
            //优惠活动内最少租赁天数
            var inner_rent_days = 0;
            var rent_days = 0;
            for (var j = 0; j < price_list.length; j++) {
                var pd = date_format(price_list[j].price_date);
                if (pd >= start && pd < stop) {
                    rent_days++;
                    if (price_list[j].date_type != 3 || (offers_list[i].share_group & 2) == 2) {
                        if ((!offers_list[i].start_date || date_format(price_list[j].price_date) >= date_format(offers_list[i].start_date)) && (!offers_list[i].end_date || date_format(price_list[j].price_date) <= date_format(offers_list[i].end_date))) {
                            inner_rent_days++;
                        }
                    }
                }
            }
            if (offers_list[i].min_inner_rent_days > inner_rent_days) {
                continue;
            }
            if (offers_list[i].min_rent_days > rent_days) {
                continue;
            }
            //提前预定天数
            var now = new Date();
            var pre_order_days = (date_format(start_date).getTime() - now.getTime()) / (1000 * 3600);
            if (pre_order_days < 0) {
                pre_order_days = 0;
            }
            if (pre_order_days < offers_list[i].pre_order_days) {
                continue;
            }
            //判断当前日期是否包含优惠日
            var hasday = false;
            for (var j = 0; j < offers_list[i].special_offers_content.length; j++) {
                if ((offers_list[i].special_offers_content[j].preferential_day & 384) != 0) {
                    hasday = true;
                    break;
                }
                else {
                    while (start < stop) {
                        if ((offers_list[i].special_offers_content[j].preferential_day & weeks[start.getDay()]) != 0) {
                            hasday = true;
                            break;
                        }
                        start = date_adddays(start, 1);
                    }
                    if (hasday) {
                        break;
                    }
                }
            }
            if (!hasday) {
                continue;
            }
            //判断当前还车门店是否可用
            if (offers_list[i].special_offers_stop_shop_condition && offers_list[i].special_offers_stop_shop_condition.length > 0) {
                var back_shop_is_allow = false;
                for (var j = 0; j < offers_list[i].special_offers_stop_shop_condition.length; j++) {
                    if (offers_list[i].special_offers_stop_shop_condition[j].stop_shop_id == stop_shop_id) {
                        back_shop_is_allow = true;
                        break;
                    }
                }
                if (!back_shop_is_allow) {
                    continue;
                }
            }
            //判断会员性质
            if ((offers_list[i].customer_quality == 1 && total_rent_times != 0) || (offers_list[i].customer_quality == 2 && total_rent_times == 0)) {
                continue;
            }
            //判断会员等级
            var g = 4;
            if (customer_type == type["正常"]) {
                switch (customer_grade) {
                    case grade["普通会员"]:
                        g = 4;
                        break;
                    case grade["银卡会员"]:
                        g = 8;
                        break;
                    case grade["金卡会员"]:
                        g = 16;
                        break;
                    case grade["白金会员"]:
                        g = 32;
                        break;
                }
            }
            else if (customer_type == type["警告"]) {
                g = 2;
            }
            else if (customer_type == type["禁租"]) {
                g = 1;
            }
            if (offers_list[i].customer_grade != 0 && (offers_list[i].customer_grade & g) == 0) {
                continue;
            }
            //订单来源
            if (offers_list[i].order_type != null && offers_list[i].order_type != 0 && (2 & offers_list[i].order_type) == 0) {
                continue;//未满足条件继续下一个
            }
            //当前优惠活动可以参加
            data.push(offers_list[i]);
        }
    }
    return data;
}
function get_offers_date(offer, content, p, start, end) {
    var pricelist = new Array();
    for (var i = 0; i < p.length; i++) {
        var d = date_format(p[i].price_date);
        if (d >= start && d < end) {
            pricelist.push(p[i]);
        }
    }
    var data = new Array();
    var index = 0;
    var start_date, end_date;
    for (var i = 0; i < pricelist.length; i++) {
        if (!start_date || date_format(pricelist[i].price_date) < start_date) {
            start_date = date_format(pricelist[i].price_date);
        }
        if (!end_date || date_format(pricelist[i].price_date) > end_date) {
            end_date = date_format(pricelist[i].price_date);
        }
    }
    if (offer.start_date && date_format(offer.start_date) > start_date) {
        start_date = date_format(offer.start_date);
    }
    if (offer.end_date && date_format(offer.end_date) < end_date) {
        end_date = date_format(offer.end_date);
    }
    switch (content.calc_day_method) {
        case 1:
            pricelist.sort(function (a, b) { return b.real_price - a.real_price });
            for (var i = 0; i < pricelist.length; i++) {
                var orderdate = date_format(pricelist[i].price_date);
                if (content.preferential_day == 0 || (content.preferential_day & weeks[orderdate.getDay()]) != 0 || (content.preferential_day & 256) == 256 && orderdate.toDateString() == end_date.toDateString() || (content.preferential_day & 128) == 128 && orderdate.toDateString() == start_date.toDateString()) {
                    if (pricelist[i].date_type != 3 || (offer.share_group & 2) == 2) {
                        ++index;
                        data.push(pricelist[i]);
                        if (content.offers_days <= index) {
                            break;
                        }
                    }
                }
            }
            break;
        case 2:
            pricelist.sort(function (a, b) { return a.real_price - b.real_price });
            for (var i = 0; i < pricelist.length; i++) {
                var orderdate = date_format(pricelist[i].price_date);
                if (content.preferential_day == 0 || (content.preferential_day & weeks[orderdate.getDay()]) != 0 || (content.preferential_day & 256) == 256 && orderdate.toDateString() == end_date.toDateString() || (content.preferential_day & 128) == 128 && orderdate.toDateString() == start_date.toDateString()) {
                    if (pricelist[i].date_type != 3 || (offer.share_group & 2) == 2) {
                        ++index;
                        data.push(pricelist[i]);
                        if (content.offers_days <= index) {
                            break;
                        }
                    }
                }
            }
            break;
        case 3:
            pricelist.sort(function (a, b) { return date_format(a.price_date).getTime() - date_format(b.price_date).getTime() });
            for (var i = 0; i < pricelist.length; i++) {
                var orderdate = date_format(pricelist[i].price_date);
                var day = orderdate.getDay();
                if (content.preferential_day == 0 || (content.preferential_day & weeks[orderdate.getDay()]) != 0 || (content.preferential_day & 256) == 256 && orderdate.toDateString() == end_date.toDateString() || (content.preferential_day & 128) == 128 && orderdate.toDateString() == start_date.toDateString()) {
                    if (pricelist[i].date_type != 3 || (offer.share_group & 2) == 2) {
                        ++index;
                        data.push(pricelist[i]);
                        if (content.offers_days <= index) {
                            break;
                        }
                    }
                }
            }
            break;
        case 4:
            pricelist.sort(function (a, b) { return date_format(b.price_date).getTime() - date_format(a.price_date).getTime() });
            for (var i = 0; i < pricelist.length; i++) {
                var orderdate = date_format(pricelist[i].price_date);
                if (content.preferential_day == 0 || (content.preferential_day & weeks[orderdate.getDay()]) != 0 || (content.preferential_day & 256) == 256 && orderdate.toDateString() == end_date.toDateString() || (content.preferential_day & 128) == 128 && orderdate.toDateString() == start_date.toDateString()) {
                    if (pricelist[i].date_type != 3 || (offer.share_group & 2) == 2) {
                        ++index;
                        data.push(pricelist[i]);
                        if (content.offers_days <= index) {
                            break;
                        }
                    }
                }
            }
            break;
        case 5:
            pricelist.sort(function (a, b) { return date_format(a.price_date).getTime() - date_format(b.price_date).getTime() });
            for (var i = 0; i < pricelist.length; i++) {
                var orderdate = date_format(pricelist[i].price_date);
                if (content.preferential_day == 0 || (content.preferential_day & weeks[orderdate.getDay()]) != 0 || (content.preferential_day & 256) == 256 && orderdate.toDateString() == end_date.toDateString() || (content.preferential_day & 128) == 128 && orderdate.toDateString() == start_date.toDateString()) {
                    if (pricelist[i].date_type != 3 || (offer.share_group & 2) == 2) {
                        ++index;
                        if (content.offers_days <= index) {
                            data.push(pricelist[i]);
                        }
                    }
                }
            }
            break;
    }
    return data;
}
function calc_time_out_charge(start_date, stop_date, time_out_fee, max, min) {
    var ts = new time_span(date_format(stop_date).getTime() - date_format(start_date).getTime());
    var total_days = ts.totaldays;
    var rent_days = parseInt(total_days);
    var charge = 0;

    if (total_days > rent_days + min / (24.0 * 60) && total_days <= rent_days + max / (24.0 * 60)) {
        charge = time_out_fee * Math.round((ts.totalhours - min / 60.0) % 24);
    }
    return charge;
}
function calc_services_charge(vas, rent_date) {
    var charge = 0;
    if (vas.charge_mode == charge_mode_times) {
        charge = vas.unit_price;
    }
    else {
        if (vas.capped_price != 0) {
            if (rent_date <= vas.capped_price) {
                charge = rent_date * vas.unit_price;
            }
            else {
                charge = vas.unit_price * vas.capped_price;
            }
        }
        else {
            charge = rent_date * vas.unit_price;
        }
    }
    return charge;
}
function calc_offers_result(selected_offers, or, start, stop) {
    if (selected_offers) {
        if (jQuery.isArray(selected_offers)) {
            for (var i = 0; i < selected_offers.length; i++) {
                selected_offers[i].amount = 0;
                for (var j = 0; j < selected_offers[i].special_offers_content.length; j++) {
                    if (selected_offers[i].special_offers_content[j].preferential_type == 2) {
                        var data = get_offers_date(selected_offers[i], selected_offers[i].special_offers_content[j], or, start, stop);
                        for (var k = 0; k < data.length; k++) {
                            data[k].ok_price = Math.round(selected_offers[i].special_offers_content[j].preferential_amount);
                            selected_offers[i].amount += Math.round((data[k].real_price - data[k].ok_price));
                        }
                    }
                }
            }
            for (var i = 0; i < selected_offers.length; i++) {
                for (var j = 0; j < selected_offers[i].special_offers_content.length; j++) {
                    if (selected_offers[i].special_offers_content[j].preferential_type == 1) {
                        var data = get_offers_date(selected_offers[i], selected_offers[i].special_offers_content[j], or, start, stop);
                        for (var k = 0; k < data.length; k++) {
                            var ok_price = data[k].ok_price;
                            data[k].ok_price = Math.round(data[k].ok_price * selected_offers[i].special_offers_content[j].preferential_amount * 0.1);
                            selected_offers[i].amount += Math.round(ok_price - data[k].ok_price);
                        }
                    }
                }
            }
            for (var i = 0; i < selected_offers.length; i++) {
                for (var j = 0; j < selected_offers[i].special_offers_content.length; j++) {
                    if (selected_offers[i].special_offers_content[j].preferential_type == 3) {
                        var data = get_offers_date(selected_offers[i], selected_offers[i].special_offers_content[j], or, start, stop);
                        for (var k = 0; k < data.length; k++) {
                            var ok_price = data[k].ok_price;
                            data[k].ok_price -= Math.round(selected_offers[i].special_offers_content[j].preferential_amount);
                            if (data[k].ok_price < 0)
                                data[k].ok_price = 0;
                            selected_offers[i].amount += Math.round(ok_price - data[k].ok_price);
                        }
                        if (selected_offers[i].special_offers_content[j].calc_day_method == 6) {
                            var a = Math.round(selected_offers[i].special_offers_content[j].preferential_amount);
                            selected_offers[i].amount += a;
                        }
                    }
                }
            }
        }
        else {

            selected_offers.amount = 0;

            for (var j = 0; j < selected_offers.special_offers_content.length; j++) {
                if (selected_offers.special_offers_content[j].preferential_type == 2) {
                    var data = get_offers_date(selected_offers, selected_offers.special_offers_content[j], or, start, stop);
                    for (var k = 0; k < data.length; k++) {
                        data[k].ok_price = Math.round(selected_offers.special_offers_content[j].preferential_amount);
                        selected_offers.amount += Math.round(data[k].real_price - data[k].ok_price);
                    }
                }
            }


            for (var j = 0; j < selected_offers.special_offers_content.length; j++) {
                if (selected_offers.special_offers_content[j].preferential_type == 1) {
                    var data = get_offers_date(selected_offers, selected_offers.special_offers_content[j], or, start, stop);
                    for (var k = 0; k < data.length; k++) {
                        var ok_price = data[k].ok_price;
                        data[k].ok_price = Math.round(data[k].ok_price * selected_offers.special_offers_content[j].preferential_amount * 0.1);
                        selected_offers.amount += Math.round(ok_price - data[k].ok_price);
                    }
                }
            }


            for (var j = 0; j < selected_offers.special_offers_content.length; j++) {
                if (selected_offers.special_offers_content[j].preferential_type == 3) {
                    var data = get_offers_date(selected_offers, selected_offers.special_offers_content[j], or, start, stop);
                    for (var k = 0; k < data.length; k++) {
                        var ok_price = data[k].ok_price;
                        data[k].ok_price -= Math.round(selected_offers.special_offers_content[j].preferential_amount);
                        if (data[k].ok_price < 0)
                            data[k].ok_price = 0;
                        selected_offers.amount += Math.round(ok_price - data[k].ok_price);
                    }
                    if (selected_offers.special_offers_content[j].calc_day_method == 6) {
                        var a = Math.round(selected_offers.special_offers_content[j].preferential_amount);
                        selected_offers.amount += a;
                    }
                }
            }
        }
    }
}
function offers_combine(offers_list) {
    var data = new Array();
    data[0] = new Array();
    for (var i = 0; i < offers_list.length; i++) {
        if ((offers_list[i].share_group & 8) == 0) {
            data.push(offers_list[i]);
        }
        else {
            data[0].push(offers_list[i]);
        }
    }
    return data;
}
function get_best_offer(combine) {
    var best = null;
    var a;
    var pa, pb;
    var b;
    for (var i = 0; i < combine.length; i++) {
        if (best) {
            b = get_amount(combine[i]);
            if (a < b) {
                best = combine[i];
                a = b;
                pa = get_priority(combine[i]);
            }
            else if (a == b) {
                pb = get_priority(combine[i]);
                if (pa < pb) {
                    best = combine[i]
                    pa = pb;
                }
            }
        }
        else {
            best = combine[i];
            a = get_amount(best);
            pa = get_priority(best);
        }
    }
    return best;
}
function get_amount(offer) {
    var amount = 0;
    if (jQuery.isArray(offer)) {
        for (var i = 0; i < offer.length; i++) {
            amount += offer[i].amount;
        }
    }
    else {
        amount = offer.amount;
    }
    return amount;
}
function get_priority(offer) {
    if (jQuery.isArray(offer)) {
        var offers_priority = null;
        for (var i = 0; i < offer.length; i++) {
            if (!offers_priority || offers_priority < offer[i].offers_priority) {
                offers_priority = offer[i].offers_priority;
            }
        }
        return offers_priority;
    }
    else {
        return offer.offers_priority;
    }
}
function aggregation(price_list, begin, end) {
    var sum = 0;
    var avg = 0;
    var count = 0;
    for (var i = 0; i < price_list.length; i++) {
        var p = date_format(price_list[i].price_date);
        if (p >= begin && p < end) {
            if (price_list[i].ok_price >= 0) {
                sum += price_list[i].ok_price;
                count++;
            }
            else {
                sum += price_list[i].real_price;
                count++;
            }
        }
    }
    if (count > 0) {
        avg = Math.round(sum / count);
    }
    return { sum: sum, avg: avg };
}
function get_offer_name(offer) {
    var name = "";
    if (jQuery.isArray(offer)) {
        for (var i = 0; i < offer.length; i++) {
            name += offer[i].special_offers_name + ",";
        }
        name.length -= 1;
    }
    else {
        name = offer.special_offers_name;
    }
    return name;
}
function get_offer_id(offer) {
    var id = "";
    if (jQuery.isArray(offer)) {
        for (var i = 0; i < offer.length; i++) {
            id += offer[i].offers_id + ",";
        }
        id.length -= 1;
    }
    else {
        id = offer.offers_id;
    }
    return id;
}
function checked_price_list(price_list, start_date, stop_date) {

    var start = date_format(start_date);
    var stop = date_format(stop_date);
    var rent_days = 0;
    var holiday = {};
    var min_inner_days = 0;
    for (var i = 0; i < price_list.length; i++) {
        var pd = date_format(price_list[i].price_date);
        if (pd >= start && pd < stop) {
            if (price_list[i].date_type == 3) {
                if (holiday[price_list[i].holiday_name]) {
                    holiday[price_list[i].holiday_name].inner_days++;
                }
                else {
                    holiday[price_list[i].holiday_name] = {
                        inner_days: 1,
                        min_inner_rent_days: price_list[i].min_inner_rent_days,
                        min_rent_days: price_list[i].min_rent_days,
                        begin_date: price_list[i].begin_date,
                        end_date: price_list[i].end_date
                    };
                }
            }
            rent_days++;
        }
    }
    var ok = true;
    var msg = "当前租期";
    for (var o in holiday) {
        if (holiday[o].min_inner_rent_days > holiday[o].inner_days) {
            ok = false;
            msg += "不满足节假日:" + o + "(" + date_format(holiday[o].begin_date, "yyyy年MM月dd日") + "-" + date_format(holiday[o].end_date, "yyyy年MM月dd日") + ")节日内最低租期(" + holiday[o].min_inner_rent_days + "天)的要求;"
        }
        if (holiday[o].min_rent_days > rent_days) {
            ok = false;
            msg += "不满足节假日:" + o + "(" + date_format(holiday[o].begin_date, "yyyy年MM月dd日") + "-" + date_format(holiday[o].end_date, "yyyy年MM月dd日") + ")最低租赁时长(" + holiday[o].min_rent_days + "天)的要求;"
        }
    }
    if (ok) {
        return true;
    }

    msg += "请重新选择合适的租期再试！";
    layer.alert(msg);
    return false;
}
function offers_combine_new(offers_list) {  //艹，后遗症
    var data = new Array();
    data[0] = new Array();
    for (var i = 0; i < offers_list.length; i++) {
        if ((offers_list[i].share_group & 8) == 0) {
            data.push(offers_list[i]);
        }
        else {
            data[0].push(offers_list[i]);
        }
    }
    return data;
}