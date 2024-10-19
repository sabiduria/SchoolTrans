<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Driver> $drivers
 */
?>
<div class="drivers index content mt-3">
    <?= $this->Html->link(__('New Driver'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Drivers') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($drivers as $driver): ?>
                <tr>
                    <td><?= $this->Number->format($driver->id) ?></td>
                    <td><?= h($driver->name) ?></td>
                    <td><?= h($driver->phone) ?></td>
                    <td><?= h($driver->email) ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($driver->created)) ?></td>
                    <td><?= h($driver->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $driver->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $driver->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $driver->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
