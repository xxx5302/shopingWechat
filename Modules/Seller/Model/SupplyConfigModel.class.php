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
 * @author    cy  2020.08.01
 *
 */
namespace Seller\Model;

class SupplyConfigModel{
	
	
	public function update($data)
	{

		$supper_info = get_agent_logininfo();

		$supply_id = $supper_info['id'];

		foreach($data as $name => $value)
		{
			
			$info = M('lionfish_comshop_supply_config')->where( array('name' => $name,'supply_id'=>$supply_id) )->find();
			
			$value = htmlspecialchars($value);
			if( empty($info) )
			{
				$ins_data = array();
				$ins_data['name'] = $name;
				$ins_data['value'] = $value;
				$ins_data['supply_id'] = $supply_id;
				M('lionfish_comshop_supply_config')->add($ins_data);
			}else{
				
				$rs = M('lionfish_comshop_supply_config')->where( array('id' => $info['id']) )->save( array('value' => $value) );
				
			}
			
		}
		$this->get_all_config(true);
	}
	
	public function get_all_config($is_parse = false)
	{
		$supper_info = get_agent_logininfo();

		$supply_id = $supper_info['id'];

		$data = S('_get_all_supply_config_'.$supply_id);
		
		if (empty($data) || $is_parse) {
			
			$all_list = M('lionfish_comshop_supply_config')->where( array('supply_id' => $supply_id) )->select();

			if (empty($all_list)) {
				$data = array();
			}else{
				$data = array();
				foreach($all_list as $val)
				{
					$data[$val['name']] = htmlspecialchars_decode( $val['value'] );
				}
			}
			
			S('_get_all_supply_config_'.$supply_id, $data);
		}
		return $data;
	}

	/**
	 * 删除满减配置项
	 * @param $data
	 */
	public function delete_config($data){
		$supper_info = get_agent_logininfo();

		$supply_id = $supper_info['id'];

		foreach($data as $name => $value)
		{
			$info = M('lionfish_comshop_supply_config')->where( array('name' => $name,'supply_id'=>$supply_id) )->find();
			$rs = M('lionfish_comshop_supply_config')->where( array('id' => $info['id']) )->delete();
		}
		$this->get_all_config(true);
	}
	
}
?>