<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */

use App\Controller\GeneralController;

?>
<div class="payments index content mt-3">
    <?= $this->Html->link(__('Ajouter'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Paiements') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Abonnés') ?></th>
                    <th><?= $this->Paginator->sort('Reference') ?></th>
                    <th><?= $this->Paginator->sort('Date debut') ?></th>
                    <th><?= $this->Paginator->sort('Date fin') ?></th>
                    <th><?= $this->Paginator->sort('Montant') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th><?= $this->Paginator->sort('Par') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= $this->Number->format($payment->id) ?></td>
                    <td><?= GeneralController::getDependentName($payment->dependant->id) ?></td>
                    <td><?= h($payment->reference) ?></td>
                    <td><?= date('Y-m-d', strtotime($payment->startdate)) ?></td>
                    <td><?= date('Y-m-d', strtotime($payment->duedate)) ?></td>
                    <td><?= $payment->amount === null ? '' : $this->Number->format($payment->amount) ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($payment->created)) ?></td>
                    <td><?= h($payment->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $payment->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $payment->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
