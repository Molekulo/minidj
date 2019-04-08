<form method="GET" action="/songs/result">
    <label for="search">Search songs</label>
    <input type="text" name="search" id="search"
           placeholder="Type name of the song or artist"
           value="<?php if (!empty($_GET['search'])) echo $_GET['search'] ?>">
    <button type="submit">Search</button>
</form>
