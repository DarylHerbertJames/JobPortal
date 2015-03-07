<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employers'), ['controller' => 'Employers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employer'), ['controller' => 'Employers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobseekers'), ['controller' => 'Jobseekers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jobseeker'), ['controller' => 'Jobseekers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
            <h6 class="subheader"><?= __('Role') ?></h6>
            <p><?= h($user->role) ?></p>
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($user->first_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($user->last_name) ?></p>
            <h6 class="subheader"><?= __('Reset Pass Token') ?></h6>
            <p><?= h($user->reset_pass_token) ?></p>
            <h6 class="subheader"><?= __('Avatar') ?></h6>
            <p><?= h($user->avatar) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Reset Pass Created') ?></h6>
            <p><?= h($user->reset_pass_created) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($user->modified) ?></p>
            <h6 class="subheader"><?= __('Last Login') ?></h6>
            <p><?= h($user->last_login) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Applications') ?></h4>
    <?php if (!empty($user->applications)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Job Id') ?></th>
            <th><?= __('Message') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->applications as $applications): ?>
        <tr>
            <td><?= h($applications->id) ?></td>
            <td><?= h($applications->user_id) ?></td>
            <td><?= h($applications->job_id) ?></td>
            <td><?= h($applications->message) ?></td>
            <td><?= h($applications->created) ?></td>
            <td><?= h($applications->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $applications->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applications', 'action' => 'delete', $applications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applications->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Employers') ?></h4>
    <?php if (!empty($user->employers)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Mobile') ?></th>
            <th><?= __('Jobs Count') ?></th>
            <th><?= __('Subscriptiion') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->employers as $employers): ?>
        <tr>
            <td><?= h($employers->id) ?></td>
            <td><?= h($employers->user_id) ?></td>
            <td><?= h($employers->mobile) ?></td>
            <td><?= h($employers->jobs_count) ?></td>
            <td><?= h($employers->subscriptiion) ?></td>
            <td><?= h($employers->created) ?></td>
            <td><?= h($employers->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Employers', 'action' => 'view', $employers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Employers', 'action' => 'edit', $employers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employers', 'action' => 'delete', $employers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Jobs') ?></h4>
    <?php if (!empty($user->jobs)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Category Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('Salary') ?></th>
            <th><?= __('Applications Count') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->jobs as $jobs): ?>
        <tr>
            <td><?= h($jobs->id) ?></td>
            <td><?= h($jobs->user_id) ?></td>
            <td><?= h($jobs->category_id) ?></td>
            <td><?= h($jobs->title) ?></td>
            <td><?= h($jobs->description) ?></td>
            <td><?= h($jobs->type) ?></td>
            <td><?= h($jobs->salary) ?></td>
            <td><?= h($jobs->applications_count) ?></td>
            <td><?= h($jobs->created) ?></td>
            <td><?= h($jobs->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Jobseekers') ?></h4>
    <?php if (!empty($user->jobseekers)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Age') ?></th>
            <th><?= __('Gender') ?></th>
            <th><?= __('Mobile') ?></th>
            <th><?= __('About') ?></th>
            <th><?= __('Education') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->jobseekers as $jobseekers): ?>
        <tr>
            <td><?= h($jobseekers->id) ?></td>
            <td><?= h($jobseekers->user_id) ?></td>
            <td><?= h($jobseekers->age) ?></td>
            <td><?= h($jobseekers->gender) ?></td>
            <td><?= h($jobseekers->mobile) ?></td>
            <td><?= h($jobseekers->about) ?></td>
            <td><?= h($jobseekers->education) ?></td>
            <td><?= h($jobseekers->created) ?></td>
            <td><?= h($jobseekers->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Jobseekers', 'action' => 'view', $jobseekers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Jobseekers', 'action' => 'edit', $jobseekers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobseekers', 'action' => 'delete', $jobseekers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobseekers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
