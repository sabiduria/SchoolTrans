<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transports Model
 *
 * @property \App\Model\Table\AssignmentsTable&\Cake\ORM\Association\BelongsTo $Assignments
 * @property \App\Model\Table\DependantsTable&\Cake\ORM\Association\BelongsTo $Dependants
 *
 * @method \App\Model\Entity\Transport newEmptyEntity()
 * @method \App\Model\Entity\Transport newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Transport> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transport get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Transport findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Transport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Transport> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transport|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Transport saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Transport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transport>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transport> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transport>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transport> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransportsTable extends Table
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

        $this->setTable('transports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Assignments', [
            'foreignKey' => 'assignment_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Dependants', [
            'foreignKey' => 'dependant_id',
            'joinType' => 'INNER',
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
            ->integer('assignment_id')
            ->notEmptyString('assignment_id');

        $validator
            ->integer('dependant_id')
            ->notEmptyString('dependant_id');

        $validator
            ->dateTime('pickupathome')
            ->allowEmptyDateTime('pickupathome');

        $validator
            ->dateTime('dropoffatschool')
            ->allowEmptyDateTime('dropoffatschool');

        $validator
            ->dateTime('pickupschool')
            ->allowEmptyDateTime('pickupschool');

        $validator
            ->dateTime('dropoffathome')
            ->allowEmptyDateTime('dropoffathome');

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
        $rules->add($rules->existsIn(['assignment_id'], 'Assignments'), ['errorField' => 'assignment_id']);
        $rules->add($rules->existsIn(['dependant_id'], 'Dependants'), ['errorField' => 'dependant_id']);

        return $rules;
    }
}
