<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserDeliveryDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserDeliveryDetailsTable Test Case
 */
class UserDeliveryDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserDeliveryDetailsTable
     */
    protected $UserDeliveryDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UserDeliveryDetails',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserDeliveryDetails') ? [] : ['className' => UserDeliveryDetailsTable::class];
        $this->UserDeliveryDetails = $this->getTableLocator()->get('UserDeliveryDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserDeliveryDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserDeliveryDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserDeliveryDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
