<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModulesFixture
 */
class ModulesFixture extends TestFixture
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
                'caption' => 'Lorem ipsum dolor sit amet',
                'access_type' => 1,
                'order_by' => 1,
                'icon' => 'Lorem ipsum dolor sit amet',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
