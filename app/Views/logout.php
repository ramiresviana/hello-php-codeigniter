<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Logout'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header class="text-center">
    <h1>Hello HTML</h1>
</header>
<main>
    <form class="form-center" method="POST">
        <h3>You want to logout?</h3>
        <button name="logout">Submit</button>
    </form>
</main>
<?= $this->endSection() ?>