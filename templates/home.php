<h1>Ma Homepage</h1>

<a href="<?= $router->generate('contact')?>">Nous contacter</a>
<a href="<?= $router->generate('article', ['id' => 60, 'slug' => 'qqlechose'])?>">Voir l'article</a>

<?php ob_start(); ?>
<script>alert('Salut')</script>
<?php $pageJavascripts = ob_get_clean(); ?>