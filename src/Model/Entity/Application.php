<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity.
 */
class Application extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'job_id' => true,
        'message' => true,
        'user' => true,
        'job' => true,
    ];
}
