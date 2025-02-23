<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pupil> $pupils
 */

use App\Controller\GeneralController;

?>
<div class="pupils index content mt-3">
    <?= $this->Html->link(__('Ajouter'), ['action' => 'add2'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Abonnés') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Reference') ?></th>
                    <th><?= $this->Paginator->sort('Nom & Postnom') ?></th>
                    <th><?= $this->Paginator->sort('Prenom') ?></th>
                    <th><?= $this->Paginator->sort('Telephone') ?></th>
                    <th><?= $this->Paginator->sort('Parent') ?></th>
                    <th class="text-end"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pupils as $pupil): ?>
                <tr>
                    <td><?= $this->Number->format($pupil->id) ?></td>
                    <td><?= h($pupil->reference) ?></td>
                    <td><?= h($pupil->name) ?></td>
                    <td><?= h($pupil->lastname) ?></td>
                    <td><?= GeneralController::getParentPhone($pupil->id) ?></td>
                    <td><?= GeneralController::getParentName($pupil->id) ?></td>
                    <td class="text-end">
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $pupil->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $pupil->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $pupil->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
