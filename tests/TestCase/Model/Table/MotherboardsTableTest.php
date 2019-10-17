<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MotherboardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MotherboardsTable Test Case
 */
class MotherboardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MotherboardsTable
     */
    public $Motherboards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Motherboards',
        'app.Cabinets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Motherboards') ? [] : ['className' => MotherboardsTable::class];
        $this->Motherboards = TableRegistry::getTableLocator()->get('Motherboards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Motherboards);

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
