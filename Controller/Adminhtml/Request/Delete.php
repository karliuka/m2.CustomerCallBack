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

use Magento\Framework\Exception\LocalizedException;
use Faonni\CustomerCallBack\Controller\Adminhtml\Request;

/**
 * CustomerCallBack Request delete controller
 */
class Delete extends Request;
{
    /**
     * Delete request action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */		
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $request = $this->_objectManager->create('Faonni\CustomerCallBack\Model\Request');
                $request->load($id);
                $request->delete();
				
                $this->messageManager->addSuccess(__('You deleted the request.'));
                $this->_redirect('*/*/');
                return;
				
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __("We can't delete request right now. Please review the log and try again.")
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__("We can't find a request to delete."));
        $this->_redirect('*/*/');
    }
}
