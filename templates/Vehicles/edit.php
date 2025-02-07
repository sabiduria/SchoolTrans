<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row mt-3">
    <div class="column column-80">
        <div class="vehicles form content">
            <?= $this->Form->create($vehicle) ?>
            <fieldset>
                <legend><?= __('Editer Vehicule') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('plate', ['class'=>'form-control', 'label' => 'Plaque d\'immatriculation']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('mark', ['class'=>'form-control', 'label' => 'Marque']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('nbplaces', ['class'=>'form-control', 'label'=>'Nombre de place']); ?>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
