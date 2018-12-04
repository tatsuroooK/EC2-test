<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThumbupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThumbupsTable Test Case
 */
class ThumbupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThumbupsTable
     */
    public $Thumbups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.thumbups',
        'app.users',
        'app.articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Thumbups') ? [] : ['className' => ThumbupsTable::class];
        $this->Thumbups = TableRegistry::getTableLocator()->get('Thumbups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Thumbups);

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
