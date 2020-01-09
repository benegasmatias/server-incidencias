<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeparturesToner Entity
 *
 * @property int $id
 * @property int $office_id
 * @property int $toner_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $date
 *
 * @property \App\Model\Entity\Office $office
 * @property \App\Model\Entity\Toner $toner
 */
class DeparturesToner extends Entity
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
        'office_id' => true,
        'toner_id' => true,
        'quantity_departures' => true
    ];
}
