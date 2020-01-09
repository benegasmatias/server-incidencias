<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeparturesToners Model
 *
 * @property \App\Model\Table\OfficesTable|\Cake\ORM\Association\BelongsTo $Offices
 * @property \App\Model\Table\TonersTable|\Cake\ORM\Association\BelongsTo $Toners
 *
 * @method \App\Model\Entity\DeparturesToner get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeparturesToner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeparturesToner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeparturesToner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeparturesToner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeparturesToner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeparturesToner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeparturesToner findOrCreate($search, callable $callback = null, $options = [])
 */
class DeparturesTonersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('departures_toners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Toners', [
            'foreignKey' => 'toner_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

            $validator
            ->scalar('quantity_departures')
            ->maxLength('quantity_departures', 255)
            ->requirePresence('quantity_departures', 'create')
            ->notEmptyString('quantity_departures');

        $validator
            ->dateTime('date')
            ->notEmptyDateTime('date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['toner_id'], 'Toners'));

        return $rules;
    }
}
