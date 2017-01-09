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
namespace Faonni\CustomerCallBack\Controller\Adminhtml\Request;

use Faonni\CustomerCallBack\Controller\Adminhtml\Request;

/**
 * CustomerCallBack Request index controller
 */
class Index extends Request
{
    /**
     * Request list
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
		
        $resultPage->setActiveMenu('Faonni_CustomerCallBack::request');
        $resultPage->getConfig()->getTitle()->prepend(__('Request'));
		
        $resultPage->addBreadcrumb(__('Request'), __('Request'));
        $resultPage->addBreadcrumb(__('Request'), __('Request'));
		
        return $resultPage;
    }
}
