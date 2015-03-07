<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Employer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="employers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('mobile') ?></th>
            <th><?= $this->Paginator->sort('jobs_count') ?></th>
            <th><?= $this->Paginator->sort('subscriptiion') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($employers as $employer): ?>
        <tr>
            <td><?= $this->Number->format($employer->id) ?></td>
            <td>
                <?= $employer->has('user') ? $this->Html->link($employer->user->id, ['controller' => 'Users', 'action' => 'view', $employer->user->id]) : '' ?>
            </td>
            <td><?= h($employer->mobile) ?></td>
            <td><?= $this->Number->format($employer->jobs_count) ?></td>
            <td><?= h($employer->subscriptiion) ?></td>
            <td><?= h($employer->created) ?></td>
            <td><?= h($employer->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $employer->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employer->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employer->id)]) ?>
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
