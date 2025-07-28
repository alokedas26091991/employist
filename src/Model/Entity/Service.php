<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $align
 * @property string|null $title_1
 * @property string|null $title_2
 * @property string|null $title_3
 * @property string|null $title_4
 * @property string|null $title_5
 * @property string|null $title_6
 * @property string|null $title_7
 * @property string|null $title_8
 * @property string|null $title_9
 * @property string|null $title_10
 */
class Service extends Entity
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
        'image' => true,
        'align' => true,
        'title_1' => true,
        'title_2' => true,
        'title_3' => true,
        'title_4' => true,
        'title_5' => true,
        'title_6' => true,
        'title_7' => true,
        'title_8' => true,
        'title_9' => true,
        'title_10' => true,
    ];
}
