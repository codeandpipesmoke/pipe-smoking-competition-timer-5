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
 * Competingclubs Model
 *
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\CompetitionsTable&\Cake\ORM\Association\BelongsTo $Competitions
 * @property \App\Model\Table\ClubsTable&\Cake\ORM\Association\BelongsTo $Clubs
 * @property \App\Model\Table\CompetitorsTable&\Cake\ORM\Association\HasMany $Competitors
 *
 * @method \App\Model\Entity\Competingclub newEmptyEntity()
 * @method \App\Model\Entity\Competingclub newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Competingclub> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competingclub get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Competingclub findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Competingclub patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Competingclub> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competingclub|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Competingclub saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Competingclub>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competingclub>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competingclub>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competingclub> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competingclub>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competingclub>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competingclub>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competingclub> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class CompetingclubsTable extends Table
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

        $this->setTable('competingclubs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Competitions' => ['competingclub_count'],
            'Clubs' => ['competingclub_count'],
        ]);
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Competitions', [
            'foreignKey' => 'competition_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Competitors', [
            'foreignKey' => 'competingclub_id',
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
            ->integer('country_id')
            ->notEmptyString('country_id');

        $validator
            ->scalar('competition_id')
            ->maxLength('competition_id', 128)
            ->notEmptyString('competition_id');

        $validator
            ->integer('club_id')
            ->notEmptyString('club_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->time('time_achieved')
            ->requirePresence('time_achieved', 'create')
            ->notEmptyTime('time_achieved');

        $validator
            ->integer('score')
            ->notEmptyString('score');

        $validator
            ->boolean('excluded')
            ->requirePresence('excluded', 'create')
            ->notEmptyString('excluded');

        $validator
            ->scalar('excluded_description')
            ->requirePresence('excluded_description', 'create')
            ->notEmptyString('excluded_description');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->nonNegativeInteger('competitor_count')
            ->notEmptyString('competitor_count');

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
        $rules->add($rules->existsIn(['country_id'], 'Countries'), ['errorField' => '0']);
        $rules->add($rules->existsIn(['competition_id'], 'Competitions'), ['errorField' => '1']);
        $rules->add($rules->existsIn(['club_id'], 'Clubs'), ['errorField' => '2']);

        return $rules;
    }
}
