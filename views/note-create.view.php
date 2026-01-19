<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

         <form method="post">
             <label for="body">Body</label>
             <div><textarea name="body" id="body"><?= $_POST['body'] ?? '' ?></textarea>
             </div>

                 <?php if(isset($errors['body'])): ?>

                <?= $errors['body']; ?>

                 <?php endif; ?>

                <p>
                    <button name="submit">Submit</button>
                </p>
         </form>
        </div>
    </main>

<?php require('partials/footer.php') ?>