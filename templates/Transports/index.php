<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Transport> $transports
 */
?>
<div class="transports index content">
    <?= $this->Html->link(__('New Transport'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transports') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('assignment_id') ?></th>
                    <th><?= $this->Paginator->sort('dependant_id') ?></th>
                    <th><?= $this->Paginator->sort('pickupathome') ?></th>
                    <th><?= $this->Paginator->sort('dropoffatschool') ?></th>
                    <th><?= $this->Paginator->sort('pickupschool') ?></th>
                    <th><?= $this->Paginator->sort('dropoffathome') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('modifiedby') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transports as $transport): ?>
                <tr>
                    <td><?= $this->Number->format($transport->id) ?></td>
                    <td><?= $transport->hasValue('assignment') ? $this->Html->link($transport->assignment->id, ['controller' => 'Assignments', 'action' => 'view', $transport->assignment->id]) : '' ?></td>
                    <td><?= $transport->hasValue('dependant') ? $this->Html->link($transport->dependant->id, ['controller' => 'Dependants', 'action' => 'view', $transport->dependant->id]) : '' ?></td>
                    <td><?= h($transport->pickupathome) ?></td>
                    <td><?= h($transport->dropoffatschool) ?></td>
                    <td><?= h($transport->pickupschool) ?></td>
                    <td><?= h($transport->dropoffathome) ?></td>
                    <td><?= h($transport->created) ?></td>
                    <td><?= h($transport->modified) ?></td>
                    <td><?= h($transport->createdby) ?></td>
                    <td><?= h($transport->modifiedby) ?></td>
                    <td><?= h($transport->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transport->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transport->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id)]) ?>
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