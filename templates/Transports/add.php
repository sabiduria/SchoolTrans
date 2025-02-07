<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport $transport
 * @var \Cake\Collection\CollectionInterface|string[] $assignments
 * @var \Cake\Collection\CollectionInterface|string[] $dependants
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Transports'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="transports form content">
            <?= $this->Form->create($transport) ?>
            <fieldset>
                <legend><?= __('Add Transport') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('assignment_id', ['options' => $assignments, 'class'=>'form-select']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('dependant_id', ['options' => $dependants, 'class'=>'form-select']); ?>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $this->Form->control('pickupathome', ['type'=>'time', 'empty' => true, 'class'=>'form-control', 'label'=>'Pick up at Home']); ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form">
                            <?= $this->Form->control('dropoffatschool', ['type'=>'time', 'empty' => true, 'class'=>'form-control', 'label'=>'Drop off at school']); ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $this->Form->control('pickupschool', ['type'=>'time', 'empty' => true, 'class'=>'form-control', 'label'=>'Pick up at school']); ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $this->Form->control('dropoffathome', ['type'=>'time', 'empty' => true, 'class'=>'form-control', 'label'=>'Drop off at home']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('pickuplocation', ['class'=>'form-control', 'label'=>'Pick up location']); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('dropofflocation', ['class'=>'form-control', 'label'=>'Drop off location']); ?>
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
