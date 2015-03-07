<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Jobseeker'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="jobseekers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('age') ?></th>
            <th><?= $this->Paginator->sort('gender') ?></th>
            <th><?= $this->Paginator->sort('mobile') ?></th>
            <th><?= $this->Paginator->sort('education') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($jobseekers as $jobseeker): ?>
        <tr>
            <td><?= $this->Number->format($jobseeker->id) ?></td>
            <td>
                <?= $jobseeker->has('user') ? $this->Html->link($jobseeker->user->id, ['controller' => 'Users', 'action' => 'view', $jobseeker->user->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($jobseeker->age) ?></td>
            <td><?= h($jobseeker->gender) ?></td>
            <td><?= h($jobseeker->mobile) ?></td>
            <td><?= h($jobseeker->education) ?></td>
            <td><?= h($jobseeker->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $jobseeker->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobseeker->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobseeker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobseeker->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
