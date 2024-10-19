<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
?>
<div class="payments index content mt-3">
    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Payments') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dependant_id') ?></th>
                    <th><?= $this->Paginator->sort('reference') ?></th>
                    <th><?= $this->Paginator->sort('startdate') ?></th>
                    <th><?= $this->Paginator->sort('duedate') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= $this->Number->format($payment->id) ?></td>
                    <td><?= $payment->hasValue('dependant') ? $this->Html->link($payment->dependant->id, ['controller' => 'Dependants', 'action' => 'view', $payment->dependant->id]) : '' ?></td>
                    <td><?= h($payment->reference) ?></td>
                    <td><?= date('Y-m-d', strtotime($payment->startdate)) ?></td>
                    <td><?= date('Y-m-d', strtotime($payment->duedate)) ?></td>
                    <td><?= $payment->amount === null ? '' : $this->Number->format($payment->amount) ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($payment->created)) ?></td>
                    <td><?= h($payment->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
