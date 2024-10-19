<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dependant> $dependants
 */
?>
<div class="dependants index content mt-3">
    <?= $this->Html->link(__('New Dependant'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Dependants') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('pupil_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('exempted') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dependants as $dependant): ?>
                <tr>
                    <td><?= $this->Number->format($dependant->id) ?></td>
                    <td><?= $dependant->hasValue('user') ? $this->Html->link($dependant->user->name, ['controller' => 'Users', 'action' => 'view', $dependant->user->id]) : '' ?></td>
                    <td><?= $dependant->hasValue('pupil') ? $this->Html->link($dependant->pupil->name, ['controller' => 'Pupils', 'action' => 'view', $dependant->pupil->id]) : '' ?></td>
                    <td><?= $dependant->amount === null ? '' : $this->Number->format($dependant->amount) ?></td>
                    <td><?= h($dependant->exempted) ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($dependant->created)) ?></td>
                    <td><?= h($dependant->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $dependant->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dependant->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dependant->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $dependant->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
