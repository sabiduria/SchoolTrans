<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="payments view content">
            <h3><?= h($payment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dependant') ?></th>
                    <td><?= $payment->hasValue('dependant') ? $this->Html->link($payment->dependant->id, ['controller' => 'Dependants', 'action' => 'view', $payment->dependant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Reference') ?></th>
                    <td><?= h($payment->reference) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($payment->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($payment->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $payment->amount === null ? '' : $this->Number->format($payment->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Startdate') ?></th>
                    <td><?= h($payment->startdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duedate') ?></th>
                    <td><?= h($payment->duedate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payment->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $payment->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
