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

class ShopdiyController extends CommonController{
	
	protected function _initialize(){
		parent::_initialize();
		
	}
	
	public function index()
    {

        $this->display();
    }
	
}
?>