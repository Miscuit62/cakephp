<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DailySleep $dailySleep
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="sleep form content">
            <?= $this->Form->create($dailySleep) ?>
            <fieldset>
                <legend><?= __('Add Sleep Record') ?></legend>
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
