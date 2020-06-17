<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Edit'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header>
    <h1>Hello HTML</h1>
</header>
<main>
    <form enctype="multipart/form-data" method="POST" >
        <label>Title</label>
        <input name="title" value="<?= set_value('title', $article->title) ?>"/>
        <label>Content</label>
        <textarea name="content" rows="6"><?= set_value('content', $article->content) ?></textarea>
        <label>Title</label>
        <input name="image" type="file" />
        <button>Submit</button>
    </form>
<p><?= $result ?></p>
</main>
<?= $this->endSection() ?>