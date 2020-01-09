<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesToners Model
 *
 * @method \App\Model\Entity\TypesToner get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesToner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesToner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesToner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesToner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesToner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesToner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesToner findOrCreate($search, callable $callback = null, $options = [])
 */
class TypesTonersTable extends Table
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

        $this->setTable('types_toners');
        $this->setDisplayField('id_type');
        $this->setPrimaryKey('id_type');
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
            ->integer('id_type')
            ->allowEmptyString('id_type', null, 'create');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }
}
