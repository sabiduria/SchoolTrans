<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="profiles view content">
            <h3><?= h($profile->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($profile->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($profile->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($profile->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($profile->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($profile->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($profile->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $profile->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($profile->users)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Profile Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($profile->users as $user) : ?>
                        <tr>
                            <td><?= h($user->id) ?></td>
                            <td><?= h($user->profile_id) ?></td>
                            <td><?= h($user->name) ?></td>
                            <td><?= h($user->phone) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->password) ?></td>
                            <td><?= h($user->created) ?></td>
                            <td><?= h($user->modified) ?></td>
                            <td><?= h($user->createdby) ?></td>
                            <td><?= h($user->modifiedby) ?></td>
                            <td><?= h($user->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class'=>'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class'=>'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
