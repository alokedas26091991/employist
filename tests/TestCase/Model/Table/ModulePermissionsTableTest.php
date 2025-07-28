<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModulePermissionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModulePermissionsTable Test Case
 */
class ModulePermissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModulePermissionsTable
     */
    protected $ModulePermissions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ModulePermissions',
        'app.Roles',
        'app.Modules',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ModulePermissions') ? [] : ['className' => ModulePermissionsTable::class];
        $this->ModulePermissions = $this->getTableLocator()->get('ModulePermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ModulePermissions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ModulePermissionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ModulePermissionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
