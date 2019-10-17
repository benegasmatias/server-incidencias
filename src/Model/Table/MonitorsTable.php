<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monitors Model
 *
 * @property \App\Model\Table\OfficesTable|\Cake\ORM\Association\BelongsTo $Offices
 *
 * @method \App\Model\Entity\Monitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Monitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor findOrCreate($search, callable $callback = null, $options = [])
 */
class MonitorsTable extends Table
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

        $this->setTable('monitors');
        $this->setDisplayField('id_monitor');
        $this->setPrimaryKey('id_monitor');

        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
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
            ->integer('id_monitor')
            ->allowEmptyString('id_monitor', null, 'create');

        $validator
            ->scalar('name_monitor')
            ->maxLength('name_monitor', 100)
            ->requirePresence('name_monitor', 'create')
            ->notEmptyString('name_monitor');
            $validator
            ->scalar('number_serie')
            ->maxLength('number_serie', 100)
            ->requirePresence('number_serie', 'create')
            ->notEmptyString('number_serie');

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

        return $rules;
    }
}
