<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pupil Entity
 *
 * @property int $id
 * @property string|null $reference
 * @property string|null $name
 * @property string|null $lastname
 * @property string|null $phone
 * @property string|null $email
 * @property bool|null $actived
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Dependant[] $dependants
 */
class Pupil extends Entity
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
        'reference' => true,
        'name' => true,
        'lastname' => true,
        'phone' => true,
        'email' => true,
        'actived' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'dependants' => true,
    ];
}
