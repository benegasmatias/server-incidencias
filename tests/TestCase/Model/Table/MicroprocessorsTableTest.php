<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MicroprocessorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MicroprocessorsTable Test Case
 */
class MicroprocessorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MicroprocessorsTable
     */
    public $Microprocessors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Microprocessors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Microprocessors') ? [] : ['className' => MicroprocessorsTable::class];
        $this->Microprocessors = TableRegistry::getTableLocator()->get('Microprocessors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Microprocessors);

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
