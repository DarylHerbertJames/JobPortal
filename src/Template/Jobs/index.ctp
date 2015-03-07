<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="jobs index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('category_id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th><?= $this->Paginator->sort('salary') ?></th>
            <th><?= $this->Paginator->sort('applications_count') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($jobs as $job): ?>
        <tr>
            <td><?= $this->Number->format($job->id) ?></td>
            <td>
                <?= $job->has('user') ? $this->Html->link($job->user->id, ['controller' => 'Users', 'action' => 'view', $job->user->id]) : '' ?>
            </td>
            <td>
                <?= $job->has('category') ? $this->Html->link($job->category->name, ['controller' => 'Categories', 'action' => 'view', $job->category->id]) : '' ?>
            </td>
            <td><?= h($job->title) ?></td>
            <td><?= h($job->type) ?></td>
            <td><?= h($job->salary) ?></td>
            <td><?= $this->Number->format($job->applications_count) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
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
