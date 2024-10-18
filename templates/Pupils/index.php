<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pupil> $pupils
 */
?>
<div class="pupils index content">
    <?= $this->Html->link(__('New Pupil'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pupils') ?></h3>
    <div class="table-responsive">
        <table>
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
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('modifiedby') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
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
                    <td><?= h($pupil->created) ?></td>
                    <td><?= h($pupil->modified) ?></td>
                    <td><?= h($pupil->createdby) ?></td>
                    <td><?= h($pupil->modifiedby) ?></td>
                    <td><?= h($pupil->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pupil->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pupil->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pupil->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pupil->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>