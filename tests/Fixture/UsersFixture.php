<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'user_type' => 1,
                'department' => 'Lorem ipsum dolor sit amet',
                'designation' => 'Lorem ipsum dolor sit amet',
                'gender' => 'Lorem ip',
                'phone_no' => 'Lorem ipsum dolor ',
                'image' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'last_login_date' => '2024-03-24 05:47:49',
                'create_date' => '2024-03-24 05:47:49',
                'is_active' => 1,
                'is_deleted' => 1,
                'dob' => '2024-03-24',
                'school' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
