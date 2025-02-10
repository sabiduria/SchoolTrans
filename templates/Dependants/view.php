<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependant $dependant
 */

use App\Controller\GeneralController;

?>
<div class="row">
    <div class="column column-80">
        <div class="dependants view content">
            <h3><?= GeneralController::getDependentName($dependant->id) ?></h3>
            <table class="table table-bordered">
                <tr>
                    <th><?= __('Parent') ?></th>
                    <td><?= $dependant->hasValue('user') ? $this->Html->link($dependant->user->name, ['controller' => 'Users', 'action' => 'view', $dependant->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Abonnement Mensuel') ?></th>
                    <td><?= $dependant->amount === null ? '' : $this->Number->format($dependant->amount) ?> $</td>
                </tr>
                <tr>
                    <th><?= __('Exempted') ?></th>
                    <td><?= $dependant->exempted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <hr>

            <div class="related">
                <h4><?= __('Paiements') ?></h4>
                <?php if (!empty($dependant->payments)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Reference') ?></th>
                            <th><?= __('Date debut') ?></th>
                            <th><?= __('Date fin') ?></th>
                            <th><?= __('Montant') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Par') ?></th>
                            <th class="text-end"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dependant->payments as $payment) : ?>
                        <tr>
                            <td><?= h($payment->id) ?></td>
                            <td><?= h($payment->reference) ?></td>
                            <td><?= h($payment->startdate) ?></td>
                            <td><?= h($payment->duedate) ?></td>
                            <td><?= h($payment->amount) ?> $</td>
                            <td><?= h($payment->created) ?></td>
                            <td><?= h($payment->createdby) ?></td>
                            <td class="text-end">
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
                <h4><?= __('Transports') ?></h4>
                <?php if (!empty($dependant->transports)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= h('id') ?></th>
                            <th><?= h('Maison - Ecole') ?></th>
                            <th><?= h('Ecole - Maison') ?></th>
                            <th><?= h('Status') ?></th>
                            <th><?= h('Date') ?></th>
                            <th><?= h('Par') ?></th>
                            <th class="text-end"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dependant->transports as $transport) : ?>
                        <tr>
                            <td><?= $this->Number->format($transport->id) ?></td>
                            <td class="text-center">
                                <?= date('H:i', strtotime($transport->pickupathome)) ?> <i data-feather="arrow-right-circle"></i> <?= date('H:i', strtotime($transport->dropoffatschool)) ?>
                            </td>
                            <td class="text-center">
                                <?= date('H:i', strtotime($transport->pickupschool)) ?> <i data-feather="arrow-right-circle"></i> <?= date('H:i', strtotime($transport->dropoffathome)) ?>
                            </td>
                            <td>
                                <?= $transport->dropoffathome<>'' ? '<i class="text-success" data-feather="check-circle"></i>' : '<i class="text-warning" data-feather="loader"></i>' ?>
                            </td>
                            <td><?= h($transport->created) ?></td>
                            <td><?= h($transport->createdby) ?></td>
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
