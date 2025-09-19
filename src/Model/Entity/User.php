<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * User Entity
 *
 * @property string $id
 * @property int $country_id
 * @property int $lang_id
 * @property int $club_id
 * @property string|null $username
 * @property string|null $email
 * @property string $password
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $description
 * @property string|null $token
 * @property \Cake\I18n\DateTime|null $token_expires
 * @property string|null $api_token
 * @property \Cake\I18n\DateTime|null $activation_date
 * @property string|null $secret
 * @property bool|null $secret_verified
 * @property \Cake\I18n\DateTime|null $tos_date
 * @property bool $active
 * @property bool $is_superuser
 * @property string|null $role
 * @property bool $enabled
 * @property string|null $additional_data
 * @property \Cake\I18n\DateTime|null $last_login
 * @property \Cake\I18n\DateTime|null $lockout_time
 * @property bool $visible
 * @property int $pos
 * @property int $competitor_count
 * @property int $table_count
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Lang $lang
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Competitor[] $competitors
 * @property \App\Model\Entity\Diploma[] $diplomas
 * @property \App\Model\Entity\Setup[] $setups
 */
class User extends Entity
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
        'lang_id' => true,
        'club_id' => true,
        'username' => true,
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'description' => true,
        'token' => true,
        'token_expires' => true,
        'api_token' => true,
        'activation_date' => true,
        'secret' => true,
        'secret_verified' => true,
        'tos_date' => true,
        'active' => true,
        'is_superuser' => true,
        'role' => true,
        'enabled' => true,
        'additional_data' => true,
        'last_login' => true,
        'lockout_time' => true,
        'visible' => true,
        'pos' => true,
        'competitor_count' => true,
        'table_count' => true,
        'created' => true,
        'modified' => true,
        'country' => true,
        'lang' => true,
        'club' => true,
        'competitors' => true,
        'diplomas' => true,
        'setups' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
        'token',
    ];
}
