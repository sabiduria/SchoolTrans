<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssignmentsFixture
 */
class AssignmentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'driver_id' => 1,
                'vehicle_id' => 1,
                'starthour' => '2024-10-18 14:01:28',
                'endhour' => '2024-10-18 14:01:28',
                'created' => '2024-10-18 14:01:28',
                'modified' => '2024-10-18 14:01:28',
                'createdby' => 'Lorem ipsum dolor sit amet',
                'modifiedby' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
