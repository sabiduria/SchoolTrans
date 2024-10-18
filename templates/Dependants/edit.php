<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependant $dependant
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $pupils
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dependant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dependant->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dependants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="dependants form content">
            <?= $this->Form->create($dependant) ?>
            <fieldset>
                <legend><?= __('Edit Dependant') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('pupil_id', ['options' => $pupils]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('exempted');
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
