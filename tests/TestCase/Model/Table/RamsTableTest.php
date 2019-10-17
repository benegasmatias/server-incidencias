<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RamsTable Test Case
 */
class RamsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RamsTable
     */
    public $Rams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Rams',
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
        $config = TableRegistry::getTableLocator()->exists('Rams') ? [] : ['className' => RamsTable::class];
        $this->Rams = TableRegistry::getTableLocator()->get('Rams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rams);

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
