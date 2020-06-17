<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'New'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header>
    <h1>Hello HTML</h1>
</header>
<main>
    <form>
        <label>Title</label>
        <input />
        <label>Content</label>
        <textarea rows="6"></textarea>
        <label>Title</label>
        <input type="file" />
        <button>Submit</button>
    </form>
</main>
<?= $this->endSection() ?>