<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Table Entity
 *
 * @property int $id
 * @property string $competition_id
 * @property int $tablejudge_id
 * @property string $name
 * @property string|null $description
 * @property int $chairs
 * @property bool $visible
 * @property int $pos
 * @property int $competitor_count
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Competition $competition
 * @property \App\Model\Entity\Competitor[] $competitors
 */
class Table extends Entity
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
        'tablejudge_id' => true,
        'name' => true,
        'description' => true,
        'chairs' => true,
        'visible' => true,
        'pos' => true,
        'competitor_count' => true,
        'created' => true,
        'modified' => true,
        'competition' => true,
        'competitors' => true,
    ];
}
