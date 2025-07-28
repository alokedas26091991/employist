<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExaminationMockTestQuestionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExaminationMockTestQuestionsTable Test Case
 */
class ExaminationMockTestQuestionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExaminationMockTestQuestionsTable
     */
    protected $ExaminationMockTestQuestions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ExaminationMockTestQuestions',
        'app.MockTests',
        'app.ExaminationCategories',
        'app.Questions',
        'app.Examinations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ExaminationMockTestQuestions') ? [] : ['className' => ExaminationMockTestQuestionsTable::class];
        $this->ExaminationMockTestQuestions = $this->getTableLocator()->get('ExaminationMockTestQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ExaminationMockTestQuestions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExaminationMockTestQuestionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExaminationMockTestQuestionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
