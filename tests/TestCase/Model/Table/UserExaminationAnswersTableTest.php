<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserExaminationAnswersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserExaminationAnswersTable Test Case
 */
class UserExaminationAnswersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserExaminationAnswersTable
     */
    protected $UserExaminationAnswers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UserExaminationAnswers',
        'app.UserExaminations',
        'app.ExaminationQuestions',
        'app.Questions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserExaminationAnswers') ? [] : ['className' => UserExaminationAnswersTable::class];
        $this->UserExaminationAnswers = $this->getTableLocator()->get('UserExaminationAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserExaminationAnswers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserExaminationAnswersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserExaminationAnswersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
