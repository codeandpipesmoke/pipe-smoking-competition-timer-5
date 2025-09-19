<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Country Entity
 *
 * @property int $id
 * @property string|null $continent
 * @property string $name
 * @property string $iso
 * @property bool $visible
 * @property int $pos
 * @property \Cake\I18n\DateTime|null $last_used
 * @property int $user_count
 * @property int $club_count
 * @property int $competition_count
 *
 * @property \App\Model\Entity\Club[] $clubs
 * @property \App\Model\Entity\Competingclub[] $competingclubs
 * @property \App\Model\Entity\User[] $users
 */
class Country extends Entity
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
        'continent' => true,
        'name' => true,
        'iso' => true,
        'visible' => true,
        'pos' => true,
        'last_used' => true,
        'user_count' => true,
        'club_count' => true,
        'competition_count' => true,
        'clubs' => true,
        'competingclubs' => true,
        'users' => true,
    ];
}
