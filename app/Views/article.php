<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Article'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header>
    <h1>Hello HTML</h1>
</header>
<main>
    <img class="full-img" src="<?= base_url(['uploads', $article->image]) ?>">
    <h2><?= $article->title ?></h2>
    <p><?= $article->content ?></p>

<?php if (session()->get('logged')): ?>
    <div class="admin-actions">
        <hr>
        <a href="<?= base_url(['edit', $article->id]) ?>"><button>Edit</button></a>
        <a href="<?= base_url(['remove', $article->id]) ?>"><button class="red">Remove</button></a>
    </div>
<?php endif ?>
</main>
<?= $this->endSection() ?>