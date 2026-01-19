<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <p class="mb-5">
                <a href="/notes" class="text-blue-500 underline">Go Back...</a>
            </p>

            <p>  <?= htmlspecialchars($note['body']) ?> </p>


            <footer class="mt-5">
                <a href="/note/edit?=<?= $note['id']?>" class="text-gray-500 border border-current px-3 py-1 rounded">Edit</a>
            </footer>

    </main>

<?php require('partials/footer.php') ?>