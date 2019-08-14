<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-md-6">
        <?php echo form_open('News/save'); ?>

        <label for="id" hidden>Id</label>
        <input type="number" name="id" value="<?php echo $news_item['id']; ?>" hidden/><br />

        <label for="title">Title</label>
        <input type="input" name="title" value="<?php echo $news_item['title']; ?>" /><br />

        <label for="text">Text</label>
        <textarea name="text"><?php echo $news_item['text']; ?></textarea><br />

        <label for="image">ImageURL *</label>
        <a href="<?php echo $news_item['image']?>" target="_blank">
            <img id="newsImage" src="<?php echo $news_item['image']?>" alt="news image" class="newsimg img-fluid img-thumbnail">
        </a>
        <input id="ImageURLinput" type="input" name="image" readonly value="<?php echo $news_item['image']; ?>" /><br />
        <p>
            * Arrastre una imagen al drag&drop
        </p>
        <br/>

        <input type="submit" name="submit" value="Guardar noticia" />
        </form>
        <p class="error">
            <?php echo $error?>
        </p>
    </div>
    <div class="col-md-6">
        <div id="dropzone">
            <form action="https://api.imgbb.com/1/upload?key=181113d959798001ce4b871bae541517" class="dropzone needsclick dz-clickable" id="myDropzone">
                <div class="dz-message needsclick">
                    Drop files here or click to upload.<br>
                </div>

            </form>
        </div>
    </div>

</div>


<script src="<?php echo base_url();?>js/dropzone.js"></script>
<script src="<?php echo base_url();?>js/dropzoneconfig.js"></script>