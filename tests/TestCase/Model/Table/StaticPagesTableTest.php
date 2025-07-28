<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaticPagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaticPagesTable Test Case
 */
class StaticPagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StaticPagesTable
     */
    protected $StaticPages;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.StaticPages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StaticPages') ? [] : ['className' => StaticPagesTable::class];
        $this->StaticPages = $this->getTableLocator()->get('StaticPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StaticPages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StaticPagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
