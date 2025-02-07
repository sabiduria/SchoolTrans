<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehicle> $vehicles
 */
?>
<div class="vehicles index content mt-3">
    <?= $this->Html->link(__('Ajouter'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Vehicules') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Plaque') ?></th>
                    <th><?= $this->Paginator->sort('Marque') ?></th>
                    <th><?= $this->Paginator->sort('Places') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th class="text-end"><?= __('Actions') ?></th>
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
                    <td class="text-end">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $vehicle->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $vehicle->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $vehicle->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
