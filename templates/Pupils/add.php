<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pupil $pupil
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pupils'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pupils form content">
            <?= $this->Form->create($pupil) ?>
            <fieldset>
                <legend><?= __('Add Pupil') ?></legend>
                <?php
                    echo $this->Form->control('reference');
                    echo $this->Form->control('name');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('email');
                    echo $this->Form->control('actived');
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
