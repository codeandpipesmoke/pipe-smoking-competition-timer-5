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
 * Competitions Model
 *
 * @property \App\Model\Table\CompetingclubsTable&\Cake\ORM\Association\HasMany $Competingclubs
 * @property \App\Model\Table\CompetitorsTable&\Cake\ORM\Association\HasMany $Competitors
 * @property \App\Model\Table\TablesTable&\Cake\ORM\Association\HasMany $Tables
 *
 * @method \App\Model\Entity\Competition newEmptyEntity()
 * @method \App\Model\Entity\Competition newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Competition> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competition get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Competition findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Competition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Competition> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competition|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Competition saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Competition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competition>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competition> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competition>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Competition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Competition> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompetitionsTable extends Table
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

        $this->setTable('competitions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->hasMany('Competingclubs', [
            'foreignKey' => 'competition_id',
        ]);
        $this->hasMany('Competitors', [
            'foreignKey' => 'competition_id',
        ]);
        $this->hasMany('Tables', [
            'foreignKey' => 'competition_id',
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
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->dateTime('description')
            ->allowEmptyDateTime('description');

        $validator
            ->dateTime('registration_deadline')
            ->requirePresence('registration_deadline', 'create')
            ->notEmptyDateTime('registration_deadline');

        $validator
            ->boolean('registration_closed')
            ->notEmptyString('registration_closed');

        $validator
            ->scalar('tobacco')
            ->maxLength('tobacco', 250)
            ->requirePresence('tobacco', 'create')
            ->notEmptyString('tobacco');

        $validator
            ->decimal('tobacco_quantity')
            ->notEmptyString('tobacco_quantity');

        $validator
            ->scalar('pipe')
            ->maxLength('pipe', 250)
            ->requirePresence('pipe', 'create')
            ->notEmptyString('pipe');

        $validator
            ->nonNegativeInteger('competition_fee')
            ->allowEmptyString('competition_fee');

        $validator
            ->boolean('lunch_is_included_in_the_competition_fee')
            ->allowEmptyString('lunch_is_included_in_the_competition_fee');

        $validator
            ->dateTime('email_has_been_sent')
            ->allowEmptyDateTime('email_has_been_sent');

        $validator
            ->time('start_of_pipe_filling')
            ->allowEmptyTime('start_of_pipe_filling');

        $validator
            ->time('start_of_pipe_lighting')
            ->allowEmptyTime('start_of_pipe_lighting');

        $validator
            ->boolean('the_pipe_filling_must_be_repeated')
            ->allowEmptyString('the_pipe_filling_must_be_repeated');

        $validator
            ->boolean('closed_competition')
            ->allowEmptyString('closed_competition');

        $validator
            ->time('closing_time')
            ->allowEmptyTime('closing_time');

        $validator
            ->nonNegativeInteger('maximum_number_of_clubs')
            ->notEmptyString('maximum_number_of_clubs');

        $validator
            ->nonNegativeInteger('maximum_number_of_competitors')
            ->notEmptyString('maximum_number_of_competitors');

        $validator
            ->nonNegativeInteger('maximum_number_of_tables')
            ->notEmptyString('maximum_number_of_tables');

        $validator
            ->nonNegativeInteger('table_count')
            ->notEmptyString('table_count');

        $validator
            ->nonNegativeInteger('competingclub_count')
            ->notEmptyString('competingclub_count');

        $validator
            ->nonNegativeInteger('competitor_count')
            ->notEmptyString('competitor_count');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        return $validator;
    }
}
