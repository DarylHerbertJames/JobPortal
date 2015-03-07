<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity.
 */
class Job extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'category_id' => true,
        'title' => true,
        'description' => true,
        'type' => true,
        'salary' => true,
        'applications_count' => true,
        'user' => true,
        'category' => true,
        'applications' => true,
    ];
}
