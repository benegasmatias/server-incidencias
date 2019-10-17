<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Microprocessors Model
 *
 * @method \App\Model\Entity\Microprocessor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Microprocessor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Microprocessor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Microprocessor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Microprocessor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Microprocessor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Microprocessor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Microprocessor findOrCreate($search, callable $callback = null, $options = [])
 */
class MicroprocessorsTable extends Table
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

        $this->setTable('microprocessors');
        $this->setDisplayField('id_microprocessor');
        $this->setPrimaryKey('id_microprocessor');
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
            ->integer('id_microprocessor')
            ->allowEmptyString('id_microprocessor', null, 'create');

        $validator
            ->scalar('microprocessor')
            ->maxLength('microprocessor', 255)
            ->requirePresence('microprocessor', 'create')
            ->notEmptyString('microprocessor');

        return $validator;
    }
}
