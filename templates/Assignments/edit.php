<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 * @var string[]|\Cake\Collection\CollectionInterface $drivers
 * @var string[]|\Cake\Collection\CollectionInterface $vehicles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assignment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Assignments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="assignments form content">
            <?= $this->Form->create($assignment) ?>
            <fieldset>
                <legend><?= __('Edit Assignment') ?></legend>
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
