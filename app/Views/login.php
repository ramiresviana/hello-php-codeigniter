<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Login'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header class="text-center">
    <h1>Hello HTML</h1>
</header>
<main>
    <form class="form-center">
        <label>Username</label>
        <input />
        <label>Password</label>
        <input type="password" />
        <button>Submit</button>
    </form>
</main>
<?= $this->endSection() ?>