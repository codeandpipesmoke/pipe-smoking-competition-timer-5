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
 * Clubs Model
 *
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\CompetingclubsTable&\Cake\ORM\Association\HasMany $Competingclubs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Club newEmptyEntity()
 * @method \App\Model\Entity\Club newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Club> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Club get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Club findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Club patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Club> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Club|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Club saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Club>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Club>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Club>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Club> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Club>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Club>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Club>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Club> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class ClubsTable extends Table
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

        $this->setTable('clubs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Countries' => ['club_count'],
        ]);

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Chairmans', [
            'foreignKey' => 'chairman_id',
            'joinType' => 'LEFT',
        ]);
        $this->hasMany('MyUsers', [
            'foreignKey' => 'club_id',
        ]);
        $this->hasMany('Competingclubs', [
            'foreignKey' => 'club_id',
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
            ->nonNegativeInteger('country_id')
            ->notEmptyString('country_id');

        $validator
            ->scalar('chairman_id')
            ->maxLength('chairman_id', 36)
            ->allowEmptyString('chairman_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('web')
            ->maxLength('web', 250)
            ->allowEmptyString('web');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->nonNegativeInteger('user_count')
            ->notEmptyString('user_count');

        $validator
            ->nonNegativeInteger('competingclub_count')
            ->notEmptyString('competingclub_count');

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

        return $rules;
    }
}
