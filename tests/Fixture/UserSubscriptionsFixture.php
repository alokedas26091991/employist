<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserSubscriptionsFixture
 */
class UserSubscriptionsFixture extends TestFixture
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
                'subscription_id' => 1,
                'start_date' => '2024-03-24',
                'end_date' => '2024-03-24',
                'create_date' => '2024-03-24',
                'is_active' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
