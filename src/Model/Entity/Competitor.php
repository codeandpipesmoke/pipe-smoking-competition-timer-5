<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Competitor Entity
 *
 * @property int $id
 * @property string $competition_id
 * @property string $user_id
 * @property int $competingclub_id
 * @property int $table_id
 * @property string|null $description
 * @property bool $paid
 * @property \Cake\I18n\Time $time_achieved
 * @property int $score
 * @property bool $visible
 * @property int $pos
 * @property int $dinner_count
 * @property int $number_of_companions
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Competition $competition
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Competingclub $competingclub
 * @property \App\Model\Entity\Table $table
 */
class Competitor extends Entity
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
        'competition_id' => true,
        'user_id' => true,
        'competingclub_id' => true,
        'table_id' => true,
        'description' => true,
        'paid' => true,
        'time_achieved' => true,
        'score' => true,
        'visible' => true,
        'pos' => true,
        'dinner_count' => true,
        'number_of_companions' => true,
        'created' => true,
        'modified' => true,
        'competition' => true,
        'user' => true,
        'competingclub' => true,
        'table' => true,
    ];
}
