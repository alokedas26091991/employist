<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserExaminationsFixture
 */
class UserExaminationsFixture extends TestFixture
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
                'examination_id' => 1,
                'examination_category_id' => 1,
                'mock_test_id' => 1,
                'user_id' => 1,
                'time_taken' => 1,
                'marks_obtained' => 1,
                'attempt_date' => '2024-03-24 05:57:50',
                'is_last_attempted' => 1,
                'last_attempted_question_id' => 1,
                'is_start' => 1,
                'is_completed' => 1,
                'is_allow' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
