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
 * Competitors Model
 *
 * @property \App\Model\Table\CompetitionsTable&\Cake\ORM\Association\BelongsTo $Competitions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CompetingclubsTable&\Cake\ORM\Association\BelongsTo $Competingclubs
 * @property \App\Model\Table\TablesTable&\Cake\ORM\Association\BelongsTo $Tables
 *
 * @method \App\Model\Entity\Competitor newEmptyEntity()
 * @method \App\Model\Entity\Competitor newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Competitor> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competitor get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Competitor findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Competitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Competitor> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competitor|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Competitor saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Competitor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competitor>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competitor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competitor> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competitor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competitor>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competitor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competitor> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class CompetitorsTable extends Table
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

        $this->setTable('competitors');
        $this->setDisplayField('competition_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Competitions' => ['competitor_count'],
            'Users' => ['competitor_count'],
            'Competingclubs' => ['competitor_count'],
            'Tables' => ['competitor_count'],
        ]);
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Competitions', [
            'foreignKey' => 'competition_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MyUsers', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Competingclubs', [
            'foreignKey' => 'competingclub_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tables', [
            'foreignKey' => 'table_id',
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
            ->scalar('competition_id')
            ->maxLength('competition_id', 128)
            ->notEmptyString('competition_id');

        $validator
            ->scalar('user_id')
            ->maxLength('user_id', 36)
            ->notEmptyString('user_id');

        $validator
            ->nonNegativeInteger('competingclub_id')
            ->notEmptyString('competingclub_id');

        $validator
            ->nonNegativeInteger('table_id')
            ->notEmptyString('table_id');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->boolean('paid')
            ->requirePresence('paid', 'create')
            ->notEmptyString('paid');

        $validator
            ->time('time_achieved')
            ->notEmptyTime('time_achieved');

        $validator
            ->nonNegativeInteger('score')
            ->notEmptyString('score');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->notEmptyString('dinner_count');

        $validator
            ->notEmptyString('number_of_companions');

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
        $rules->add($rules->existsIn(['competition_id'], 'Competitions'), ['errorField' => '0']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => '1']);
        $rules->add($rules->existsIn(['competingclub_id'], 'Competingclubs'), ['errorField' => '2']);
        $rules->add($rules->existsIn(['table_id'], 'Tables'), ['errorField' => '3']);

        return $rules;
    }
}
