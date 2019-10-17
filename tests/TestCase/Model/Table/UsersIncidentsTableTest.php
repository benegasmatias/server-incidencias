<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersIncidentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersIncidentsTable Test Case
 */
class UsersIncidentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersIncidentsTable
     */
    public $UsersIncidents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersIncidents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersIncidents') ? [] : ['className' => UsersIncidentsTable::class];
        $this->UsersIncidents = TableRegistry::getTableLocator()->get('UsersIncidents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersIncidents);

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
