<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-md-6">
        <?php echo form_open('News/save'); ?>

        <label for="id" hidden>Id</label>
        <input type="number" name="id" value="<?php if (isset($news_item)) {echo $news_item['id'];} else {echo null;} ?>" hidden/><br />

        <label for="title">Title</label>
        <input type="input" name="title" value="<?php if (isset($news_item)) {echo $news_item['title'];} else {echo '';} ?>" /><br />

        <label for="text">Text</label>
        <textarea name="text"><?php if (isset($news_item)) {echo $news_item['text'];} else {echo '';} ?></textarea><br />

        <label for="image">ImageURL *</label>
        <input id="ImageURLinput" type="input" name="image" readonly value="<?php if (isset($news_item)) {if (isset($news_item['image'])) {echo $news_item['image'];}else{ echo " ";}} else {echo '';} ?>"/><br />
        <p>
            * Arrastre una imagen al drag&drop
        </p>
        <br/>

        <input type="submit" name="submit" value="Guardar noticia" />
        </form>
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