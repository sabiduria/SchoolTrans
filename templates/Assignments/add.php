<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 * @var \Cake\Collection\CollectionInterface|string[] $drivers
 * @var \Cake\Collection\CollectionInterface|string[] $vehicles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Assignments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="assignments form content">
            <?= $this->Form->create($assignment) ?>
            <fieldset>
                <legend><?= __('Add Assignment') ?></legend>
                <?php
                    echo $this->Form->control('driver_id', ['options' => $drivers]);
                    echo $this->Form->control('vehicle_id', ['options' => $vehicles]);
                    echo $this->Form->control('starthour', ['empty' => true]);
                    echo $this->Form->control('endhour', ['empty' => true]);
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
