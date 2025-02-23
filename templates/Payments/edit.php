<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $dependants
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <div class="row my-1">
                <div class="form-group">
                    <?= $this->Form->control('dependant_id', ['options' => $dependants, 'class'=>'form-select select2', 'label' => 'Abonné']); ?>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('startdate', ['empty' => true, 'class'=>'form-control', 'label'=>'Date debut']); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->control('duedate', ['empty' => true, 'class'=>'form-control', 'label'=>'Date fin']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('amount', ['class'=>'form-control', 'label' => 'Montant']); ?>
                </div>
            </div>
            <div class="form-group">
                <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
