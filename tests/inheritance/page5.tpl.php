<?php $this->extends('layout.tpl.php') ?>

<?php $this->block('body') ?>
    <table>
        <tbody>
            <?php foreach ($this->persons as $person) : ?>
                <?= $this->includeTemplate('includes/row.tpl.php', [
                    'name' => $person['name'],
                    'gender' => $person['gender'],
                ]) ?>
            <?php endforeach ?>
        </tbody>
    </table>
<?php $this->endblock() ?>
