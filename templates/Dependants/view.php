<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependant $dependant
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="dependants view content">
            <h3><?= h($dependant->id) ?></h3>
            <table class="table table-bordered">
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
                    <table class="table table-bordered">
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
                            <th class="text-end"><?= __('Actions') ?></th>
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
                            <td class="text-end">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Payments', 'action' => 'view', $payment->id], ['class'=>'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Payments', 'action' => 'edit', $payment->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Payments', 'action' => 'delete', $payment->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Assignment Id') ?></th>
                            <th><?= __('Dependant Id') ?></th>
                            <th><?= __('Pickupathome') ?></th>
                            <th><?= __('Dropoffatschool') ?></th>
                            <th><?= __('Pickupschool') ?></th>
                            <th><?= __('Dropoffathome') ?></th>
                            <th><?= __('Pickuplocation') ?></th>
                            <th><?= __('Dropofflocation') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="text-end"><?= __('Actions') ?></th>
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
                            <td><?= h($transport->pickuplocation) ?></td>
                            <td><?= h($transport->dropofflocation) ?></td>
                            <td><?= h($transport->created) ?></td>
                            <td><?= h($transport->modified) ?></td>
                            <td><?= h($transport->createdby) ?></td>
                            <td><?= h($transport->modifiedby) ?></td>
                            <td><?= h($transport->deleted) ?></td>
                            <td class="text-end">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Transports', 'action' => 'view', $transport->id], ['class'=>'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Transports', 'action' => 'edit', $transport->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Transports', 'action' => 'delete', $transport->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
