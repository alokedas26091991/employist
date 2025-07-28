<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StaticPage Entity
 *
 * @property int $id
 * @property string $page_name
 * @property string $slug
 * @property string|null $description
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_desc
 * @property string|null $robots
 * @property string|null $canonical
 * @property \Cake\I18n\FrozenTime|null $create_date
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $last_update_date
 * @property int|null $last_updated_by
 * @property bool $is_deleted
 */
class StaticPage extends Entity
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
        'page_name' => true,
        'slug' => true,
        'description' => true,
        'title' => true,
        'image' => true,
        'section' => true,
        'details' => true,
        'meta_title' => true,
        'meta_keywords' => true,
        'meta_desc' => true,
        'robots' => true,
        'canonical' => true,
        'create_date' => true,
        'created_by' => true,
        'last_update_date' => true,
        'last_updated_by' => true,
        'is_deleted' => true,
    ];
}
