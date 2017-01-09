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
 * CustomerCallBack Request edit controller
 */
class Edit extends Request
{
    /**
     * Request edit form
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $request = $this->_objectManager->create('Faonni\CustomerCallBack\Model\Request');

        if ($id) {
            $request->load($id);
            if (!$request->getId()) {
                $this->messageManager->addError(__('This request no longer exists.'));
                $this->_redirect('*/*');
                return;
            }
        }
		
        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $request->addData($data);
        }
        $this->_coreRegistry->register('current_faonni_customercallback_request', $request);
		
        $this->_initAction();
        $this->_view->getLayout()->getBlock('faonni_customercallback_request_edit');
        $this->_view->renderLayout();
    }
}
