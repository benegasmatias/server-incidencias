<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cabinet Entity
 *
 * @property int $id_cabinet
 * @property int $office_id
 * @property string $name_cabinet
 * @property int $ram_id
 * @property int $disk_id
 * @property int $motherboard_id
 *
 * @property \App\Model\Entity\Office $office
 * @property \App\Model\Entity\Ram $ram
 * @property \App\Model\Entity\Disk $disk
 * @property \App\Model\Entity\Motherboard $motherboard
 */
class Cabinet extends Entity
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
        'name_cabinet' => true,
        'name_computer'=>true,
        'ip_address'=>true,
        'ram_id' => true,
        'disk_id' => true,
        'motherboard_id' => true,
        'office' => true,
        'ram' => true,
        'disk' => true,
        'motherboard' => true,
        'microprocessor_id' => true
    ];
}
