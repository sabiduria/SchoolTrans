<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'dependant_id' => 1,
                'reference' => 'Lorem ipsum dolor sit amet',
                'startdate' => '2024-10-18 13:51:13',
                'duedate' => '2024-10-18 13:51:13',
                'amount' => 1,
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
