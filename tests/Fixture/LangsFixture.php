<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * LangsFixture
 */
class LangsFixture extends TestFixture
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
                'english_name' => 'Lorem ipsum dolor sit amet',
                'lang' => 'Lore',
                'user_count' => 1,
                'club_count' => 1,
                'visible' => 1,
                'pos' => 1,
            ],
        ];
        parent::init();
    }
}
