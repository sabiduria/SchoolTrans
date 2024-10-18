<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehicles form content">
            <?= $this->Form->create($vehicle) ?>
            <fieldset>
                <legend><?= __('Edit Vehicle') ?></legend>
                <?php
                    echo $this->Form->control('plate');
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
