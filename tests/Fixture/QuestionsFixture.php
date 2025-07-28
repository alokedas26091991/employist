<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionsFixture
 */
class QuestionsFixture extends TestFixture
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
                'question' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'create_date' => '2024-03-24 05:52:19',
                'created_by' => 1,
                'supervisor' => 1,
                'reviewer' => 1,
                'data_entry' => 1,
                'super_reviewer' => 1,
                'status' => 1,
                'last_update_date' => '2024-03-24 05:52:19',
                'last_updated_by' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
