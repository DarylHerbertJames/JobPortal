<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobseekersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobseekersTable Test Case
 */
class JobseekersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Jobseekers' => 'app.jobseekers',
        'Users' => 'app.users',
        'Applications' => 'app.applications',
        'Employers' => 'app.employers',
        'Jobs' => 'app.jobs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Jobseekers') ? [] : ['className' => 'App\Model\Table\JobseekersTable'];
        $this->Jobseekers = TableRegistry::get('Jobseekers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jobseekers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
