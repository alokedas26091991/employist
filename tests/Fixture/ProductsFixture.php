<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'no_mock_test' => 1,
                'valid_days' => 1,
                'price' => 1,
                'created_by' => 1,
                'create_date' => '2024-05-04 16:01:26',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
