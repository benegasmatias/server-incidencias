<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Problems Model
 *
 * @property \App\Model\Table\SupportsTable|\Cake\ORM\Association\HasMany $Supports
 *
 * @method \App\Model\Entity\Problem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Problem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Problem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Problem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Problem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Problem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Problem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Problem findOrCreate($search, callable $callback = null, $options = [])
 */
class ProblemsTable extends Table
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

        $this->setTable('problems');
        $this->setDisplayField('id_problem');
        $this->setPrimaryKey('id_problem');

        $this->hasMany('Supports', [
            'foreignKey' => 'problem_id'
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
            ->integer('id_problem')
            ->allowEmptyString('id_problem', null, 'create');

        $validator
            ->scalar('name_problem')
            ->maxLength('name_problem', 50)
            ->requirePresence('name_problem', 'create')
            ->notEmptyString('name_problem');

        return $validator;
    }
}
