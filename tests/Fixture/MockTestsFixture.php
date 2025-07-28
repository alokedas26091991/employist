<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MockTestsFixture
 */
class MockTestsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'examination_category_id' => 1,
                'examination_id' => 1,
                'slug' => 'Lorem ipsum dolor sit amet',
                'is_active' => 1,
                'created_by' => 1,
                'create_date' => '2024-03-24 05:51:17',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
