<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Assignment> $assignments
 */
?>
<div class="assignments index content mt-3">
    <?= $this->Html->link(__('New Assignment'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Assignments') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('driver_id') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                    <th><?= $this->Paginator->sort('starthour') ?></th>
                    <th><?= $this->Paginator->sort('endhour') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
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
                    <td><?= date('Y-m-d H:i:s', strtotime($assignment->created)) ?></td>
                    <td><?= h($assignment->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignment->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignment->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
