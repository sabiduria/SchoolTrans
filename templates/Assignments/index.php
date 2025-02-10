<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Assignment> $assignments
 */

use App\Controller\GeneralController;

?>
<div class="assignments index content mt-3">
    <?= $this->Html->link(__('Ajouter'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Assignations') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Chauffeur') ?></th>
                    <th><?= $this->Paginator->sort('Vehicule') ?></th>
                    <th><?= $this->Paginator->sort('Heure debut') ?></th>
                    <th><?= $this->Paginator->sort('Heure fin') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th><?= $this->Paginator->sort('Par') ?></th>
                    <th class="text-end"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assignments as $assignment): ?>
                <tr>
                    <td><?= $this->Number->format($assignment->id) ?></td>
                    <td><?= $assignment->driver->name ?></td>
                    <td><?= GeneralController::getVehicleDetails($assignment->vehicle_id) ?></td>
                    <td><?= date('H:i', strtotime($assignment->starthour)) ?></td>
                    <td><?= date('H:i', strtotime($assignment->endhour)) ?></td>
                    <td><?= h($assignment->created) ?></td>
                    <td><?= h($assignment->createdby) ?></td>
                    <td class="text-end">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $assignment->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $assignment->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $assignment->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
