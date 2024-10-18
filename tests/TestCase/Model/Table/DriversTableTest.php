<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DriversTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DriversTable Test Case
 */
class DriversTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DriversTable
     */
    protected $Drivers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Drivers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Drivers') ? [] : ['className' => DriversTable::class];
        $this->Drivers = $this->getTableLocator()->get('Drivers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Drivers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DriversTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
