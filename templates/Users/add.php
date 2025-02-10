<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $profiles
 */
?>
<div class="row mt-3">
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <div class="row my-1">
                <div class="form-group">
                    <?= $this->Form->control('profile_id', ['options' => $profiles, 'class'=>'form-control', 'label' => 'Profile']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('name', ['class'=>'form-control', 'label' => 'Nom Complet']); ?>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('phone', ['class'=>'form-control', 'label' => 'Telephone']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('email', ['class'=>'form-control', 'label' => 'Email']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('username', ['class'=>'form-control', 'label' => 'Username']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('password', ['class'=>'form-control', 'label' => 'Mot de Passe']); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
