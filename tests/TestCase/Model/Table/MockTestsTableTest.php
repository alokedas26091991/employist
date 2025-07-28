<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MockTestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MockTestsTable Test Case
 */
class MockTestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MockTestsTable
     */
    protected $MockTests;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MockTests',
        'app.ExaminationCategories',
        'app.Examinations',
        'app.ExaminationQuestions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MockTests') ? [] : ['className' => MockTestsTable::class];
        $this->MockTests = $this->getTableLocator()->get('MockTests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MockTests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MockTestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MockTestsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
