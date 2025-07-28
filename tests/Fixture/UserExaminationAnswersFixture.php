<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserExaminationAnswersFixture
 */
class UserExaminationAnswersFixture extends TestFixture
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
                'user_examination_id' => 1,
                'examination_mock_test_question_id' => 1,
                'question_id' => 1,
                'answer_id' => 1,
                'is_correct' => 1,
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
