<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Driver'), ['action' => 'edit', $driver->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Driver'), ['action' => 'delete', $driver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Drivers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Driver'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="drivers view content">
            <h3><?= h($driver->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($driver->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($driver->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($driver->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($driver->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($driver->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($driver->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($driver->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($driver->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $driver->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Assignments') ?></h4>
                <?php if (!empty($driver->assignments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Vehicle Id') ?></th>
                            <th><?= __('Starthour') ?></th>
                            <th><?= __('Endhour') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->assignments as $assignment) : ?>
                        <tr>
                            <td><?= h($assignment->id) ?></td>
                            <td><?= h($assignment->driver_id) ?></td>
                            <td><?= h($assignment->vehicle_id) ?></td>
                            <td><?= h($assignment->starthour) ?></td>
                            <td><?= h($assignment->endhour) ?></td>
                            <td><?= h($assignment->created) ?></td>
                            <td><?= h($assignment->modified) ?></td>
                            <td><?= h($assignment->createdby) ?></td>
                            <td><?= h($assignment->modifiedby) ?></td>
                            <td><?= h($assignment->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $assignment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $assignment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
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