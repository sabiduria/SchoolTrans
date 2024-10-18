<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Drivers Model
 *
 * @method \App\Model\Entity\Driver newEmptyEntity()
 * @method \App\Model\Entity\Driver newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Driver> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Driver get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Driver findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Driver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Driver> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Driver|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Driver saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DriversTable extends Table
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

        $this->setTable('drivers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Assignments', [
            'foreignKey' => 'driver_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->allowEmptyString('phone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

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
}
