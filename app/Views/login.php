<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Login'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header class="text-center">
    <h1>Hello HTML</h1>
</header>
<main>
    <form method="POST" class="form-center">
        <label>Username</label>
        <input name="username" value="<?= set_value('username') ?>"/>
        <label>Password</label>
        <input name="password" type="password" />
        <button>Submit</button>
    </form>
<p><?= $result ?></p>
</main>
<?= $this->endSection() ?>