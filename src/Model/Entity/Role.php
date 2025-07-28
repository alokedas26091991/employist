<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property string $role_name
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ModulePermission[] $module_permissions
 * @property \App\Model\Entity\UserRole[] $user_roles
 */
class Role extends Entity
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
        'role_name' => true,
        'is_deleted' => true,
        'module_permissions' => true,
        'user_roles' => true,
    ];
}
