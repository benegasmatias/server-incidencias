<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rams Model
 *
 * @property \App\Model\Table\CabinetsTable|\Cake\ORM\Association\HasMany $Cabinets
 * @property \App\Model\Table\LaptopsTable|\Cake\ORM\Association\HasMany $Laptops
 *
 * @method \App\Model\Entity\Ram get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ram newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ram[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ram|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ram saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ram patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ram[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ram findOrCreate($search, callable $callback = null, $options = [])
 */
class RamsTable extends Table
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

        $this->setTable('rams');
        $this->setDisplayField('id_ram');
        $this->setPrimaryKey('id_ram');
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
            ->integer('id_ram')
            ->allowEmptyString('id_ram', null, 'create');

        $validator
            ->scalar('capacity_ram')
            ->maxLength('capacity_ram', 255)
            ->requirePresence('capacity_ram', 'create')
            ->notEmptyString('capacity_ram');

        return $validator;
    }
}
