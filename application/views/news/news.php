<div class="jumbotron">
    <div class="container">
        <h4>Bienvenido a Doge News</h4>
        <p>Aca podes probar las capacidades CRUD del framework <b>CodeIgniter</b> agregando, vizualisando y modificando noticias.</p>
        <p><a class="btn btn-primary" href="https://www.codeigniter.com/user_guide/tutorial/index.html" target="_blank" role="button">Tutorial »</a></p>
        <p><a class="btn btn-primary" href="<?php echo base_url()?>index.php/News/save" role="button">Nueva Noticia »</a></p>
    </div>
</div>


<div class="container">
    <div class="row">

        <?php foreach ($news as $news_item): ?>
        <div class="col-md-4 mt-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $news_item['title']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo substr($news_item['text'], 0, 100); ?>...</p>
                    <a href="<?php echo site_url('news/'.$news_item['slug']); ?>" class="card-link">Ver mas</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <hr>
</div>