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
namespace Seller\Controller;

class AttachmentController extends CommonController{
	
	protected function _initialize(){
		parent::_initialize();
		
		//'pinjie' => '拼团介绍',
	}
	
	public function index()
	{
		if (IS_POST) {
			
			$data = I('request.parameter'); 
//			dump($data);die;
            $tmp = trim($data['qiniu_url']);
            $len = strlen($tmp)-1;
            if ($tmp[$len] != '/' ){
                $data['qiniu_url'] = $tmp.'/';
            }
            $tmp = trim($data['alioss_url']);
            $len = strlen($tmp)-1;
            if ($tmp[$len] != '/' ){
                $data['alioss_url'] = $tmp.'/';
            }
            $tmp = trim($data['tx_url']);
            $len = strlen($tmp)-1;
            if ($tmp[$len] != '/' ){
                $data['tx_url'] = $tmp.'/';
            }

			D('Seller/Config')->update($data);
			
			
			show_json(1, array('url' => $_SERVER['HTTP_REFERER']));
		}
		$data = D('Seller/Config')->get_all_config();
		
		$this->data = $data;
		
		$this->display();
	}
	
	
}
?>