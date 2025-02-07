<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependant $dependant
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $pupils
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Dependants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="dependants form content">
            <?= $this->Form->create($dependant) ?>
            <fieldset>
                <legend><?= __('Add Dependant') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('user_id', ['options' => $users, 'class'=>'form-select']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('pupil_id', ['options' => $pupils, 'class'=>'form-select']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('amount', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->checkbox('exempted', ['class'=>'form-check-input']); ?>
                    <?= $this->Form->label('exempted', 'Exempted to pay ?') ?>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
