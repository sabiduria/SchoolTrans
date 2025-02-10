<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pupil $pupil
 */
$exempted = ['1' => 'Oui', '0' => 'Non']
?>
<div class="row mt-3">
    <div class="column column-80">
        <div class="pupils form content">
            <?= $this->Form->create($pupil) ?>
            <div class="row my-2">
                <div class="form-group">
                    <?= $this->Form->control('parent_id', ['options' => $parents, 'class'=>'form-select select2', 'label' => 'Parent']); ?>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('name', ['class'=>'form-control', 'label' => 'Nom & Postnom']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('lastname', ['class'=>'form-control', 'label' => 'Prenom']); ?>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('phone', ['class'=>'form-control', 'label' => 'Telephone']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('email', ['class'=>'form-control', 'label' => 'Email']); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('amount', ['class'=>'form-control', 'label' => 'Frais à payer']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('exempted', ['options' => $exempted, 'class'=>'form-select', 'label' => 'Exempté ?']); ?>
                </div>
            </div>
            <div class="form-group">
                <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
