<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

use App\Controller\GeneralController;

?>
<div class="row">
    <div class="column column-80">
        <div class="users view content">
            <div class="row">
                <div class="col-sm-8">
                    <h3><?= h($user->name) ?></h3>
                </div>
                <div class="col-sm-4">
                    <table class="table">
                        <tr>
                            <th><?= __('Profile') ?></th>
                            <td><?= $user->hasValue('profile') ? $this->Html->link($user->profile->name, ['controller' => 'Profiles', 'action' => 'view', $user->profile->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone') ?></th>
                            <td><?= h($user->phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>

            <div class="related">
                <div class="text-end">
                    <?= $this->Html->link(__('Ajouter un dependant'), ['controller' => 'pupils', 'action' => 'add', $user->id], ['class' => 'btn btn-success btn-sm']) ?>
                </div>
                <h4><?= __('Dependants') ?></h4>
                <?php if (!empty($user->dependants)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nom') ?></th>
                            <th><?= __('Abonnement') ?></th>
                            <th><?= __('Exempté') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Par') ?></th>
                            <th class="text-end"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->dependants as $dependant) : ?>
                        <tr>
                            <td><?= h($dependant->id) ?></td>
                            <td><?= GeneralController::getDependentName($dependant->id) ?></td>
                            <td><?= h($dependant->amount) ?> $</td>
                            <td><?= $dependant->exempted == 1 ? 'Oui' : 'Non' ?></td>
                            <td><?= h($dependant->created) ?></td>
                            <td><?= h($dependant->createdby) ?></td>
                            <td class="text-end">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Dependants', 'action' => 'view', $dependant->id], ['class'=>'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Dependants', 'action' => 'edit', $dependant->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Dependants', 'action' => 'delete', $dependant->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
