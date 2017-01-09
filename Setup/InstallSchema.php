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
namespace Faonni\CustomerCallBack\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * CustomerCallBack InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module Faonni_CustomerCallBack
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();		
        
        /**
         * Create table 'faonni_customercallback_request'
         */		
        if (!$installer->tableExists('faonni_customercallback_request')) {
            $table = $installer->getConnection()->newTable(
					$installer->getTable('faonni_customercallback_request')
				)
				->addColumn(
                    'request_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'Request Id'
                )
				->addColumn(
                    'customer_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => true],
                    'Customer Id'
                )
				->addColumn(
					'store_id',
					Table::TYPE_SMALLINT,
					null,
					['unsigned' => true, 'nullable' => false, 'primary' => true],
					'Store Id'
				)					
				->addColumn(
                    'firstname',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'First Name'
                )
				->addColumn(
                    'lastname',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Last Name'
                )
				->addColumn(
                    'phone',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Phone'
                )				
				->addColumn(
					'created_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
					'Creation Time'
				)
				->addColumn(
					'updated_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
					'Update Time'
				)				
				->addColumn(
                    'status',
                    Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '1'],
                    'Status'
                )
				->addIndex(
					$installer->getIdxName('faonni_customercallback_request', ['customer_id']),
					['customer_id']
				)
				->addIndex(
					$installer->getIdxName('faonni_customercallback_request', ['store_id']),
					['store_id']
				)				
				->addIndex(
					$installer->getIdxName('faonni_customercallback_request', ['status']),
					['status']
				)
				->addForeignKey(
					$installer->getFkName('faonni_customercallback_request', 'customer_id', 'customer_entity', 'entity_id'),
					'customer_id', $installer->getTable('customer_entity'), 'entity_id', Table::ACTION_SET_NULL
				)
				->addForeignKey(
					$installer->getFkName('faonni_customercallback_request', 'store_id', 'store', 'store_id'),
					'store_id', $installer->getTable('store'), 'store_id', Table::ACTION_CASCADE
				)			
				->setComment(
                    'Faonni CustomerCallBack Request Table'
                );
            $installer->getConnection()->createTable($table);
		}
		
        $installer->endSetup();
    }
}