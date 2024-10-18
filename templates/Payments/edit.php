<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var string[]|\Cake\Collection\CollectionInterface $dependants
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <fieldset>
                <legend><?= __('Edit Payment') ?></legend>
                <?php
                    echo $this->Form->control('dependant_id', ['options' => $dependants]);
                    echo $this->Form->control('reference');
                    echo $this->Form->control('startdate', ['empty' => true]);
                    echo $this->Form->control('duedate', ['empty' => true]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('createdby');
                    echo $this->Form->control('modifiedby');
                    echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
