<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExaminationCategoriesFixture
 */
class ExaminationCategoriesFixture extends TestFixture
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
                'parent_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'is_active' => 1,
                'meta_title' => 'Lorem ipsum dolor sit amet',
                'meta_keywords' => 'Lorem ipsum dolor sit amet',
                'meta_desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'robots' => 'Lorem ipsum dolor sit amet',
                'canonical' => 'Lorem ipsum dolor sit amet',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
