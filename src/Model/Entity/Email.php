<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Email Entity
 *
 * @property int $id
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property string $send_from
 * @property string $send_from_name
 * @property int $type
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $create_date
 * @property \Cake\I18n\FrozenTime|null $last_update_date
 * @property int|null $last_updated_by
 * @property bool $is_deleted
 */
class Email extends Entity
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
        'subject' => true,
        'body' => true,
        'send_from' => true,
        'send_from_name' => true,
        'type' => true,
        'created_by' => true,
        'create_date' => true,
        'last_update_date' => true,
        'last_updated_by' => true,
        'is_deleted' => true,
    ];
}
