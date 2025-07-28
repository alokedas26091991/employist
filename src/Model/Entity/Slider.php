<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slider Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $photo
 * @property string|null $image_link
 * @property string|null $caption
 * @property int $sort_order
 * @property bool $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $create_date
 * @property int $is_deleted
 */
class Slider extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'photo' => true,
        'image_link' => true,
        'caption' => true,
        'sort_order' => true,
        'is_active' => true,
        'created_by' => true,
        'create_date' => true,
        'is_deleted' => true,
    ];
}
