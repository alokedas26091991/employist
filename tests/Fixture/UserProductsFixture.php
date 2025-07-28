<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserProductsFixture
 */
class UserProductsFixture extends TestFixture
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
                'invoice_id' => 1,
                'product_id' => 1,
                'exam_id' => 1,
                'start_date' => '2024-05-12',
                'end_date' => '2024-05-12',
                'create_date' => '2024-05-12 19:42:05',
                'created_by' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
