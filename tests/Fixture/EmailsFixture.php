<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmailsFixture
 */
class EmailsFixture extends TestFixture
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
                'subject' => 'Lorem ipsum dolor sit amet',
                'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'send_from' => 'Lorem ipsum dolor sit amet',
                'send_from_name' => 'Lorem ipsum dolor sit amet',
                'type' => 1,
                'created_by' => 1,
                'create_date' => '2024-03-24 05:49:22',
                'last_update_date' => '2024-03-24 05:49:22',
                'last_updated_by' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
