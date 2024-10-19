<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @property \App\Model\Table\AssignmentsTable&\Cake\ORM\Association\HasMany $Assignments
 *
 * @method \App\Model\Entity\Vehicle newEmptyEntity()
 * @method \App\Model\Entity\Vehicle newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehicle> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Vehicle findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehicle> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Vehicle saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VehiclesTable extends Table
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

        $this->setTable('vehicles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Assignments', [
            'foreignKey' => 'vehicle_id',
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
            ->scalar('plate')
            ->maxLength('plate', 10)
            ->allowEmptyString('plate');

        $validator
            ->scalar('mark')
            ->maxLength('mark', 45)
            ->allowEmptyString('mark');

        $validator
            ->integer('nbplaces')
            ->allowEmptyString('nbplaces');

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
