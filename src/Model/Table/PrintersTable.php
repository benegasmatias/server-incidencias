<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Printers Model
 *
 * @property \App\Model\Table\OfficesTable|\Cake\ORM\Association\BelongsTo $Offices
 *
 * @method \App\Model\Entity\Printer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Printer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Printer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Printer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Printer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Printer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Printer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Printer findOrCreate($search, callable $callback = null, $options = [])
 */
class PrintersTable extends Table
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

        $this->setTable('printers');
        $this->setDisplayField('id_printer');
        $this->setPrimaryKey('id_printer');

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
            ->integer('id_printer')
            ->allowEmptyString('id_printer', null, 'create');

        $validator
            ->scalar('name_printer')
            ->maxLength('name_ printer', 100)
            ->requirePresence('name_printer', 'create')
            ->notEmptyString('name_printer');

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
