<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

         <form method="post">

             <label for="title">Title</label>
             <input type="text" name="title" id="title" required> <br><br>

             <label for="body">Body</label>
             <textarea name="body" id="body" required></textarea><br><br>

             <?php if(isset($errors['body'])): ?>

                 <?= $errors['body']; ?>

             <?php endif; ?>

             <button name="submit">Submit</button>

         </form>
        </div>
    </main>

<?php require('partials/footer.php') ?>

<?php //= $_POST['body'] ?? '' ?>
