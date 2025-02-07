<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Drivers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="drivers form content">
            <?= $this->Form->create($driver) ?>
            <fieldset>
                <legend><?= __('Add Driver') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('name', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('phone', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('email', ['class'=>'form-control']); ?>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
