<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionAnswersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionAnswersTable Test Case
 */
class QuestionAnswersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionAnswersTable
     */
    protected $QuestionAnswers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.QuestionAnswers',
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
        $config = $this->getTableLocator()->exists('QuestionAnswers') ? [] : ['className' => QuestionAnswersTable::class];
        $this->QuestionAnswers = $this->getTableLocator()->get('QuestionAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->QuestionAnswers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuestionAnswersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QuestionAnswersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
