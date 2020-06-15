<?= view('parts/header') ?>

<header>
    <h1>Hello HTML</h1>
</header>
<main>
    <img class="full-img" src="img.jpg">
    <h2>Vivamus euismod a tellus eget interdum. Aenean ac.</h2>
    <p>Aliquam vulputate mi in vulputate aliquam. Mauris ultrices vel felis eget tempus. Morbi a est at lacus malesuada ultrices ac quis turpis. Curabitur ante metus, malesuada eget neque eu, ornare suscipit ligula. Aliquam suscipit cursus eros, ut tincidunt nulla laoreet a. Donec aliquam urna vel pellentesque sodales.</p>

    <div class="admin-actions">
        <hr>
        <button>Edit</button>
        <button class="red">Remove</button>
    </div>
</main>

<?= view('parts/footer') ?>