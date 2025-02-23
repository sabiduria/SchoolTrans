<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport $transport
 * @var \Cake\Collection\CollectionInterface|string[] $assignments
 * @var \Cake\Collection\CollectionInterface|string[] $dependants
 */
?>
<div class="row mt-3">
    <div class="column column-80">
        <div class="transports form content">
            <?= $this->Form->create($transport) ?>
            <fieldset>
                <legend><?= __('Courses') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('assignment_id', ['options' => $assignments, 'class'=>'form-select', 'label' => 'Chauffeur']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('dependant_id', ['options' => $dependants, 'class'=>'form-select', 'label' => 'Abonné']); ?>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $this->Form->control('pickupathome', ['type'=>'datetime', 'empty' => true, 'class'=>'form-control', 'label'=>'Sortie Maison']); ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form">
                            <?= $this->Form->control('dropoffatschool', ['type'=>'datetime', 'empty' => true, 'class'=>'form-control', 'label'=>'Arrivée Ecole']); ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $this->Form->control('pickupschool', ['type'=>'datetime', 'empty' => true, 'class'=>'form-control', 'label'=>'Sortie Ecole']); ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $this->Form->control('dropoffathome', ['type'=>'datetime', 'empty' => true, 'class'=>'form-control', 'label'=>'Arrivée Maison']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('pickuplocation', ['class'=>'form-control', 'label'=>'Pick up location (GPS)']); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('dropofflocation', ['class'=>'form-control', 'label'=>'Drop off location (GPS)']); ?>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
