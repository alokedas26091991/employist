<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserProductDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserProductDetailsTable Test Case
 */
class UserProductDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserProductDetailsTable
     */
    protected $UserProductDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UserProductDetails',
        'app.Users',
        'app.UserProducts',
        'app.Examinations',
        'app.MockTests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserProductDetails') ? [] : ['className' => UserProductDetailsTable::class];
        $this->UserProductDetails = $this->getTableLocator()->get('UserProductDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserProductDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserProductDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserProductDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
