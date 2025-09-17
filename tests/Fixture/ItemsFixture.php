<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * ItemsFixture
 */
class ItemsFixture extends TestFixture
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
                'itemgroup_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'start' => '2025-09-17',
                'end' => '2025-09-17',
                'valid' => 1,
                'created' => '2025-09-17 09:58:34',
                'modified' => '2025-09-17 09:58:34',
            ],
        ];
        parent::init();
    }
}
