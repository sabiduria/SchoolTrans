<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<div class="row mt-3">
    <!--aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $profile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside-->
    <div class="column column-80">
        <div class="profiles form content">
            <?= $this->Form->create($profile) ?>
            <div class="form-group">
                <legend><?= __('Add Profile') ?></legend>
                <?php
                echo $this->Form->control('name', ['class'=>'form-control']);
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
