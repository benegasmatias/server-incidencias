<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Toners Model
 *
 * @property \App\Model\Table\PrintersTable|\Cake\ORM\Association\HasMany $Printers
 *
 * @method \App\Model\Entity\Toner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Toner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Toner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Toner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Toner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Toner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Toner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Toner findOrCreate($search, callable $callback = null, $options = [])
 */
class TonersTable extends Table
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

        $this->setTable('toners');
        $this->setDisplayField('id_toner');
        $this->setPrimaryKey('id_toner');

        $this->belongsTo('TypesToners', [
            'foreignKey' => 'type_id',
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
            ->integer('id_toner')
            ->allowEmptyString('id_toner', null, 'create');

        $validator
            ->scalar('toner_model')
            ->maxLength('toner_model', 255)
            ->requirePresence('toner_model', 'create')
            ->notEmptyString('toner_model');
            $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');
           
            
       

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
        $rules->add($rules->existsIn(['type_id'], 'TypesToners'));
        return $rules;
    }
}
