<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DependantsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DependantsTable Test Case
 */
class DependantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DependantsTable
     */
    protected $Dependants;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Dependants',
        'app.Users',
        'app.Pupils',
        'app.Payments',
        'app.Transports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dependants') ? [] : ['className' => DependantsTable::class];
        $this->Dependants = $this->getTableLocator()->get('Dependants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Dependants);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DependantsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DependantsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
