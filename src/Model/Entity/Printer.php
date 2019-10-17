<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Printer Entity
 *
 * @property int $id_printer
 * @property string $name_ printer
 * @property int $office_id
 *
 * @property \App\Model\Entity\Office $office
 */
class Printer extends Entity
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
        'name_printer' => true,
        'office_id' => true,
        'office' => true,
        'toner_id'=> true,
        'number_serie'=>true
    ];
}
