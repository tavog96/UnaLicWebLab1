<?php echo validation_errors(); ?>

<?php echo form_open('News/save'); ?>

<label for="id" hidden>Id</label>
<input type="number" name="id" value="<?php if (isset($news_item)) {echo $news_item['id'];} else {echo null;} ?>" hidden/><br />

<label for="title">Title</label>
<input type="input" name="title" value="<?php if (isset($news_item)) {echo $news_item['title'];} else {echo '';} ?>"/><br />

<label for="text">Text</label>
<textarea name="text"><?php if (isset($news_item)) {echo $news_item['text'];} else {echo '';} ?></textarea><br />

<label for="image">Image</label>
<textarea id="image" name="image" value="<?php if (isset($news_item)) {if (isset($news_item['image'])){echo $news_item['image'];}else{echo '';}} else {echo '';} ?>"></textarea><br />

<input type="submit" name="submit" value="Guardar noticia" />

</form>

<br/>
