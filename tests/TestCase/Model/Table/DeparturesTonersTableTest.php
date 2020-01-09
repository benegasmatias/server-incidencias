<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeparturesTonersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeparturesTonersTable Test Case
 */
class DeparturesTonersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeparturesTonersTable
     */
    public $DeparturesToners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DeparturesToners',
        'app.Offices',
        'app.Toners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DeparturesToners') ? [] : ['className' => DeparturesTonersTable::class];
        $this->DeparturesToners = TableRegistry::getTableLocator()->get('DeparturesToners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeparturesToners);

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
