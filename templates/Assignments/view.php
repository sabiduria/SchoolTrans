<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="assignments view content">
            <h3><?= h($assignment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Driver') ?></th>
                    <td><?= $assignment->hasValue('driver') ? $this->Html->link($assignment->driver->name, ['controller' => 'Drivers', 'action' => 'view', $assignment->driver->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle') ?></th>
                    <td><?= $assignment->hasValue('vehicle') ? $this->Html->link($assignment->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $assignment->vehicle->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($assignment->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($assignment->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($assignment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Starthour') ?></th>
                    <td><?= h($assignment->starthour) ?></td>
                </tr>
                <tr>
                    <th><?= __('Endhour') ?></th>
                    <td><?= h($assignment->endhour) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($assignment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($assignment->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $assignment->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Transports') ?></h4>
                <?php if (!empty($assignment->transports)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Assignment Id') ?></th>
                            <th><?= __('Dependant Id') ?></th>
                            <th><?= __('Pickupathome') ?></th>
                            <th><?= __('Dropoffatschool') ?></th>
                            <th><?= __('Pickupschool') ?></th>
                            <th><?= __('Dropoffathome') ?></th>
                            <th><?= __('Pickuplocation') ?></th>
                            <th><?= __('Dropofflocation') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($assignment->transports as $transport) : ?>
                        <tr>
                            <td><?= h($transport->id) ?></td>
                            <td><?= h($transport->assignment_id) ?></td>
                            <td><?= h($transport->dependant_id) ?></td>
                            <td><?= h($transport->pickupathome) ?></td>
                            <td><?= h($transport->dropoffatschool) ?></td>
                            <td><?= h($transport->pickupschool) ?></td>
                            <td><?= h($transport->dropoffathome) ?></td>
                            <td><?= h($transport->pickuplocation) ?></td>
                            <td><?= h($transport->dropofflocation) ?></td>
                            <td><?= h($transport->created) ?></td>
                            <td><?= h($transport->modified) ?></td>
                            <td><?= h($transport->createdby) ?></td>
                            <td><?= h($transport->modifiedby) ?></td>
                            <td><?= h($transport->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Transports', 'action' => 'view', $transport->id], ['class'=>'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Transports', 'action' => 'edit', $transport->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Transports', 'action' => 'delete', $transport->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
