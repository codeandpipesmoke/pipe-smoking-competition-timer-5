<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Competingclub Entity
 *
 * @property int $id
 * @property int $country_id
 * @property string $competition_id
 * @property int $club_id
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\Time $time_achieved
 * @property int $score
 * @property bool $excluded
 * @property string $excluded_description
 * @property bool $visible
 * @property int $pos
 * @property int $competitor_count
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Competition $competition
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Competitor[] $competitors
 */
class Competingclub extends Entity
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
        'country_id' => true,
        'competition_id' => true,
        'club_id' => true,
        'name' => true,
        'description' => true,
        'time_achieved' => true,
        'score' => true,
        'excluded' => true,
        'excluded_description' => true,
        'visible' => true,
        'pos' => true,
        'competitor_count' => true,
        'created' => true,
        'modified' => true,
        'country' => true,
        'competition' => true,
        'club' => true,
        'competitors' => true,
    ];
}
