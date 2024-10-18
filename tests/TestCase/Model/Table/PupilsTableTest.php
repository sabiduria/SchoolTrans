<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PupilsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PupilsTable Test Case
 */
class PupilsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PupilsTable
     */
    protected $Pupils;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Pupils',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pupils') ? [] : ['className' => PupilsTable::class];
        $this->Pupils = $this->getTableLocator()->get('Pupils', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pupils);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PupilsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
