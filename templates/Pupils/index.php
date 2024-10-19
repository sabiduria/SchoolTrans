<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pupil> $pupils
 */
?>
<div class="pupils index content mt-3">
    <?= $this->Html->link(__('New Pupil'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Pupils') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('reference') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('actived') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pupils as $pupil): ?>
                <tr>
                    <td><?= $this->Number->format($pupil->id) ?></td>
                    <td><?= h($pupil->reference) ?></td>
                    <td><?= h($pupil->name) ?></td>
                    <td><?= h($pupil->lastname) ?></td>
                    <td><?= h($pupil->phone) ?></td>
                    <td><?= h($pupil->email) ?></td>
                    <td><?= h($pupil->actived) ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($pupil->created)) ?></td>
                    <td><?= h($pupil->createdby) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pupil->id], ['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pupil->id], ['class'=>'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pupil->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $pupil->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
