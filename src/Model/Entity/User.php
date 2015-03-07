<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'role' => true,
        'first_name' => true,
        'last_name' => true,
        'reset_pass_token' => true,
        'reset_pass_created' => true,
        'avatar' => true,
        'last_login' => true,
        'applications' => true,
        'employers' => true,
        'jobs' => true,
        'jobseekers' => true,
    ];
}
