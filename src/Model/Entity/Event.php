<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id_event
 * @property \Cake\I18n\FrozenTime|null $start
 * @property \Cake\I18n\FrozenTime|null $end
 * @property string $title
 * @property string $color
 * @property string $draggable
 * @property string $allDay
 */
class Event extends Entity
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
        'start' => true,
        'end' => true,
        'title' => true,
        'color' => true,
        'draggable' => true,
        'allDay' => true
    ];
}
