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
 * Countries Model
 *
 * @property \App\Model\Table\ClubsTable&\Cake\ORM\Association\HasMany $Clubs
 * @property \App\Model\Table\CompetingclubsTable&\Cake\ORM\Association\HasMany $Competingclubs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Country newEmptyEntity()
 * @method \App\Model\Entity\Country newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Country> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Country get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Country findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Country patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Country> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Country|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Country saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Country>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Country>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Country>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Country> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Country>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Country>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Country>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Country> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CountriesTable extends Table
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

        $this->setTable('countries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->hasMany('Clubs', [
            'foreignKey' => 'country_id',
        ]);
        $this->hasMany('Competingclubs', [
            'foreignKey' => 'country_id',
        ]);
        $this->hasMany('MyUsers', [
            'foreignKey' => 'country_id',
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
            ->scalar('continent')
            ->maxLength('continent', 50)
            ->allowEmptyString('continent');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('iso')
            ->maxLength('iso', 10)
            ->requirePresence('iso', 'create')
            ->notEmptyString('iso');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->dateTime('last_used')
            ->allowEmptyDateTime('last_used');

        $validator
            ->integer('user_count')
            ->notEmptyString('user_count');

        $validator
            ->nonNegativeInteger('club_count')
            ->notEmptyString('club_count');

        $validator
            ->nonNegativeInteger('competition_count')
            ->notEmptyString('competition_count');

        return $validator;
    }
}
