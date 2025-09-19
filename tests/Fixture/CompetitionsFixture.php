<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * CompetitionsFixture
 */
class CompetitionsFixture extends TestFixture
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
                'id' => '69971e2a-9d56-49ee-a453-f874b9becaa8',
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 1758314135,
                'registration_deadline' => '2025-09-19 20:35:35',
                'registration_closed' => 1,
                'tobacco' => 'Lorem ipsum dolor sit amet',
                'tobacco_quantity' => 1.5,
                'pipe' => 'Lorem ipsum dolor sit amet',
                'competition_fee' => 1,
                'lunch_is_included_in_the_competition_fee' => 1,
                'email_has_been_sent' => '2025-09-19 20:35:35',
                'start_of_pipe_filling' => '20:35:35',
                'start_of_pipe_lighting' => '20:35:35',
                'the_pipe_filling_must_be_repeated' => 1,
                'closed_competition' => 1,
                'closing_time' => '20:35:35',
                'maximum_number_of_clubs' => 1,
                'maximum_number_of_competitors' => 1,
                'maximum_number_of_tables' => 1,
                'table_count' => 1,
                'competingclub_count' => 1,
                'competitor_count' => 1,
                'visible' => 1,
                'pos' => 1,
                'created' => '2025-09-19 20:35:35',
                'modified' => 1,
            ],
        ];
        parent::init();
    }
}
