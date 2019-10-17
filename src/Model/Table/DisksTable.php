<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Disks Model
 *
 * @property \App\Model\Table\CabinetsTable|\Cake\ORM\Association\HasMany $Cabinets
 * @property \App\Model\Table\LaptopsTable|\Cake\ORM\Association\HasMany $Laptops
 *
 * @method \App\Model\Entity\Disk get($primaryKey, $options = [])
 * @method \App\Model\Entity\Disk newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Disk[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Disk|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disk saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disk patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Disk[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Disk findOrCreate($search, callable $callback = null, $options = [])
 */
class DisksTable extends Table
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

        $this->setTable('disks');
        $this->setDisplayField('id_disk');
        $this->setPrimaryKey('id_disk');

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
            ->integer('id_disk')
            ->allowEmptyString('id_disk', null, 'create');

        $validator
            ->scalar('capacity_disk')
            ->maxLength('capacity_disk', 255)
            ->requirePresence('capacity_disk', 'create')
            ->notEmptyString('capacity_disk');

        return $validator;
    }
}
