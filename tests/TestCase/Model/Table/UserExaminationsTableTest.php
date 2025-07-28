<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserExaminationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserExaminationsTable Test Case
 */
class UserExaminationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserExaminationsTable
     */
    protected $UserExaminations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UserExaminations',
        'app.Examinations',
        'app.ExaminationCategories',
        'app.MockTests',
        'app.Users',
        'app.UserExaminationAnswers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserExaminations') ? [] : ['className' => UserExaminationsTable::class];
        $this->UserExaminations = $this->getTableLocator()->get('UserExaminations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserExaminations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserExaminationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserExaminationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
