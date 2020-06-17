<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Index'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header>
    <h1>Hello HTML</h1>
    Logged as admin <div class="admin-actions"><button class="red">Logout</button></div>
    There are 100 posts <div class="admin-actions"><button>Add new</button></div>
</header>
<main>
<?php foreach($articles as $article): ?>
    <a href="<?= base_url(['article', $article->id]) ?>">
        <article>
            <img src="<?= base_url($article->image) ?>">
            <div>
                <h2><?= $article->title ?></h2>
                <p><?= $article->content ?></p>
            </div>
        </article>
    </a>
<?php endforeach ?>
</main>
<footer>
    <button>Next Page</button>
</footer>
<?= $this->endSection() ?>