<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CabinetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CabinetsTable Test Case
 */
class CabinetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CabinetsTable
     */
    public $Cabinets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cabinets',
        'app.Offices',
        'app.Rams',
        'app.Disks',
        'app.Motherboards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cabinets') ? [] : ['className' => CabinetsTable::class];
        $this->Cabinets = TableRegistry::getTableLocator()->get('Cabinets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cabinets);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
