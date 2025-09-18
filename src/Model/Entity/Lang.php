<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Lang Entity
 *
 * @property int $id
 * @property string $name
 * @property string $english_name
 * @property string $lang
 * @property int $user_count
 * @property int $club_count
 * @property bool $visible
 * @property int $pos
 *
 * @property \App\Model\Entity\Club[] $clubs
 * @property \App\Model\Entity\User[] $users
 */
class Lang extends Entity
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
        'english_name' => true,
        'lang' => true,
        'user_count' => true,
        'club_count' => true,
        'visible' => true,
        'pos' => true,
        'clubs' => true,
        'users' => true,
    ];
}
