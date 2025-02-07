<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 * @var \Cake\Collection\CollectionInterface|string[] $drivers
 * @var \Cake\Collection\CollectionInterface|string[] $vehicles
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Assignments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="assignments form content">
            <?= $this->Form->create($assignment) ?>
            <fieldset>
                <legend><?= __('Add Assignment') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('driver_id', ['options' => $drivers, 'class'=>'form-select']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('vehicle_id', ['options' => $vehicles, 'class'=>'form-select']); ?>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('starthour', ['empty' => true, 'class'=>'form-control', 'type'=>'time', 'label'=>'Start Hour']); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('endhour', ['empty' => true, 'class'=>'form-control', 'type'=>'time', 'label'=>'End Hour']); ?>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
