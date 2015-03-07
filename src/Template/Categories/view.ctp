<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="categories view large-10 medium-9 columns">
    <h2><?= h($category->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($category->name) ?></p>
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($category->description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($category->id) ?></p>
            <h6 class="subheader"><?= __('Parent Id') ?></h6>
            <p><?= $this->Number->format($category->parent_id) ?></p>
            <h6 class="subheader"><?= __('Lft') ?></h6>
            <p><?= $this->Number->format($category->lft) ?></p>
            <h6 class="subheader"><?= __('Rght') ?></h6>
            <p><?= $this->Number->format($category->rght) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($category->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($category->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Jobs') ?></h4>
    <?php if (!empty($category->jobs)): ?>
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
        <?php foreach ($category->jobs as $jobs): ?>
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
