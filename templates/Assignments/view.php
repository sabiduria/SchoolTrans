<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */

use App\Controller\GeneralController;

?>
<div class="row">
    <div class="column column-80">
        <div class="assignments view content">
            <h3><?= h($assignment->driver->name) ?></h3>
            <p>
                Vehicule : <?= GeneralController::getVehicleDetails($assignment->vehicle_id) ?> <br>
                Heure debut : <?= date('H:i', strtotime($assignment->starthour)) ?> <br>
                Heure fin : <?= date('H:i', strtotime($assignment->endhour)) ?>
            </p>
            <hr>

            <div class="related">
                <h4><?= __('Transports') ?></h4>
                <?php if (!empty($assignment->transports)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th><?= h('id') ?></th>
                            <th><?= h('Eleves') ?></th>
                            <th><?= h('Maison - Ecole') ?></th>
                            <th><?= h('Ecole - Maison') ?></th>
                            <th><?= h('Status') ?></th>
                            <th><?= h('Date') ?></th>
                            <th><?= h('Par') ?></th>
                            <th class="text-end"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <?php foreach ($assignment->transports as $transport) : ?>
                            <tr>
                                <td><?= $this->Number->format($transport->id) ?></td>
                                <td><?= GeneralController::getDependentName($transport->dependant_id) ?></td>
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
                                    <?= $this->Html->link(__('Editer'), ['controller' => 'transports', 'action' => 'edit', $transport->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'transports', 'action' => 'delete', $transport->id], ['class'=>'btn btn-danger btn-sm','confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
