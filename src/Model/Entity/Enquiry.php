<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enquiry Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $contact_person_name
 * @property string $contact_person_phone
 * @property string $email
 * @property string $purpose
 * @property string $message
 * @property bool $status
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 */
class Enquiry extends Entity
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
        'company_name' => true,
        'contact_person_name' => true,
        'contact_person_phone' => true,
        'email' => true,
        'purpose' => true,
        'message' => true,
        'status' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
