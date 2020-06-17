<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Index'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header>
    <h1>Hello HTML</h1>
<?php if (session()->get('logged')): ?>
    Logged as admin <div class="admin-actions"><a href="<?= base_url('logout') ?>"><button class="red">Logout</button></a></div>
    There are 100 posts <div class="admin-actions"><a href="<?= base_url('add') ?>"><button>Add new</button></a></div>
<?php endif ?>
</header>
<main>
<?php foreach($articles as $article): ?>
    <a href="<?= base_url(['article', $article->id]) ?>">
        <article>
            <img src="<?= base_url(['uploads', $article->image]) ?>">
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