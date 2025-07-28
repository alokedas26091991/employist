<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GalleryImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GalleryImagesTable Test Case
 */
class GalleryImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GalleryImagesTable
     */
    protected $GalleryImages;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.GalleryImages',
        'app.Galleries',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('GalleryImages') ? [] : ['className' => GalleryImagesTable::class];
        $this->GalleryImages = $this->getTableLocator()->get('GalleryImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->GalleryImages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GalleryImagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GalleryImagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
