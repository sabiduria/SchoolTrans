<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dependants Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PupilsTable&\Cake\ORM\Association\BelongsTo $Pupils
 *
 * @method \App\Model\Entity\Dependant newEmptyEntity()
 * @method \App\Model\Entity\Dependant newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Dependant> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dependant get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Dependant findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Dependant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Dependant> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dependant|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Dependant saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Dependant>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dependant>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dependant>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dependant> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dependant>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dependant>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dependant>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dependant> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DependantsTable extends Table
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

        $this->setTable('dependants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Pupils', [
            'foreignKey' => 'pupil_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'dependant_id',
        ]);
        $this->hasMany('Transports', [
            'foreignKey' => 'dependant_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('pupil_id')
            ->notEmptyString('pupil_id');

        $validator
            ->numeric('amount')
            ->allowEmptyString('amount');

        $validator
            ->boolean('exempted')
            ->allowEmptyString('exempted');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['pupil_id'], 'Pupils'), ['errorField' => 'pupil_id']);

        return $rules;
    }
}
