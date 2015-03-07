<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jobseeker Entity.
 */
class Jobseeker extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'age' => true,
        'gender' => true,
        'mobile' => true,
        'about' => true,
        'education' => true,
        'user' => true,
    ];
}
