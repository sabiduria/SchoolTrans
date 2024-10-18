<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Assignment> $assignments
 */
?>
<div class="assignments index content">
    <?= $this->Html->link(__('New Assignment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Assignments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('driver_id') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                    <th><?= $this->Paginator->sort('starthour') ?></th>
                    <th><?= $this->Paginator->sort('endhour') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('modifiedby') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assignments as $assignment): ?>
                <tr>
                    <td><?= $this->Number->format($assignment->id) ?></td>
                    <td><?= $assignment->hasValue('driver') ? $this->Html->link($assignment->driver->name, ['controller' => 'Drivers', 'action' => 'view', $assignment->driver->id]) : '' ?></td>
                    <td><?= $assignment->hasValue('vehicle') ? $this->Html->link($assignment->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $assignment->vehicle->id]) : '' ?></td>
                    <td><?= h($assignment->starthour) ?></td>
                    <td><?= h($assignment->endhour) ?></td>
                    <td><?= h($assignment->created) ?></td>
                    <td><?= h($assignment->modified) ?></td>
                    <td><?= h($assignment->createdby) ?></td>
                    <td><?= h($assignment->modifiedby) ?></td>
                    <td><?= h($assignment->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>