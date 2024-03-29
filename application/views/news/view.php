<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main mt-5">
            <div class="blog-post">
                <p>
                    <?php echo $news_item['text']?>
                </p>
            </div>
            <!-- /.blog-post -->
        </div>
        <!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-4">
                <h4 class="font-italic">Imagenes</h4>
                <ol class="list-unstyled mb-0">
                    <li>
                        <a href="<?php echo $news_item['image']?>" target="_blank">
                            <img src="<?php echo $news_item['image']?>" alt="news image" class="img-fluid img-thumbnail">
                        </a>
                    </li>
                </ol>
            </div>
            <br/>
            <div class="p-4">
                <h4 class="font-italic">Edicion</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="<?php echo base_url()?>index.php/News/edit/<?php echo $news_item['slug']?>">Editar noticia</a></li>
                    <li><a href="<?php echo base_url()?>index.php/News/delete/<?php echo $news_item['slug']?>">Eliminar noticia</a></li>
                </ol>
            </div>
        </aside>
        <!-- /.blog-sidebar -->
    </div>
    <!-- /.row -->
</main>