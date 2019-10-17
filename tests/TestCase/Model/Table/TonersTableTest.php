<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TonersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TonersTable Test Case
 */
class TonersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TonersTable
     */
    public $Toners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Toners',
        'app.Printers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Toners') ? [] : ['className' => TonersTable::class];
        $this->Toners = TableRegistry::getTableLocator()->get('Toners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Toners);

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
