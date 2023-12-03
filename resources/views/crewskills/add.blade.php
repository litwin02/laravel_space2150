<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
    <h2>Add crew skill</h2>
    <form class="form-inline" action="<?=config("app.url"); ?>/crewskills/save" method="post">
    @csrf
    <p>
        <label for="module_crew_id">Module crew ID</label>
        <input type="text" name="module_crew_id" id="module_crew_id" size="25" required />
    </p>
    <p>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" size="25" required />
    </p>
    <p>
        <button type="submit" class="btn btn-primary mb-2">Save</button>
    </p>
    </form>
    <p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </p>
</body>
</html>