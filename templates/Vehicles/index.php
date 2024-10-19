<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehicle> $vehicles
 */
?>
<div class="vehicles index content mt-3">
    <?= $this->Html->link(__('New Vehicle'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Vehicles') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('plate') ?></th>
                    <th><?= $this->Paginator->sort('mark') ?></th>
                    <th><?= $this->Paginator->sort('nbplaces') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?= $this->Number->format($vehicle->id) ?></td>
                    <td><?= h($vehicle->plate) ?></td>
                    <td><?= h($vehicle->mark) ?></td>
                    <td><?= $vehicle->nbplaces === null ? '' : $this->Number->format($vehicle->nbplaces) ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($vehicle->created)) ?></td>
                    <td><?= h($vehicle->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
