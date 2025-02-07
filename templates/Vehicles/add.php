<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="vehicles form content">
            <?= $this->Form->create($vehicle) ?>
            <fieldset>
                <legend><?= __('Add Vehicle') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('plate', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('mark', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('nbplaces', ['class'=>'form-control', 'label'=>'Number of place']); ?>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
