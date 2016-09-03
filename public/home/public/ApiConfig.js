var api_url = "http://system.dafang24.com";
//var api_url = "http://192.168.0.252:1111/";
//var api_url = "http://localhost:4471/";
var city_list_url = api_url + "/api/shoplist/GetCityList";//获取存在门店的城市 
var district_shop_list_url = api_url + "/api/shoplist/GetDistrictShop";//获取城市的区域门店列表 
var shop_info_url = api_url + "/api/shoplist/GetShopInfo";//获取门店详细信息 
var city_info_code_url = api_url + "/api/City/GetCityInfo";//城市信息
var autoinfomation_url = api_url + "/api/autoinfomation";//车辆信息
var autoinfomation_detail_url = api_url + "/api/AutoInformation/GetAutoInformation";//二手车辆详细信息
var autoinfomation_image_url = api_url + "/api/AutoInformation/GetAutoImageList";//二手车辆详细信息
var autoinfomation_class_url = api_url + "/api/AutoInformation/GetAutoListByClass";//二手车辆同款车型列表
var autoinfomation_reserve_url = api_url + "/api/AutoInformation/AutoReserve";//二手车预约看车
var autoinfomation_recommend_url = api_url + "/api/AutoInformation/GetRecommendAuto";//二手车推荐车辆
var register_customer_url = api_url + "/api/customer/register";//会员注册API
var login_customer_url = api_url + "/api/customer/login";//会员登录API
var phone_customer_url = api_url + "/api/customer/IsExistsPhone";//会员API手机号唯一验证
var email_customer_url = api_url + "/api/customer/IsExistsEmail";//会员API邮箱唯一验证
var category_auto_url = api_url + "/api/AutoConfig/GetCategoryList";//车辆类型
var letlitre_auto_url = api_url + "/api/AutoConfig/GetLetLitre";//车辆排量
var gearbox_auto_url = api_url + "/api/AutoConfig/GetGearbox";//车辆变速器
var maxrent_auto_url = api_url + "/api/AutoConfig/GetMaxRentDay";//最大租期
var brand_auto_url = api_url + "/api/Brand/GetBrandList";//车辆品牌 
var class_auto_url = api_url + "/api/AutoClass/List2";//所有车型列表
var class_list_auto_url = api_url + "/api/AutoClass/List";//车型列表
var autoclass_info_url = api_url + "/api/AutoClass/GetAutoClassInfo";//获取车型信息
var price_list_url = api_url + "/api/AutoClass/GetPriceList";//获取门店车型价格列表
var special_class_list_url = api_url + "/api/AutoClass/GetSpecialClassList";//获取特价专区列表
var addservice_url = api_url + "/api/AddedService/List";//增值服务列表
var order_list = api_url + "/api/Customer/Orders?token={0}&pagesize={1}&pageindex={2}&orderstate={3}";//用户的订单列表
var customer_info = api_url + '/api/Customer?token={0}';//用户信息
var update_user = api_url + '/api/Customer/update';//更新用户信息
var loadorderinfo_url = api_url + "/api/Order/LoadOrderInfo";
var password_change = api_url + '/api/customer/changepassword';//修改密码
var order_cancel = api_url + '/api/Order/Cancel';//订单取消

var lookpassword = api_url + '/api/Customer/LookPassword';  //发送修改密码的验证码
var sendnumreg = api_url + '/api/Customer/send_num_reg';//发送验证码（注册使用）
var updatepassword = api_url + '/api/Customer/UpdatePassword';//修改密码
var shop_appraise_by_cus = api_url + '/api/shoplist/GetShopByCusScore';//门店会员评价
var shop_appraiselist_by_cus = api_url + '/api/shoplist/GetShopByCusAppraise';//门店会员评价
var customer_appraiselist_by_cus = api_url + '/api/Customer/GetShopByCusAppraise';//门店会员评价
var shop_appraiselist_update = api_url + '/api/shoplist/GetShopUpdateCusScore';//门店会员评价
var shop_appraiselist_delete = api_url + '/api/shoplist/GetShopDeleteCusScore';//门店会员评价

var countryMap = api_url + '/api/shoplist/get_country_map';//全国地图
var specialCarType = api_url + '/api/AutoClass/GetSpecialClassList';//特价车型
var cityCarType = api_url + '/api/AutoClass/list_by_city';//城市筛选车型
var shopCarType = api_url + '/api/AutoClass/list_by_shop';//城市筛选车型
var noCommentOrder = api_url + '/api/customer/getcusbyappraise';//待评价订单

var saveorder_url = api_url + "/api/Order/Save";
var order_info_url = api_url + "/api/Order/LoadOrder";//单个订单详细信息 
var long_rent_url = api_url + "/api/longrentnew/create";//长租申请
var auto_list_url = api_url + "/api/AutoInformation/GetAutoList";//获取车辆列表

var load_score_configure_url = api_url + "/api/Configure/LoadScorePaymentConfig";
var payment_order_by_score_url = api_url + "/api/Order/PaymentByScore";
var get_my_coupons_url = api_url + "/api/Order/GetMyCoupons";
var payment_order_by_coupon_url = api_url + "/api/Order/PaymentByCoupons";

var register_customer_url_new = api_url + "/api/customer/RegisterNew";//会员注册API[新]
var check_driver_url = api_url + "/api/Customer/CheckDriver";//驾照、身份证验证
var show_driver_url = api_url + "/api/Customer/ShowDriver";//查看驾照、身份证信息
var cancel_order = api_url + "/api/Customer/CancelOrder";//取消订单
var show_customer_check_url = api_url + "/api/Customer/CheckStatus";//下订单前先验证会员身份信息是否真实
var bind_idcard_driver_url = api_url + "/api/Customer/IdcardDriver";//直接绑定驾照身份证信息
var hyzxcx_url = api_url + "/api/Customer/hyzxcx";//是否已经验证过该身份证、驾照

var people_check_url = api_url + "/api/Customer/PeopleCheck";//人工审核

var validation = api_url + "/api/Customer/update_customer_phone";//更新手机号
var update_customer_something = api_url + "/api/Customer/update_customer_something";//修改会员资料

var check_idcard_url = api_url + "/api/Customer/CheckIdCard";//身份证实名认证
var hyzxcxsfz_url = api_url + "/api/Customer/hyzxcxsfz";//是否已经验证过身份证

var id_card_info_url = api_url + "/api/Customer/IdCardInfo";//提交身份信息
var order_idcard__url = api_url + "/api/Customer/CheckIdCardInfo";//下订单之后验证身份信息
var customer_info_url = api_url + "/api/Customer/CustomerInfo";//会员信息
var getcusbyappraise = api_url + '/api/customer/getcusbyappraise'; //通过会员id获取评价
var getcusbyappraisebyoder = api_url + '/api/customer/getappraisebyorderid';//根据订单号查评价
function get_url(path) {
    if (path && path.length > 0) {
        return api_url + "/" + path.substr(1);
    }
    return path;
}