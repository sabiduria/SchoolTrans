<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
?>
<div class="payments index content">
    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Payments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dependant_id') ?></th>
                    <th><?= $this->Paginator->sort('reference') ?></th>
                    <th><?= $this->Paginator->sort('startdate') ?></th>
                    <th><?= $this->Paginator->sort('duedate') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('modifiedby') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= $this->Number->format($payment->id) ?></td>
                    <td><?= $payment->hasValue('dependant') ? $this->Html->link($payment->dependant->id, ['controller' => 'Dependants', 'action' => 'view', $payment->dependant->id]) : '' ?></td>
                    <td><?= h($payment->reference) ?></td>
                    <td><?= h($payment->startdate) ?></td>
                    <td><?= h($payment->duedate) ?></td>
                    <td><?= $payment->amount === null ? '' : $this->Number->format($payment->amount) ?></td>
                    <td><?= h($payment->created) ?></td>
                    <td><?= h($payment->modified) ?></td>
                    <td><?= h($payment->createdby) ?></td>
                    <td><?= h($payment->modifiedby) ?></td>
                    <td><?= h($payment->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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