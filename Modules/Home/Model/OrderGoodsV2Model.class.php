<?php
/**
 * lionfish 商城系统
 *
 * ==========================================================================
 * @link      http://www.liofis.com/
 * @copyright Copyright (c) 2015 liofis.com. 
 * @license   http://www.liofis.com/license.html License
 * ==========================================================================
 *
 * @author    fish
 *
 */
namespace Home\Model;
use Think\Model;

/**
 * @author yj
 * @desc 重构前端订单模型
 * Class OrderV2Model
 * @package Home\Model
 */
class OrderGoodsV2Model {

    /**
     * @author yj
     * @desc 获取订单商品名称
     * @param $order_id
     * @return string
     */
    public function getOrderGoodsName( $order_id )
    {
        $order_goods_name = "";

        $order_goods_list = M('lionfish_comshop_order_goods')->where( array('order_id' => $order_id ) )->select();

        foreach($order_goods_list as $order_goods)
        {
            $order_goods_name .= $order_goods['name']." \r\n";
        }

        return $order_goods_name;
    }


}