<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $no_mock_test
 * @property int $valid_days
 * @property float $price
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_deleted
 */
class Product extends Entity
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
        'no_mock_test' => true,
        'valid_days' => true,
        'price' => true,
        'created_by' => true,
        'create_date' => true,
        'is_deleted' => true,
    ];
}
