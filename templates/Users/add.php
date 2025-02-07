<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $profiles
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <div class="form-group">
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('profile_id', ['options' => $profiles, 'class'=>'form-control']);
                    echo $this->Form->control('name', ['class'=>'form-control']);
                    echo $this->Form->control('phone', ['class'=>'form-control']);
                    echo $this->Form->control('email', ['class'=>'form-control']);
                    echo $this->Form->control('username', ['class'=>'form-control']);
                    echo $this->Form->control('password', ['class'=>'form-control']);
                    echo $this->Form->control('createdby', ['class'=>'form-control']);
                    echo $this->Form->control('modifiedby', ['class'=>'form-control']);
                ?>
            </div>
            <div class="form-group">
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
