<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>
<div class="row mt-3">
    <div class="column column-80">
        <div class="drivers form content">
            <?= $this->Form->create($driver) ?>
            <fieldset>
                <legend><?= __('Editer Chauffeur') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('name', ['class'=>'form-control', 'label' => 'Nom Complet']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('phone', ['class'=>'form-control', 'label' => 'Telephone']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('email', ['class'=>'form-control', 'label' => 'Email']); ?>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
