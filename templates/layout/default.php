<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?php //= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?php //= $this->fetch('meta') ?>
    <?php //= $this->fetch('css') ?>
    <?php //= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/5/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?php //= $this->Flash->render() ?>
            <?php //= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
