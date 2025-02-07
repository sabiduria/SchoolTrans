<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Profile') ?></th>
                    <td><?= $user->hasValue('profile') ? $this->Html->link($user->profile->name, ['controller' => 'Profiles', 'action' => 'view', $user->profile->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($user->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($user->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($user->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $user->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Dependants') ?></h4>
                <?php if (!empty($user->dependants)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
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
                            <th class="text-end"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->dependants as $dependant) : ?>
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
