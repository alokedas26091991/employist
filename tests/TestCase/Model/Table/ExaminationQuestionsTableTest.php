<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExaminationQuestionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExaminationQuestionsTable Test Case
 */
class ExaminationQuestionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExaminationQuestionsTable
     */
    protected $ExaminationQuestions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ExaminationQuestions',
        'app.ExaminationCategories',
        'app.Questions',
        'app.Examinations',
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
        $config = $this->getTableLocator()->exists('ExaminationQuestions') ? [] : ['className' => ExaminationQuestionsTable::class];
        $this->ExaminationQuestions = $this->getTableLocator()->get('ExaminationQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ExaminationQuestions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExaminationQuestionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExaminationQuestionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
