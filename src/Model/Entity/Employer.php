<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employer Entity.
 */
class Employer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'mobile' => true,
        'jobs_count' => true,
        'subscriptiion' => true,
        'user' => true,
    ];
}
