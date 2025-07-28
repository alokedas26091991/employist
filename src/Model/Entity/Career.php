<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Career Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $resume
 * @property string $message
 * @property int $status
 * @property int $is_deleted
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 */
class Career extends Entity
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
        'email' => true,
        'phone' => true,
        'resume' => true,
        'message' => true,
        'status' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
