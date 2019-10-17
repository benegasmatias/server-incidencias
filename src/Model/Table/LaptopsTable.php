<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Laptops Model
 *
 * @property \App\Model\Table\OfficesTable|\Cake\ORM\Association\BelongsTo $Offices
 * @property \App\Model\Table\RamsTable|\Cake\ORM\Association\BelongsTo $Rams
 * @property \App\Model\Table\DisksTable|\Cake\ORM\Association\BelongsTo $Disks
 *
 * @method \App\Model\Entity\Laptop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Laptop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Laptop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Laptop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Laptop saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Laptop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Laptop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Laptop findOrCreate($search, callable $callback = null, $options = [])
 */
class LaptopsTable extends Table
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

        $this->setTable('laptops');
        $this->setDisplayField('id_laptop');
        $this->setPrimaryKey('id_laptop');

        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Rams', [
            'foreignKey' => 'ram_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Disks', [
            'foreignKey' => 'disk_id',
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
            ->integer('id_laptop')
            ->allowEmptyString('id_laptop', null, 'create');

        $validator
            ->scalar('name_laptop')
            ->maxLength('name_laptop', 255)
            ->requirePresence('name_laptop', 'create')
            ->notEmptyString('name_laptop');

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
        $rules->add($rules->existsIn(['ram_id'], 'Rams'));
        $rules->add($rules->existsIn(['disk_id'], 'Disks'));

        return $rules;
    }
}
