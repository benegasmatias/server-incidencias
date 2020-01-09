<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesTonersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesTonersTable Test Case
 */
class TypesTonersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesTonersTable
     */
    public $TypesToners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TypesToners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypesToners') ? [] : ['className' => TypesTonersTable::class];
        $this->TypesToners = TableRegistry::getTableLocator()->get('TypesToners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesToners);

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
