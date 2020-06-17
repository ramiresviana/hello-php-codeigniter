<?= view('parts/header') ?>

<header>
    <h1>Hello HTML</h1>
</header>
<main>
    <img class="full-img" src="<?= base_url($article->image) ?>">
    <h2><?= $article->title ?></h2>
    <p><?= $article->content ?></p>

    <div class="admin-actions">
        <hr>
        <button>Edit</button>
        <button class="red">Remove</button>
    </div>
</main>

<?= view('parts/footer') ?>