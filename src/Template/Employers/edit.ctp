<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="employers form large-10 medium-9 columns">
    <?= $this->Form->create($employer); ?>
    <fieldset>
        <legend><?= __('Edit Employer') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('mobile');
            echo $this->Form->input('jobs_count');
            echo $this->Form->input('subscriptiion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
