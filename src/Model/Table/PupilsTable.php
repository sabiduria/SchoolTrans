<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pupils Model
 *
 * @method \App\Model\Entity\Pupil newEmptyEntity()
 * @method \App\Model\Entity\Pupil newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pupil> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pupil get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pupil findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pupil patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pupil> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pupil|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pupil saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pupil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pupil>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pupil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pupil> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pupil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pupil>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pupil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pupil> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PupilsTable extends Table
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

        $this->setTable('pupils');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Dependants', [
            'foreignKey' => 'pupil_id',
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
            ->scalar('reference')
            ->maxLength('reference', 45)
            ->allowEmptyString('reference');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 45)
            ->allowEmptyString('lastname');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->allowEmptyString('phone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->boolean('actived')
            ->allowEmptyString('actived');

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
