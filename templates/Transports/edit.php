<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport $transport
 * @var string[]|\Cake\Collection\CollectionInterface $assignments
 * @var string[]|\Cake\Collection\CollectionInterface $dependants
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transports'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="transports form content">
            <?= $this->Form->create($transport) ?>
            <fieldset>
                <legend><?= __('Edit Transport') ?></legend>
                <?php
                    echo $this->Form->control('assignment_id', ['options' => $assignments]);
                    echo $this->Form->control('dependant_id', ['options' => $dependants]);
                    echo $this->Form->control('pickupathome', ['empty' => true]);
                    echo $this->Form->control('dropoffatschool', ['empty' => true]);
                    echo $this->Form->control('pickupschool', ['empty' => true]);
                    echo $this->Form->control('dropoffathome', ['empty' => true]);
                    echo $this->Form->control('pickuplocation');
                    echo $this->Form->control('dropofflocation');
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
