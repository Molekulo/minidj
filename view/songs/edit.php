<div>
    <h3>Edit a song</h3>
    <form action="<?php echo URL; ?>songs/<?= $song->id?>" method="POST">
        <input type="hidden" name="_method" value="PUT"/>
        <label>Artist</label>
        <input autofocus type="text" name="artist"
               value="<?php echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?>"/>
        <label>Track</label>
        <input type="text" name="track" value="<?php echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?>"
        />
        <label>Link</label>
        <input type="text" name="link" value="<?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?>"/>
        <input type="hidden" name="song_id" value="<?php echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>"/>
        <input type="submit" name="submit_update_song" value="Update"/><br>
        <?php if (isset($status)) {
            echo $status;
        } ?>
    </form>
</div>

