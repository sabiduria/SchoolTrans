<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assignment Entity
 *
 * @property int $id
 * @property int $driver_id
 * @property int $vehicle_id
 * @property \Cake\I18n\DateTime|null $starthour
 * @property \Cake\I18n\DateTime|null $endhour
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Driver $driver
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class Assignment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'driver_id' => true,
        'vehicle_id' => true,
        'starthour' => true,
        'endhour' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'driver' => true,
        'vehicle' => true,
    ];
}
