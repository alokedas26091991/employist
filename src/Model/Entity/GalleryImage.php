<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GalleryImage Entity
 *
 * @property int $id
 * @property int $gallery_id
 * @property string $image
 * @property bool $is_active
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Gallery $gallery
 */
class GalleryImage extends Entity
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
        'gallery_id' => true,
        'image' => true,
        'is_active' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
        'gallery' => true,
    ];
}
