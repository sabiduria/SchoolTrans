<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport $transport
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="transports view content">
            <h3><?= h($transport->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Assignment') ?></th>
                    <td><?= $transport->hasValue('assignment') ? $this->Html->link($transport->assignment->id, ['controller' => 'Assignments', 'action' => 'view', $transport->assignment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Dependant') ?></th>
                    <td><?= $transport->hasValue('dependant') ? $this->Html->link($transport->dependant->id, ['controller' => 'Dependants', 'action' => 'view', $transport->dependant->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pickuplocation') ?></th>
                    <td><?= h($transport->pickuplocation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dropofflocation') ?></th>
                    <td><?= h($transport->dropofflocation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($transport->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($transport->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transport->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pickupathome') ?></th>
                    <td><?= h($transport->pickupathome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dropoffatschool') ?></th>
                    <td><?= h($transport->dropoffatschool) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pickupschool') ?></th>
                    <td><?= h($transport->pickupschool) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dropoffathome') ?></th>
                    <td><?= h($transport->dropoffathome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($transport->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($transport->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $transport->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
