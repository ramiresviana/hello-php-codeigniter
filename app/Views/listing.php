<?= $this->extend('layout') ?>

<?= $this->section('title'); echo 'Index'; $this->endSection(); ?>

<?= $this->section('content') ?>
<header>
    <h1>Hello HTML</h1>
<?php if (session()->get('logged')): ?>
    Logged as admin <div class="admin-actions"><a href="<?= base_url('logout') ?>"><button class="red">Logout</button></a></div>
    There are 100 posts <div class="admin-actions"><a href="<?= base_url('new') ?>"><button>Add new</button></a></div>
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
<?php if($pager->getPreviousPageURI()): ?>
    <a href="<?= $pager->getPreviousPageURI() ?>"><button>Previous Page</button></a>
<?php endif ?>
<?php if($pager->getNextPageURI()): ?>
    <a href="<?= $pager->getNextPageURI() ?>"><button>Next Page</button></a>
<?php endif ?>
</footer>
<?= $this->endSection() ?>