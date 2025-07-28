<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CartsFixture
 */
class CartsFixture extends TestFixture
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
                'invoice_no' => 'Lorem ipsum dolor sit amet',
                'gross_amount' => 1,
                'net_amount' => 1,
                'tax_amount' => 1,
                'discount_amount' => 1,
                'is_active' => 1,
                'create_date' => '2024-05-12 12:16:34',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
