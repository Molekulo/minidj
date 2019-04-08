<div class="box">
    <h3>Add a song</h3>
    <form action="<?php echo URL; ?>songs" method="POST">
        <label>Artist</label>
        <input type="text" name="artist" value=""/>
        <label>Track</label>
        <input type="text" name="track" value=""/>
        <label>Link</label>
        <input type="text" name="link" value=""/>
        <input type="submit" name="submit_add_song" value="Submit"/>
    </form>
</div>
<?php if (!empty($status)) {
    echo $status;
} ?>
<!-- main content output -->
<div class="box">
    <h3>Amount of songs</h3>
    <div>
        <h3><?php echo $amount_of_songs; ?></h3>
    </div>
    <h3>List of songs</h3>
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Id</td>
            <td>Artist</td>
            <td>Track</td>
            <td>Link</td>
            <td>DELETE</td>
            <td>EDIT</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($songs as $song) { ?>
            <tr>
                <td><?php if (isset($song->id)) {
                        echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8');
                    } ?></td>
                <td><?php if (isset($song->artist)) {
                        echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8');
                    } ?></td>
                <td><?php if (isset($song->track)) {
                        echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8');
                    } ?></td>
                <td>
                    <?php if (isset($song->link)) { ?>
                        <a href="<?php echo htmlspecialchars(
                            $song->link,
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>"><?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </td>
                <td>
                    <form method="POST"
                          action="<?php echo URL . 'songs/' . $song->id; ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="delete">
                    </form>
                </td>
                <td>

                    <form method="GET"
                          action="<?php echo URL . 'songs/' . $song->id; ?>/edit">
                        <input type="submit" value="edit">
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
