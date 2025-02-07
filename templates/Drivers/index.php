<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Driver> $drivers
 */
?>
<div class="drivers index content mt-3">
    <?= $this->Html->link(__('Ajouter'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Chauffeurs') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Nom Complet') ?></th>
                    <th><?= $this->Paginator->sort('Telephone') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th><?= $this->Paginator->sort('Par') ?></th>
                    <th class="text-end"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($drivers as $driver): ?>
                <tr>
                    <td><?= $this->Number->format($driver->id) ?></td>
                    <td><?= h($driver->name) ?></td>
                    <td><?= h($driver->phone) ?></td>
                    <td><?= h($driver->email) ?></td>
                    <td><?= h($driver->created) ?></td>
                    <td><?= h($driver->createdby) ?></td>
                    <td class="text-end">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $driver->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $driver->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $driver->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
