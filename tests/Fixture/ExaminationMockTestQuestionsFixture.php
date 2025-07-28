<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExaminationMockTestQuestionsFixture
 */
class ExaminationMockTestQuestionsFixture extends TestFixture
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
                'mock_test_id' => 1,
                'examination_category_id' => 1,
                'question_id' => 1,
                'examination_id' => 1,
                'create_date' => '2024-04-27 14:46:10',
                'created_by' => 1,
                'last_update_date' => '2024-04-27 14:46:10',
                'last_updated_by' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
