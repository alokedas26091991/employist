<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Social Entity
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $fb
 * @property string $instagram
 * @property string $youtube
 * @property string $office_hour
 */
class Social extends Entity
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
        'email' => true,
        'phone' => true,
        'whatsapp_no' => true,
        'address' => true,
        'fb' => true,
        'instagram' => true,
        'youtube' => true,
        'office_hour' => true,
    ];
}
