<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cabinets Model
 *
 * @property \App\Model\Table\OfficesTable|\Cake\ORM\Association\BelongsTo $Offices
 * @property \App\Model\Table\RamsTable|\Cake\ORM\Association\BelongsTo $Rams
 * @property \App\Model\Table\DisksTable|\Cake\ORM\Association\BelongsTo $Disks
 * @property \App\Model\Table\MotherboardsTable|\Cake\ORM\Association\BelongsTo $Motherboards
 * @property \App\Model\Table\MicroprocessorsTable|\Cake\ORM\Association\BelongsTo $Microprocessors
 *
 * @method \App\Model\Entity\Cabinet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cabinet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cabinet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cabinet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cabinet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cabinet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cabinet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cabinet findOrCreate($search, callable $callback = null, $options = [])
 */
class CabinetsTable extends Table
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

        $this->setTable('cabinets');
        $this->setDisplayField('id_cabinet');
        $this->setPrimaryKey('id_cabinet');

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
        $this->belongsTo('Motherboards', [
            'foreignKey' => 'motherboard_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Microprocessors', [
            'foreignKey' => 'microprocessor_id',
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
            ->integer('id_cabinet')
            ->allowEmptyString('id_cabinet', null, 'create');

        $validator
            ->scalar('name_cabinet')
            ->maxLength('name_cabinet', 255)
            ->requirePresence('name_cabinet', 'create')
            ->notEmptyString('name_cabinet');

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
        $rules->add($rules->existsIn(['motherboard_id'], 'Motherboards'));
        $rules->add($rules->existsIn(['microprocessor_id'], 'Microprocessors'));

        return $rules;
    }
}
