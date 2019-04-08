<?php require "../view/home/index.php" ?>

    <h2>Results:</h2>
<?php if ($songs) : ?>
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Artist</td>
            <td>Track</td>
            <td>Start song</td>
            <td>Username</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($songs as $song) : ?>
            <tr>
                <td><?= htmlspecialchars($song->artist) ?></td>
                <td><?= htmlspecialchars($song->track) ?></td>
                <td><a href="<?= htmlspecialchars($song->link) ?>">Play</a></td>
                <td><?= htmlspecialchars($song->username) ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Track or artist '<?= $_GET['search'] ?>' not exists.</p>
    <a href="<?= '/' ?>">
        <button>Try again</button>
    </a>
<?php endif ?>