<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CareersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CareersTable Test Case
 */
class CareersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CareersTable
     */
    protected $Careers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Careers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Careers') ? [] : ['className' => CareersTable::class];
        $this->Careers = $this->getTableLocator()->get('Careers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Careers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CareersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
