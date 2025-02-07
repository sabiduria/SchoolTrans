<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var string[]|\Cake\Collection\CollectionInterface $dependants
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <div class="form-group">
                <legend><?= __('Add Payment') ?></legend>
                <?php
                echo $this->Form->control('dependant_id', ['options' => $dependants, 'class'=>'form-select']);
                echo $this->Form->control('reference', ['class'=>'form-control']);
                echo $this->Form->control('startdate', ['empty' => true, 'class'=>'form-control', 'label'=>'Start Date']);
                echo $this->Form->control('duedate', ['empty' => true, 'class'=>'form-control', 'label'=>'Due Date']);
                echo $this->Form->control('amount', ['class'=>'form-control']);
                echo $this->Form->control('createdby', ['class'=>'form-control']);
                echo $this->Form->control('modifiedby', ['class'=>'form-control']);
                ?>
            </div>
            <div class="form-group">
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
