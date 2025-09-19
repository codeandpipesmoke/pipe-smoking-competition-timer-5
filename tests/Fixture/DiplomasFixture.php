<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * DiplomasFixture
 */
class DiplomasFixture extends TestFixture
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
                'competiting_id' => 'Lorem ipsum dolor sit amet',
                'user_id' => 'Lorem ipsum dolor sit amet',
                'template_id' => 1,
                'competitingclub_id' => 1,
                'visible' => 1,
                'pos' => 1,
                'created' => '2025-09-19 16:32:41',
                'modified' => '2025-09-19 16:32:41',
            ],
        ];
        parent::init();
    }
}
