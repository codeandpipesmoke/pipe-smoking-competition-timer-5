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
 * Tables Model
 *
 * @property \App\Model\Table\CompetitionsTable&\Cake\ORM\Association\BelongsTo $Competitions
 * @property \App\Model\Table\CompetitorsTable&\Cake\ORM\Association\HasMany $Competitors
 *
 * @method \App\Model\Entity\Table newEmptyEntity()
 * @method \App\Model\Entity\Table newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Table> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Table get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Table findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Table patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Table> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Table|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Table saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Table>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Table>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Table>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Table> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Table>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Table>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Table>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Table> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class TablesTable extends Table
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

        $this->setTable('tables');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Competitions' => ['table_count'],
        ]);

        $this->belongsTo('Competitions', [
            'foreignKey' => 'competition_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Competitors', [
            'foreignKey' => 'table_id',
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
            ->nonNegativeInteger('tablejudge_id')
            ->requirePresence('tablejudge_id', 'create')
            ->notEmptyString('tablejudge_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->nonNegativeInteger('chairs')
            ->notEmptyString('chairs');

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
        $rules->add($rules->existsIn(['competition_id'], 'Competitions'), ['errorField' => '0']);

        return $rules;
    }
}
