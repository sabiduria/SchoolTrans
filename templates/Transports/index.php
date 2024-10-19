<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Transport> $transports
 */
?>
<div class="transports index content mt-3">
    <?= $this->Html->link(__('New Transport'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Transports') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('assignment_id') ?></th>
                    <th><?= $this->Paginator->sort('dependant_id') ?></th>
                    <th><?= $this->Paginator->sort('Home - School') ?></th>
                    <th><?= $this->Paginator->sort('School - Home') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transports as $transport): ?>
                <tr>
                    <td><?= $this->Number->format($transport->id) ?></td>
                    <td><?= $transport->hasValue('assignment') ? $this->Html->link($transport->assignment->id, ['controller' => 'Assignments', 'action' => 'view', $transport->assignment->id]) : '' ?></td>
                    <td><?= $transport->hasValue('dependant') ? $this->Html->link($transport->dependant->id, ['controller' => 'Dependants', 'action' => 'view', $transport->dependant->id]) : '' ?></td>
                    <td class="text-center">
                        <?= date('H:i', strtotime($transport->pickupathome)) ?> <i data-feather="arrow-right-circle"></i> <?= date('H:i', strtotime($transport->dropoffatschool)) ?>
                    </td>
                    <td class="text-center">
                        <?= date('H:i', strtotime($transport->pickupschool)) ?> <i data-feather="arrow-right-circle"></i> <?= date('H:i', strtotime($transport->dropoffathome)) ?>
                    </td>
                    <td>
                        <?= $transport->dropoffathome<>'' ? '<i class="text-success" data-feather="check-circle"></i>' : '<i class="text-warning" data-feather="loader"></i>' ?>
                    </td>
                    <td><?= date('Y-m-d H:i:s', strtotime($transport->created)) ?></td>
                    <td><?= h($transport->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transport->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transport->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transport->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $transport->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
