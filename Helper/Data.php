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
namespace Faonni\CustomerCallBack\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Faonni CustomerCallBack Data helper
 */
class Data extends AbstractHelper
{
    /**
     * Enabled config path
     */
    const XML_ENABLED = 'promo/customercallback/enabled';
    
    /**
     * Send email config path
     */
    const XML_EMAIL_SEND = 'promo/customercallback/send';
    
    /**
     * Recipient email address config path
     */
    const XML_EMAIL_RECIPIENT = 'promo/customercallback/recipient';
    
    /**
     * Sender email config path
     */    
    const XML_EMAIL_SENDER = 'promo/customercallback/sender';
    
    /**
     * Email template config path
     */
    const XML_EMAIL_TEMPLATE = 'promo/customercallback/template';
                  
    /**
     * Check CustomerCallBack functionality should be enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->isModuleOutputEnabled() && $this->_getConfig(self::XML_ENABLED);
    } 
    
    /**
     * Checks email send enabled
     *
     * @return bool
     */
    public function isEmailEnabled()
    {
        return $this->isEnabled() && $this->_getConfig(self::XML_EMAIL_SEND);
    }
    
    /**
     * Retrieve email recipient
     *
     * @return  string|null
     */
    public function getEmailRecipient()
    {
        return $this->_getConfig(self::XML_EMAIL_RECIPIENT);
    } 
    
    /**
     * Retrieve email sender
     *
     * @return  string|null
     */
    public function getEmailSender()
    {
        return $this->_getConfig(self::XML_EMAIL_SENDER);
    } 
    
    /**
     * Retrieve email template
     *
     * @return  string|null
     */
    public function getEmailTemplate()
    {
        return $this->_getConfig(self::XML_EMAIL_TEMPLATE);
    } 
                                 	
    /**
     * Retrieve store configuration data
     *
     * @param   string $path
     * @return  string|null
     */
    protected function _getConfig($path)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }      
}
