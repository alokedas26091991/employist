<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExaminationsFixture
 */
class ExaminationsFixture extends TestFixture
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
                'slug' => 'Lorem ipsum dolor sit amet',
                'examination_category_id' => 1,
                'subject_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'each_question_mark' => 1,
                'negative_marks' => 1,
                'time_alloted' => 1,
                'examination_date' => '2024-03-24',
                'examination_end_date' => '2024-03-24',
                'start_time' => '05:50:01',
                'end_time' => '05:50:01',
                'allow_time' => 1,
                'one_time' => 1,
                'is_paid' => 1,
                'is_active' => 1,
                'price' => 1,
                'photo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'create_date' => '2024-03-24 05:50:01',
                'created_by' => 1,
                'last_update_date' => '2024-03-24 05:50:01',
                'last_update_by' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
