<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Admin;


use App\Controller\Admin\ClubsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Controller\Admin\ClubsController Test Case
 *
 * @link \App\Controller\Admin\ClubsController
 */
class ClubsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Clubs',
        'app.Countries',
        'app.Competingclubs',
        'app.Users',
    ];

    /**
     * Test index method
     *
     * @return void
     * @link \App\Controller\Admin\ClubsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @link \App\Controller\Admin\ClubsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @link \App\Controller\Admin\ClubsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @link \App\Controller\Admin\ClubsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @link \App\Controller\Admin\ClubsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
