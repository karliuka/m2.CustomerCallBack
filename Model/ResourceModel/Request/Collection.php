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
namespace Faonni\CustomerCallBack\Model\ResourceModel\Request;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * CustomerCallBack Request ResourceModel Collection
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
			'Faonni\CustomerCallBack\Model\Request', 
			'Faonni\CustomerCallBack\Model\ResourceModel\Request'
		);
    }
    
    /**
     * Add customer filter
     *
     * @param int|string $customerId
     * @return $this
     */
    public function addCustomerFilter($customerId)
    {
        $this->addFilter('customer', 
			$this->getConnection()->quoteInto('main_table.customer_id=?', $customerId), 
			'string'
		);
        return $this;
    }
    
    /**
     * Add status filter
     *
     * @param int|string $status
     * @return $this
     */
    public function addStatusFilter($status)
    {
        $this->addFilter('status', 
			$this->getConnection()->quoteInto('main_table.status=?', $status), 
			'string'
		);
        return $this;
    }           
}
