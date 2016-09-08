//日期格式化
function date_format(date, fmt) {
    if (!date)
        return "";
    if (date.constructor != Date) {
        var reg = new RegExp("(\\/{0,2})Date\\((-?\\d+)\\)\\1", "gi");
        if (reg.test(date)) {
            date = date.replace(reg, "new Date($2)");
            date = eval(date);
        }
        else {
            date = date.replace("T", " ");
            var d = new Date(Date.parse(date));
            if (d.constructor != Date || !d.getFullYear()) {
                d = date.split(/[^\d]/);
                if (d.length == 0) {
                    return fmt;
                }
                else {
                    date = new Date();
                    date.setFullYear(d[0]);
                    if (d.length > 1) {
                        date.setDate(1);
                        date.setMonth(d[1] - 1);
                    }
                    if (d.length > 2) {
                        date.setDate(d[2]);
                    }
                    else {
                        date.setDate(new Date().getDate());
                    }
                    if (d.length > 3) {
                        date.setHours(d[3]);
                    }
                    else {
                        date.setHours(0);
                    }
                    if (d.length > 4) {
                        date.setMinutes(d[4]);
                    }
                    else {
                        date.setMinutes(0);
                    }
                    if (d.length > 5) {
                        date.setSeconds(d[5]);
                    }
                    else {
                        date.setSeconds(0);
                    }
                    if (d.length > 6) {
                        date.setMilliseconds(d[6]);
                    }
                    else {
                        date.setMilliseconds(0);
                    }
                }
            }
            else {
                date = d;
            }

        }
    }
    if (!fmt)
        return date;
    var weeks = ['周日', '周一', '周二', '周三', '周四', '周五', '周六'];
    var year = date.getFullYear() + "";
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    var milliseconds = date.getMilliseconds();
    fmt = fmt.replace('yyyy', year);
    fmt = fmt.replace('yy', year.substr(2));
    fmt = fmt.replace("MM", (month < 10 ? "0" : "") + month);
    fmt = fmt.replace("M", month);
    fmt = fmt.replace("dd", (day < 10 ? "0" : "") + day);
    fmt = fmt.replace("d", day);
    fmt = fmt.replace("HH", (hours < 10 ? "0" : "") + hours);
    fmt = fmt.replace("hh", ((hours % 12) < 10 ? "0" : "") + (hours % 12));
    fmt = fmt.replace("H", hours + "");
    fmt = fmt.replace("h", hours % 12 + "");
    fmt = fmt.replace("mm", (minutes < 10 ? "0" : "") + minutes);
    fmt = fmt.replace("m", minutes + "");
    fmt = fmt.replace("ss", (seconds < 10 ? "0" : "") + seconds);
    fmt = fmt.replace("s", seconds + "");
    fmt = fmt.replace("ff", (milliseconds < 10 ? "00" : (milliseconds < 100 ? "0" : "")) + milliseconds);
    fmt = fmt.replace("w", weeks[date.getDay()]);
    return fmt;
}
//时间差
function date_subtract(date1, date2) {
    return new time_span(date_format(date2).getTime() - date_format(date1).getTime());
}
function time_span(times) {
    this.times = times;
    this.days = parseInt(times / (1000 * 3600 * 24));
    this.totaldays = times / (1000.0 * 3600 * 24);
    this.hours = parseInt((times / (1000 * 3600)) % 24);
    this.totalhours = times / (1000.0 * 3600);
    this.minutes = parseInt((times / (1000 * 60) % 60));
    this.totalminutes = times / (1000.0 * 60);
    this.seconds = parseInt((times / 1000) % 60);
    this.totalseconds = times / 1000.0;
    this.milliseconds = parseInt(times % 1000);
    this.totalmilliseconds = times;
    this.totalyears = times / (1000.0 * 3600 * 24 * 365);
}
//月 添加
function date_addMonth(date, month) {
    date = date_format(date);
    var year = date.getFullYear();
    var m = date.getMonth();
    var day = date.getDate();
    var nm = m + parseInt(month);
    m = nm % 12;
    var y = year + parseInt(nm / 12);
    switch (m) {
        case 1:
            if (y % 400 == 0 || (y % 100 != 0 && y % 4 == 0)) {
                if (day > 29) {
                    day = 29;
                }
            }
            else {
                if (day > 28) {
                    day = 28;
                }
            }
            break;
        case 3:
        case 5:
        case 8:
        case 10:
            if (day == 31)
                day = 30;
            break;
    }
    date.setFullYear(y);
    date.setDate(1);
    date.setMonth(m);
    date.setDate(day);
    return date;
}
//天 添加
function date_adddays(date, days) {
    return new Date(date_format(date).getTime() + days * 24 * 3600000);
}
//时 添加
function date_addhours(date, hours) {
    return new Date(date_format(date).getTime() + hours * 3600000);
}
function get_date(date) {
    date.setHours(0);
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);
    return date;
}
function between_date(start_date, end_date, date) {
    var start = date_format(start_date).getTime();
    var end = date_format(end_date).getTime();
    var date = date_format(date).getTime();
    return start <= date && date < end;
}
function date_clone(date) {
    var n = new Date();
    n.setMonth(0);
    n.setDate(1);
    n.setFullYear(date.getFullYear());
    n.setMonth(date.getMonth());
    n.setDate(date.getDate());
    n.setHours(date.getHours());
    n.setMinutes(date.getMinutes());
    n.setSeconds(date.getSeconds());
    n.setMilliseconds(date.getMilliseconds());
    return n;
}
//星期转换
function day_in_week(day, type) {
    day = new Date(day).getDay();
    var week_day = "";
    if (type) {
        switch (day) {
            case 0:
                week_day = "周日";
                break;
            case 1:
                week_day = "周一";
                break;
            case 2:
                week_day = "周二";
                break;
            case 3:
                week_day = "周三";
                break;
            case 4:
                week_day = "周四";
                break;
            case 5:
                week_day = "周五";
                break;
            case 6:
                week_day = "周六";
                break;
        }
    } else {
        switch (day) {
            case 0:
                week_day = "星期日";
                break;
            case 1:
                week_day = "星期一";
                break;
            case 2:
                week_day = "星期二";
                break;
            case 3:
                week_day = "星期三";
                break;
            case 4:
                week_day = "星期四";
                break;
            case 5:
                week_day = "星期五";
                break;
            case 6:
                week_day = "星期六";
                break;
        }
    }
    return week_day;
}