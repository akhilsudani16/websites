<?php require 'partials/header.php'; ?>
<?php require 'partials/nav.php'; ?>
<?php require 'function.php'; ?>

<p class="text-white"> Notes Page </p>

<?php foreach ($notes as $note) : ?>

    <li>
        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">

            <?= HTMLSPECIALCHARS($note['body']); ?>

        </a>
    </li>

<?php endforeach; ?>


<?php require 'partials/footer.php'; ?>