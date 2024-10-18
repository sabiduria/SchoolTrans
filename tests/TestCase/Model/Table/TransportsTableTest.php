<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransportsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransportsTable Test Case
 */
class TransportsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransportsTable
     */
    protected $Transports;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Transports',
        'app.Assignments',
        'app.Dependants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Transports') ? [] : ['className' => TransportsTable::class];
        $this->Transports = $this->getTableLocator()->get('Transports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Transports);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TransportsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TransportsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
