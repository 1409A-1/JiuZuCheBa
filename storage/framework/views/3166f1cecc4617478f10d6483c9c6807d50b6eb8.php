<?php echo $__env->make('common.home_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link type="text/css" rel="stylesheet" href="home/css/user.css">

<!--内容-->
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <h5>订单管理</h5>
            <a href="<?php echo e(url('orderList')); ?>" class="active">订单列表</a>
            <a id="topingjia">评价订单</a>
            <h5>账户管理</h5>
            <a href="<?php echo e(url('userInfo')); ?>">账户信息</a>
            <a href="<?php echo e(url('benefitList')); ?>">优惠券</a>
        </div>
        <div class="right">
            <!--我的主页-->
            <div class="order shortOrder show">
                <h4>短租订单</h4>
                <ul class="order1">
                    <li class="active">全部订单</li>
                    <li>预约中<a></a></li>
                    <li>租赁中<a></a></li>
                    <li>已完成<a></a></li>
                    <li>已取消<a></a></li>
                </ul>
            <?php /*全部订单*/ ?>
              <div id="show">
                    <span style="display: block">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                         <ul class="order3"></ul>
                        <?php if(array_key_exists('all', $order)): ?>
                            <?php foreach($order['all'] as $k=>$v): ?>
                                <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a><?php echo e($v['ord_sn']); ?></h5>
                                            <div>
                                                <img src="<?php echo e($v['car_img']); ?>" alt="<?php echo e($v['car_img']); ?>">
                                                <div class="info">
                                                    <a><?php echo e($v['car_name']); ?></a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['dep_time'])); ?>

                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['des_time'])); ?>

                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥<?php echo e($v['ord_price']); ?></li>
                                                    <li class="state">
                                                        <?php if($v['ord_pay']==0): ?>
                                                            <a>未付款</a>
                                                        <?php elseif($v['ord_pay']==1): ?>
                                                            <a>已付款 未提车</a>
                                                        <?php elseif($v['ord_pay']==2): ?>
                                                            <a>车辆使用中</a>
                                                        <?php elseif($v['ord_pay']==3): ?>
                                                            <a>完成</a>
                                                        <?php elseif($v['ord_pay']==4): ?>
                                                            <a>待评价</a>
                                                        <?php elseif($v['ord_pay']==5): ?>
                                                            <a>订单已取消</a>
                                                        <?php elseif($v['ord_pay']==6): ?>
                                                            <a> 预约中</a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li class="operation">
                                                    <?php if($v['ord_pay']==0): ?>
                                                            <a href="<?php echo e(url('zfbPay')); ?>?ord_sn=<?php echo e($v['ord_sn']); ?>">支付</a>
                                                            <a href="<?php echo e(url('cancelOrder')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">取消</a>
                                                            <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    <?php elseif($v['ord_pay']==1): ?>
                                                            <a href="<?php echo e(url('cancelOrder')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">取消</a>
                                                            <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    <?php elseif($v['ord_pay']==2): ?>
                                                            <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    <?php elseif($v['ord_pay']==3): ?>
                                                            <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    <?php elseif($v['ord_pay']==4): ?>
                                                            <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    <?php elseif($v['ord_pay']==5): ?>
                                                            <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    <?php elseif($v['ord_pay']==6): ?>
                                                            <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="noMore">暂无订单...</p>
                        <?php endif; ?>
                    </span>
                    <?php /*预约中*/ ?>
                    <span style="display: none">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                        <ul class="order3"></ul>
                        <?php if(array_key_exists(6, $order)): ?>
                            <?php foreach($order['6'] as $k=>$v): ?>
                                <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a><?php echo e($v['ord_sn']); ?></h5>
                                            <div>
                                                <img src="<?php echo e($v['car_img']); ?>" alt="<?php echo e($v['car_img']); ?>">
                                                <div class="info">
                                                    <a><?php echo e($v['car_name']); ?></a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['dep_time'])); ?>

                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['des_time'])); ?>

                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥<?php echo e($v['ord_price']); ?></li>
                                                    <li class="state">
                                                            <a> 预约中</a>
                                                    </li>
                                                    <li class="operation">
                                                        <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="noMore">暂无订单...</p>
                        <?php endif; ?>
                    </span>

                    <?php /*租赁中*/ ?>
                    <span style="display: none">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                        <ul class="order3"></ul>
                        <?php if(array_key_exists(2, $order)): ?>
                            <?php foreach($order['2'] as $k=>$v): ?>
                                <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a><?php echo e($v['ord_sn']); ?></h5>
                                            <div>
                                                <img src="<?php echo e($v['car_img']); ?>" alt="<?php echo e($v['car_img']); ?>">
                                                <div class="info">
                                                    <a><?php echo e($v['car_name']); ?></a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['dep_time'] )); ?>

                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['des_time'] )); ?>

                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥<?php echo e($v['ord_price']); ?></li>
                                                    <li class="state">
                                                        <a> 租赁中</a>
                                                    </li>
                                                    <li class="operation">
                                                        <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="noMore">暂无订单...</p>
                        <?php endif; ?>
                    </span>

                    <?php /*已完成*/ ?>
                    <span style="display: none">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                        <ul class="order3"></ul>
                        <?php if(array_key_exists(3,$order)): ?>
                            <?php foreach($order['3'] as $k=>$v): ?>
                                <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a><?php echo e($v['ord_sn']); ?></h5>
                                            <div>
                                                <img src="<?php echo e($v['car_img']); ?>" alt="<?php echo e($v['car_img']); ?>">
                                                <div class="info">
                                                    <a><?php echo e($v['car_name']); ?></a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['dep_time'])); ?>

                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            <?php echo e(date('Y/m/d H:i', $v['des_time'])); ?>

                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥<?php echo e($v['ord_price']); ?></li>
                                                    <li class="state">
                                                        <a> 完成</a>
                                                    </li>
                                                    <li class="operation">
                                                        <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="noMore">暂无订单...</p>
                        <?php endif; ?>
                    </span>

                    <?php /*已取消 */ ?>
                    <span style="display: none">
                    <ul class="order2">
                        <li style="width: 440px">订单详情</li>
                        <li>时间</li>
                        <li>支付金额</li>
                        <li>订单状态</li>
                        <li>操作</li>
                    </ul>
                    <ul class="order3"></ul>
                    <?php if(array_key_exists(5, $order)): ?>
                        <?php foreach($order['5'] as $k=>$v): ?>
                            <div class="No">
                                <ul class="order3">
                                    <li>
                                        <h5><a>订单号：</a><?php echo e($v['ord_sn']); ?></h5>
                                        <div>
                                            <img src="<?php echo e($v['car_img']); ?>" alt="<?php echo e($v['car_img']); ?>">
                                            <div class="info">
                                                <a><?php echo e($v['car_name']); ?></a>
                                                <div class="carIcon">
                                                    <div>
                                                        <i class="icon icon_car1"></i>
                                                        <a>三厢</a>
                                                    </div>
                                                    <div>
                                                        <i class="icon icon_car2"></i>
                                                        <a>手动</a>
                                                    </div>
                                                    <div>
                                                        <i class="icon icon_car3"></i>
                                                        <a>1.4L</a>
                                                    </div>
                                                    <div>
                                                        <i class="icon icon_car4"></i>
                                                        <a>乘坐5人</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="time">
                                                    <div>
                                                        取车时间<br>
                                                        <?php echo e(date('Y/m/d H:i', $v['dep_time'])); ?>

                                                    </div>
                                                    <div>
                                                        还车时间<br>
                                                        <?php echo e(date('Y/m/d H:i', $v['des_time'])); ?>

                                                    </div>
                                                </li>
                                                <li class="cen">总额：￥<?php echo e($v['ord_price']); ?></li>
                                                <li class="state">
                                                    <a> 订单已取消</a>
                                                </li>
                                                <li class="operation">
                                                    <a href="<?php echo e(url('orderInfo')); ?>?ceoyg=<?php echo e($v['ord_id']); ?>">详情</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="noMore">暂无订单...</p>
                    <?php endif; ?>
                </span>
              </div>
            </div>
        </div>
    </div>
</div>

<!--底部-->
<?php echo $__env->make('common.home_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $(function(){
        var $li = $('.order1 li');
        var $div = $('#show span');
        $li.click(function(){
            var $this = $(this);
            var $t = $this.index();
            $li.removeClass();
            $this.addClass('active');
            $div.css('display','none');
            $div.eq($t).css('display','block');
        })
    });
</script>
