<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_CustomerCallBack
 * @copyright   Copyright (c) 2017 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Faonni\CustomerCallBack\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * CustomerCallBack Request Model
 */
class Request extends AbstractModel implements IdentityInterface
{
    /**
     * Status new constant
     */
    const STATUS_NEW = 1;
    
    /**
     * Status processing constant
     */
    const STATUS_PROCESSING = 2;
    
    /**
     * Status complete constant
     */
    const STATUS_COMPLETE = 3;
    	
    /**
     * Cache tag constant
     */	
	const CACHE_TAG = 'FAONNI_CUSTOMERCALLBACK_REQUEST';
	
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'faonni_customercallback_request';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'request';
	
    /**
     * Model cache tag for clear cache in after save and after delete
     * When you use true - all cache will be clean
     *
     * @var string|array|bool
     */
    protected $_cacheTag = self::CACHE_TAG;
	
    /**
     * Model construct that should be used for object initialization
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
		
        $this->_init('Faonni\CustomerCallBack\Model\ResourceModel\Request');
    }
	
    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        $tags = [];
        if ($this->getId()) {
            $tags[] = self::CACHE_TAG . '_' . $this->getId();
        }
        return $tags;        
    }
    
    /**
     * Validate request fields
     *
     * @return bool|string[]
     */
    public function validate()
    {
		$errors = [];
		
		if (!\Zend_Validate::is($this->getFirstname(), 'NotEmpty')) {
			$errors[] = __('Firstname is required field.');
		}
		if (!\Zend_Validate::is($this->getLastname(), 'NotEmpty')) {
			$errors[] = __('Lastname is required field.');
		}	
		if (!\Zend_Validate::is($this->getPhone(), 'NotEmpty')) {
			$errors[] = __('Phone is required field.');
		}	
        return empty($errors) ? true : $errors;		
	}	    	
}
