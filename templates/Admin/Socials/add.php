<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Social $social
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Socials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socials form content">
            <?= $this->Form->create($social) ?>
            <fieldset>
                <legend><?= __('Add Social') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('address');
                    echo $this->Form->control('fb');
                    echo $this->Form->control('instagram');
                    echo $this->Form->control('youtube');
                    echo $this->Form->control('office_hour');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
