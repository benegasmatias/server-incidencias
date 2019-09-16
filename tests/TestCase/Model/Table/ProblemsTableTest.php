<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProblemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProblemsTable Test Case
 */
class ProblemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProblemsTable
     */
    public $Problems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Problems',
        'app.Supports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Problems') ? [] : ['className' => ProblemsTable::class];
        $this->Problems = TableRegistry::getTableLocator()->get('Problems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Problems);

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
