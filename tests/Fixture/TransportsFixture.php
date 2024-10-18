<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransportsFixture
 */
class TransportsFixture extends TestFixture
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
                'assignment_id' => 1,
                'dependant_id' => 1,
                'pickupathome' => '2024-10-18 14:01:28',
                'dropoffatschool' => '2024-10-18 14:01:28',
                'pickupschool' => '2024-10-18 14:01:28',
                'dropoffathome' => '2024-10-18 14:01:28',
                'pickuplocation' => 'Lorem ipsum dolor sit amet',
                'dropofflocation' => 'Lorem ipsum dolor sit amet',
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
