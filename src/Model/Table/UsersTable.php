<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Applications', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Employers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Jobseekers', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->requirePresence('role', 'create')
            ->notEmpty('role')
            ->allowEmpty('first_name')
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name')
            ->allowEmpty('reset_pass_token')
            ->add('reset_pass_created', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('reset_pass_created')
            ->allowEmpty('avatar')
            ->add('last_login', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('last_login');

        return $validator;
    }

    /**
     * Update the user last_login field
     * @param $id user id
     * @return \Cake\Database\StatementInterface
     */
    public function updateLastLogin($id)
    {
        $query = $this->query();
        return $query->update()
            ->set(['last_login' => date('Y-m-d H:i:s')])
            ->where(['id' => $id])
            ->execute();
    }
    /**
     * Method to allow users to re  request a reset password
     *
     * @param $data
     * @return bool
     */
    public function forgot_password($data)
    {
        // Find the user
        if ( !$user = $this->__findUserByEmail($data['email']) ) {
            return false;
        }

        // Generate the token
        $data = $this->__generatePasswordToken($data);
        $user = $this->patchEntity($user, $data);

        // If saving is success + email has been sent
        if ($this->save($user) AND $this->__sendForgotPasswordEmail($user['id'])) {
            return true;
        }
        return false;
    }

    /**
     * Reset the user password
     *
     * @param $user
     * @param $data
     * @return bool
     */
    public function reset_password($user, $data)
    {
        // User is empty and not data posted
        if (empty($user) OR empty($data)) {
            return false;
        }
        // Build the entity for updating
        $data['reset_password_token']   = NULL;
        $data['reset_password_created'] = NULL;
        $entity = $this->patchEntity($user, $data);

        if ($this->save($entity)) {
            return true;
        }
        return false;
    }

    /**
     * Find user via token and validate is still valid
     *
     * @param Query $query
     * @param $options
     * @return mixed
     * @internal param $token
     */
    public function findToken(Query $query, $options)
    {
        $user =  $query->where(['reset_password_token' => $options['token']])
            ->first();
        // If we have result, check if token is still valid
        if (!empty($user) AND $this->__validToken($user['reset_password_created'])) {
            return $user;
        }
        return false;
    }

    /**
     * Check if token is still valid - 24hrs expiration time
     *
     * @param $token_created_at
     * @return bool
     */
    protected function __validToken($token_created_at) {
        $expired    = strtotime($token_created_at) + 86400;
        $time       = strtotime("now");
        // Check if current time is less than the expired time
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    protected function __generatePasswordToken($data)
    {
        if (empty($data)) {
            return false;
        }

        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }

        $data['reset_password_token'] = $hash;
        $data['reset_password_created'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function __sendForgotPasswordEmail($id = null)
    {
        // Find the user
        if (!$user = $this->__findUserById($id)) {
            return false;
        }

        // Initialize email
        $email = new Email('default');
        // Generate email
        $resetUrl = 'http://privatecleaners.co.uk/reset-password/'. $user['reset_password_token'];

        $message = "<p>Hello {$user['first_name']},</p>";
        $message .= "<p>You have recently requested a password change for your privatecleaners.co.uk account.
Please click the url below to change your password.</p>";
        $message .= "<p><br/>{$resetUrl}</p>";

        $email->from(['info@privatecleaners.co.uk' => 'PrivateCleaners'])
            ->to($user['email'])
            ->subject('Password Reset Request')
            ->emailFormat('html')
            ->send($message);

        return true;
    }

    /**
     * Find a user using email address
     *
     * @param $email
     * @return mixed
     */
    protected function __findUserByEmail($email)
    {
        $user = $this->find()->where([
            'email' => $email
        ])->first();

        return $user;
    }

    /**
     * Find the user using the primary id
     *
     * @param $id
     * @return \Cake\Datasource\EntityInterface|mixed
     */
    protected function __findUserById($id)
    {
        $user = $this->get($id);
        return $user;
    }
    /**
     * Find current logged in user information
     * @param Query $query
     * @param array $options
     * @return \Cake\Datasource\EntityInterface|mixed
     */
    public function findInfo(Query $query, array $options) {
        return $query->where(
            [
                'Users.id' => $options['id'],
                'role' => 'cleaner'
            ])->contain(['Cleaners', 'Availabilities'])->first();
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
