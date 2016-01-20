<!--creates the search form and bar for client to search movie name-->

<h1>Movie Revenues from 2014</h1>
<form action="" method="GET">
    <div class="form-group">
        <input type="text" 
            id="qInput" 
            name="q"
            class="form-control" 
            value="<?= htmlentities($q) ?>"
            placeholder="search by title"
            required
            >
    </div>
</form>
