<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Problem Entity
 *
 * @property int $id_problem
 * @property string $name_problem
 *
 * @property \App\Model\Entity\Support[] $supports
 */
class Problem extends Entity
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
        'name_problem' => true,
        'supports' => true
    ];
}
