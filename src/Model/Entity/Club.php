<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Club Entity
 *
 * @property int $id
 * @property int $country_id
 * @property int $chairman_id
 * @property string $name
 * @property string|null $description
 * @property string|null $email
 * @property string|null $web
 * @property bool $visible
 * @property int $pos
 * @property int $user_count
 * @property int $competingclub_count
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Competingclub[] $competingclubs
 * @property \App\Model\Entity\User[] $users
 */
class Club extends Entity
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
        'chairman_id' => true,
        'name' => true,
        'description' => true,
        'email' => true,
        'web' => true,
        'visible' => true,
        'pos' => true,
        'user_count' => true,
        'competingclub_count' => true,
        'created' => true,
        'modified' => true,
        'country' => true,
        'competingclubs' => true,
        'users' => true,
    ];
}
