<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Remove'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header class="text-center">
    <h1>Hello HTML</h1>
</header>
<main>
    <form class="form-center" method="POST">
        <h3>You want to remove?</h3>
        <button name="remove">Submit</button>
    </form>
</main>
<?= $this->endSection() ?>