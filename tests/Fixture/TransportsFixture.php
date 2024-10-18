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
                'pickupathome' => '2024-10-18 13:51:13',
                'dropoffatschool' => '2024-10-18 13:51:13',
                'pickupschool' => '2024-10-18 13:51:13',
                'dropoffathome' => '2024-10-18 13:51:13',
                'created' => '2024-10-18 13:51:13',
                'modified' => '2024-10-18 13:51:13',
                'createdby' => 'Lorem ipsum dolor sit amet',
                'modifiedby' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
