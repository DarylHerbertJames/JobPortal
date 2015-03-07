<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Employer'), ['action' => 'edit', $employer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employer'), ['action' => 'delete', $employer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="employers view large-10 medium-9 columns">
    <h2><?= h($employer->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $employer->has('user') ? $this->Html->link($employer->user->id, ['controller' => 'Users', 'action' => 'view', $employer->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Mobile') ?></h6>
            <p><?= h($employer->mobile) ?></p>
            <h6 class="subheader"><?= __('Subscriptiion') ?></h6>
            <p><?= h($employer->subscriptiion) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($employer->id) ?></p>
            <h6 class="subheader"><?= __('Jobs Count') ?></h6>
            <p><?= $this->Number->format($employer->jobs_count) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($employer->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($employer->modified) ?></p>
        </div>
    </div>
</div>
