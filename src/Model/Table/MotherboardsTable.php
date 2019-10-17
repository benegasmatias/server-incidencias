<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Motherboards Model
 *
 * @property \App\Model\Table\CabinetsTable|\Cake\ORM\Association\HasMany $Cabinets
 *
 * @method \App\Model\Entity\Motherboard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Motherboard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Motherboard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Motherboard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Motherboard saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Motherboard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Motherboard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Motherboard findOrCreate($search, callable $callback = null, $options = [])
 */
class MotherboardsTable extends Table
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

        $this->setTable('motherboards');
        $this->setDisplayField('id_motherboard');
        $this->setPrimaryKey('id_motherboard');

    
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
            ->integer('id_motherboard')
            ->allowEmptyString('id_motherboard', null, 'create');

        $validator
            ->scalar('name_motherboard')
            ->maxLength('name_motherboard', 255)
            ->requirePresence('name_motherboard', 'create')
            ->notEmptyString('name_motherboard');

        return $validator;
    }
}
