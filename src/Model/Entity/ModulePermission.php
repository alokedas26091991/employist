<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModulePermission Entity
 *
 * @property int $id
 * @property int $role_id
 * @property int $module_id
 * @property bool $perm_view
 * @property bool $perm_insert
 * @property bool $perm_update
 * @property bool $perm_delete
 * @property bool $perm_seo
 * @property bool $perm_approve
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Module $module
 */
class ModulePermission extends Entity
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
        'role_id' => true,
        'module_id' => true,
        'perm_view' => true,
        'perm_insert' => true,
        'perm_update' => true,
        'perm_delete' => true,
        'perm_seo' => true,
        'perm_approve' => true,
        'is_deleted' => true,
        'role' => true,
        'module' => true,
    ];
}
