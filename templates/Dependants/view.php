<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependant $dependant
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Dependant'), ['action' => 'edit', $dependant->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Dependant'), ['action' => 'delete', $dependant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dependant->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dependants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Dependant'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="dependants view content">
            <h3><?= h($dependant->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $dependant->hasValue('user') ? $this->Html->link($dependant->user->name, ['controller' => 'Users', 'action' => 'view', $dependant->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pupil') ?></th>
                    <td><?= $dependant->hasValue('pupil') ? $this->Html->link($dependant->pupil->name, ['controller' => 'Pupils', 'action' => 'view', $dependant->pupil->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($dependant->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($dependant->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dependant->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $dependant->amount === null ? '' : $this->Number->format($dependant->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($dependant->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($dependant->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Exempted') ?></th>
                    <td><?= $dependant->exempted ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $dependant->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($dependant->payments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dependant Id') ?></th>
                            <th><?= __('Reference') ?></th>
                            <th><?= __('Startdate') ?></th>
                            <th><?= __('Duedate') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dependant->payments as $payment) : ?>
                        <tr>
                            <td><?= h($payment->id) ?></td>
                            <td><?= h($payment->dependant_id) ?></td>
                            <td><?= h($payment->reference) ?></td>
                            <td><?= h($payment->startdate) ?></td>
                            <td><?= h($payment->duedate) ?></td>
                            <td><?= h($payment->amount) ?></td>
                            <td><?= h($payment->created) ?></td>
                            <td><?= h($payment->modified) ?></td>
                            <td><?= h($payment->createdby) ?></td>
                            <td><?= h($payment->modifiedby) ?></td>
                            <td><?= h($payment->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Transports') ?></h4>
                <?php if (!empty($dependant->transports)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Assignment Id') ?></th>
                            <th><?= __('Dependant Id') ?></th>
                            <th><?= __('Pickupathome') ?></th>
                            <th><?= __('Dropoffatschool') ?></th>
                            <th><?= __('Pickupschool') ?></th>
                            <th><?= __('Dropoffathome') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dependant->transports as $transport) : ?>
                        <tr>
                            <td><?= h($transport->id) ?></td>
                            <td><?= h($transport->assignment_id) ?></td>
                            <td><?= h($transport->dependant_id) ?></td>
                            <td><?= h($transport->pickupathome) ?></td>
                            <td><?= h($transport->dropoffatschool) ?></td>
                            <td><?= h($transport->pickupschool) ?></td>
                            <td><?= h($transport->dropoffathome) ?></td>
                            <td><?= h($transport->created) ?></td>
                            <td><?= h($transport->modified) ?></td>
                            <td><?= h($transport->createdby) ?></td>
                            <td><?= h($transport->modifiedby) ?></td>
                            <td><?= h($transport->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Transports', 'action' => 'view', $transport->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Transports', 'action' => 'edit', $transport->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transports', 'action' => 'delete', $transport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id)]) ?>
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