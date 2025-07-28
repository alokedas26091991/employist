<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserProductDetailsFixture
 */
class UserProductDetailsFixture extends TestFixture
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
                'user_id' => 1,
                'user_product_id' => 1,
                'examination_id' => 1,
                'mock_test_id' => 1,
                'create_date' => '2024-05-06 01:47:47',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
