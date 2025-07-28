<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServicesFixture
 */
class ServicesFixture extends TestFixture
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
                'image' => 'Lorem ipsum dolor sit amet',
                'align' => 1,
                'title_1' => 'Lorem ipsum dolor sit amet',
                'title_2' => 'Lorem ipsum dolor sit amet',
                'title_3' => 'Lorem ipsum dolor sit amet',
                'title_4' => 'Lorem ipsum dolor sit amet',
                'title_5' => 'Lorem ipsum dolor sit amet',
                'title_6' => 'Lorem ipsum dolor sit amet',
                'title_7' => 'Lorem ipsum dolor sit amet',
                'title_8' => 'Lorem ipsum dolor sit amet',
                'title_9' => 'Lorem ipsum dolor sit amet',
                'title_10' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
