<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisksTable Test Case
 */
class DisksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DisksTable
     */
    public $Disks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Disks',
        'app.Cabinets',
        'app.Laptops'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Disks') ? [] : ['className' => DisksTable::class];
        $this->Disks = TableRegistry::getTableLocator()->get('Disks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Disks);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
