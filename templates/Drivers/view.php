<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */

use App\Controller\GeneralController;

?>
<div class="row">
    <div class="column column-80">
        <div class="drivers view content">
            <h3><?= h($driver->name) ?></h3>
            <h6>Telephone : <?= h($driver->phone) ?></h6>
            <h6>Email : <?= h($driver->email) ?></h6>
            <hr>

            <div class="related">
                <h4><?= __('Assignations') ?></h4>
                <?php if (!empty($driver->assignments)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Vehicule') ?></th>
                            <th><?= __('Heure debut') ?></th>
                            <th><?= __('Heure fin') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Par') ?></th>
                            <th class="text-end"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->assignments as $assignment) : ?>
                        <tr>
                            <td><?= h($assignment->id) ?></td>
                            <td><?= GeneralController::getVehicleDetails($assignment->vehicle_id) ?></td>
                            <td><?= date('H:i', strtotime($assignment->starthour)) ?></td>
                            <td><?= date('H:i', strtotime($assignment->endhour)) ?></td>
                            <td><?= h($assignment->created) ?></td>
                            <td><?= h($assignment->createdby) ?></td>
                            <td class="text-end">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Assignments', 'action' => 'view', $assignment->id], ['class'=>'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Assignments', 'action' => 'edit', $assignment->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Assignments', 'action' => 'delete', $assignment->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
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
