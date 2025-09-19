<?php
declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Diplomas Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TemplatesTable&\Cake\ORM\Association\BelongsTo $Templates
 *
 * @method \App\Model\Entity\Diploma newEmptyEntity()
 * @method \App\Model\Entity\Diploma newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Diploma> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diploma get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Diploma findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Diploma patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Diploma> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diploma|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Diploma saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Diploma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diploma>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Diploma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diploma> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Diploma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diploma>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Diploma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diploma> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DiplomasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('diplomas');
        $this->setDisplayField('competiting_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id',
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
            ->scalar('competiting_id')
            ->maxLength('competiting_id', 128)
            ->requirePresence('competiting_id', 'create')
            ->notEmptyString('competiting_id');

        $validator
            ->scalar('user_id')
            ->maxLength('user_id', 36)
            ->notEmptyString('user_id');

        $validator
            ->integer('template_id')
            ->notEmptyString('template_id');

        $validator
            ->integer('competitingclub_id')
            ->requirePresence('competitingclub_id', 'create')
            ->notEmptyString('competitingclub_id');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => '0']);
        $rules->add($rules->existsIn(['template_id'], 'Templates'), ['errorField' => '1']);

        return $rules;
    }
}
