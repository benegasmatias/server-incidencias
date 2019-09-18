<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Support Entity
 *
 * @property int $id_support
 * @property \Cake\I18n\FrozenTime $date_support
 * @property int|null $proccedings_support
 * @property int $technical_id
 * @property int $problem_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Technical $technical
 * @property \App\Model\Entity\Problem $problem
 * @property \App\Model\Entity\User $user
 */
class Support extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        
        'proccedings_support' => true,
        'technical_id' => true,
        'problem_id' => true,
        'user_id' => true,
        'description'=>true
    ];
}
