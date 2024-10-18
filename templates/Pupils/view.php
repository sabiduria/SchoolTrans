<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pupil $pupil
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pupil'), ['action' => 'edit', $pupil->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pupil'), ['action' => 'delete', $pupil->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pupil->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pupils'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pupil'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pupils view content">
            <h3><?= h($pupil->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Reference') ?></th>
                    <td><?= h($pupil->reference) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($pupil->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($pupil->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($pupil->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($pupil->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($pupil->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($pupil->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pupil->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($pupil->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($pupil->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actived') ?></th>
                    <td><?= $pupil->actived ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $pupil->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Dependants') ?></h4>
                <?php if (!empty($pupil->dependants)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Pupil Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Exempted') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pupil->dependants as $dependant) : ?>
                        <tr>
                            <td><?= h($dependant->id) ?></td>
                            <td><?= h($dependant->user_id) ?></td>
                            <td><?= h($dependant->pupil_id) ?></td>
                            <td><?= h($dependant->amount) ?></td>
                            <td><?= h($dependant->exempted) ?></td>
                            <td><?= h($dependant->created) ?></td>
                            <td><?= h($dependant->modified) ?></td>
                            <td><?= h($dependant->createdby) ?></td>
                            <td><?= h($dependant->modifiedby) ?></td>
                            <td><?= h($dependant->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Dependants', 'action' => 'view', $dependant->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Dependants', 'action' => 'edit', $dependant->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dependants', 'action' => 'delete', $dependant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dependant->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>