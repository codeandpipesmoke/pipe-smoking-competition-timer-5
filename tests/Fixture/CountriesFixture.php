<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * CountriesFixture
 */
class CountriesFixture extends TestFixture
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
                'continent' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'iso' => 'Lorem ip',
                'visible' => 1,
                'pos' => 1,
                'last_used' => '2025-09-19 16:32:41',
                'user_count' => 1,
                'club_count' => 1,
                'competition_count' => 1,
            ],
        ];
        parent::init();
    }
}
