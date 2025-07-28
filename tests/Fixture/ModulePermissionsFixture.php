<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModulePermissionsFixture
 */
class ModulePermissionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'role_id' => 1,
                'module_id' => 1,
                'perm_view' => 1,
                'perm_insert' => 1,
                'perm_update' => 1,
                'perm_delete' => 1,
                'perm_seo' => 1,
                'perm_approve' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
