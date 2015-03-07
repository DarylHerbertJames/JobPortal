<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Jobseeker'), ['action' => 'edit', $jobseeker->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Jobseeker'), ['action' => 'delete', $jobseeker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobseeker->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobseekers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jobseeker'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="jobseekers view large-10 medium-9 columns">
    <h2><?= h($jobseeker->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $jobseeker->has('user') ? $this->Html->link($jobseeker->user->id, ['controller' => 'Users', 'action' => 'view', $jobseeker->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Gender') ?></h6>
            <p><?= h($jobseeker->gender) ?></p>
            <h6 class="subheader"><?= __('Mobile') ?></h6>
            <p><?= h($jobseeker->mobile) ?></p>
            <h6 class="subheader"><?= __('Education') ?></h6>
            <p><?= h($jobseeker->education) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($jobseeker->id) ?></p>
            <h6 class="subheader"><?= __('Age') ?></h6>
            <p><?= $this->Number->format($jobseeker->age) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($jobseeker->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($jobseeker->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('About') ?></h6>
            <?= $this->Text->autoParagraph(h($jobseeker->about)); ?>

        </div>
    </div>
</div>
