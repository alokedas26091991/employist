<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExaminationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExaminationsTable Test Case
 */
class ExaminationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExaminationsTable
     */
    protected $Examinations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Examinations',
        'app.ExaminationCategories',
        'app.ExaminationQuestions',
        'app.MockTests',
        'app.UserExaminations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Examinations') ? [] : ['className' => ExaminationsTable::class];
        $this->Examinations = $this->getTableLocator()->get('Examinations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Examinations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExaminationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExaminationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
