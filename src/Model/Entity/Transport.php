<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transport Entity
 *
 * @property int $id
 * @property int $assignment_id
 * @property int $dependant_id
 * @property \Cake\I18n\DateTime|null $pickupathome
 * @property \Cake\I18n\DateTime|null $dropoffatschool
 * @property \Cake\I18n\DateTime|null $pickupschool
 * @property \Cake\I18n\DateTime|null $dropoffathome
 * @property string|null $pickuplocation
 * @property string|null $dropofflocation
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Assignment $assignment
 * @property \App\Model\Entity\Dependant $dependant
 */
class Transport extends Entity
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
        'assignment_id' => true,
        'dependant_id' => true,
        'pickupathome' => true,
        'dropoffatschool' => true,
        'pickupschool' => true,
        'dropoffathome' => true,
        'pickuplocation' => true,
        'dropofflocation' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'assignment' => true,
        'dependant' => true,
    ];
}
