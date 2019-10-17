<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaptopsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaptopsTable Test Case
 */
class LaptopsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LaptopsTable
     */
    public $Laptops;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Laptops',
        'app.Offices',
        'app.Rams',
        'app.Disks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Laptops') ? [] : ['className' => LaptopsTable::class];
        $this->Laptops = TableRegistry::getTableLocator()->get('Laptops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Laptops);

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
