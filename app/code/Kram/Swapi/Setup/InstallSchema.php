<?php
namespace Kram\Swapi\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
       
        //START table setup
        $table = $installer->getConnection()->newTable(
            $installer->getTable('swapi_film')
        )->addColumn(
            'film_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'Film ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Demo Title'
        )->addColumn(
            'opening_crawl',
            \Magento\Framework\DB\Ddl\Table::TYPE_BLOB,
            null,
            [ 'nullable' => false ],
            'Opening Crawl'
        )->addColumn(
            'director',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false ],
            'Director'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
