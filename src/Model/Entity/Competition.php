<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Competition Entity
 *
 * @property string $id
 * @property string $name
 * @property \Cake\I18n\DateTime|null $description
 * @property \Cake\I18n\DateTime $registration_deadline
 * @property bool $registration_closed
 * @property string $tobacco
 * @property string $tobacco_quantity
 * @property string $pipe
 * @property int|null $competition_fee
 * @property bool|null $lunch_is_included_in_the_competition_fee
 * @property \Cake\I18n\DateTime|null $email_has_been_sent
 * @property \Cake\I18n\Time|null $start_of_pipe_filling
 * @property \Cake\I18n\Time|null $start_of_pipe_lighting
 * @property bool|null $the_pipe_filling_must_be_repeated
 * @property bool|null $closed_competition
 * @property \Cake\I18n\Time|null $closing_time
 * @property int $maximum_number_of_clubs
 * @property int $maximum_number_of_competitors
 * @property int $maximum_number_of_tables
 * @property int $table_count
 * @property int $competingclub_count
 * @property int $competitor_count
 * @property bool $visible
 * @property int $pos
 * @property \Cake\I18n\DateTime $created
 * @property int $modified
 *
 * @property \App\Model\Entity\Competingclub[] $competingclubs
 * @property \App\Model\Entity\Competitor[] $competitors
 * @property \App\Model\Entity\Table[] $tables
 */
class Competition extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'description' => true,
        'registration_deadline' => true,
        'registration_closed' => true,
        'place' => true,
        'google_maps_url' => true,
        'tobacco' => true,
        'tobacco_quantity' => true,
        'pipe' => true,
        'competition_fee' => true,
        'lunch_is_included_in_the_competition_fee' => true,
        'email_has_been_sent' => true,
        'start_of_pipe_filling' => true,
        'start_of_pipe_lighting' => true,
        'the_pipe_filling_must_be_repeated' => true,
        'closed_competition' => true,
        'closing_time' => true,
        'maximum_number_of_clubs' => true,
        'maximum_number_of_competitors' => true,
        'maximum_number_of_tables' => true,
        'table_count' => true,
        'competingclub_count' => true,
        'competitor_count' => true,
        'visible' => true,
        'pos' => true,
        'created' => true,
        'modified' => true,
        'competingclubs' => true,
        'competitors' => true,
        'tables' => true,
    ];
}
