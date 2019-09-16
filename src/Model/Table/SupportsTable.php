<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Supports Model
 *
 * @property \App\Model\Table\TechnicalsTable|\Cake\ORM\Association\BelongsTo $Technicals
 * @property \App\Model\Table\ProblemsTable|\Cake\ORM\Association\BelongsTo $Problems
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Support get($primaryKey, $options = [])
 * @method \App\Model\Entity\Support newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Support[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Support|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Support saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Support patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Support[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Support findOrCreate($search, callable $callback = null, $options = [])
 */
class SupportsTable extends Table
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

        $this->setTable('supports');
        $this->setDisplayField('id_support');
        $this->setPrimaryKey('id_support');

        $this->belongsTo('Technicals', [
            'foreignKey' => 'technical_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Problems', [
            'foreignKey' => 'problem_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('id_support')
            ->allowEmptyString('id_support', null, 'create');

        $validator
            ->dateTime('date_support')
            ->notEmptyDateTime('date_support');

        $validator
            ->integer('proccedings_support')
            ->allowEmptyString('proccedings_support');

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
        $rules->add($rules->existsIn(['technical_id'], 'Technicals'));
        $rules->add($rules->existsIn(['problem_id'], 'Problems'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
