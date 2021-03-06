<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Toner Entity
 *
 * @property int $id_toner
 * @property string $toner_model
 *
 * @property \App\Model\Entity\Printer[] $printers
 */
class Toner extends Entity
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
        'toner_model' => true,
        'quantity'=>true,
        'type_id'=>true,
        'description'=>true
    ];
}
