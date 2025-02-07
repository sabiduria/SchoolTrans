<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pupil $pupil
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pupil->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pupil->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pupils'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="pupils form content">
            <?= $this->Form->create($pupil) ?>
            <div class="form-group">
                <legend><?= __('Add Pupil') ?></legend>
                <?php
                echo $this->Form->control('reference', ['class'=>'form-control']);
                echo $this->Form->control('name', ['class'=>'form-control']);
                echo $this->Form->control('lastname', ['class'=>'form-control']);
                echo $this->Form->control('phone', ['class'=>'form-control']);
                echo $this->Form->control('email', ['class'=>'form-control']);
                echo $this->Form->control('actived', ['class'=>'form-control']);
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
