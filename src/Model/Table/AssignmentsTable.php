<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assignments Model
 *
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\BelongsTo $Drivers
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\Assignment newEmptyEntity()
 * @method \App\Model\Entity\Assignment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Assignment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assignment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Assignment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Assignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Assignment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assignment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Assignment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AssignmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('assignments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Transports', [
            'foreignKey' => 'assignment_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('driver_id')
            ->notEmptyString('driver_id');

        $validator
            ->integer('vehicle_id')
            ->notEmptyString('vehicle_id');

        $validator
            ->dateTime('starthour')
            ->allowEmptyDateTime('starthour');

        $validator
            ->dateTime('endhour')
            ->allowEmptyDateTime('endhour');

        $validator
            ->scalar('createdby')
            ->maxLength('createdby', 45)
            ->allowEmptyString('createdby');

        $validator
            ->scalar('modifiedby')
            ->maxLength('modifiedby', 45)
            ->allowEmptyString('modifiedby');

        $validator
            ->boolean('deleted')
            ->allowEmptyString('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'), ['errorField' => 'driver_id']);
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'), ['errorField' => 'vehicle_id']);

        return $rules;
    }
}
