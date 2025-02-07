<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependant $dependant
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $pupils
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dependant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dependant->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dependants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="dependants form content">
            <?= $this->Form->create($dependant) ?>
            <fieldset>
                <legend><?= __('Edit Dependant') ?></legend>
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
