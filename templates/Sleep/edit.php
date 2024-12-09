<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DailySleep $dailySleep
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dailySleep->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dailySleep->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sleep Records'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sleep form content">
            <?= $this->Form->create($dailySleep) ?>
            <fieldset>
                <legend><?= __('Edit Sleep Record') ?></legend>
                <?php
                    echo $this->Form->control('sleep_date', ['type' => 'date', 'label' => 'Date de sommeil']);
                    echo $this->Form->control('sleep_start', ['type' => 'time', 'label' => 'Heure de coucher']);
                    echo $this->Form->control('sleep_end', ['type' => 'time', 'label' => 'Heure de lever']);
                    echo $this->Form->control('cycles', ['label' => 'Nombre de cycles']);
                    echo $this->Form->control('comment', ['type' => 'textarea', 'label' => 'Commentaire']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
