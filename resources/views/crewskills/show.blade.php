<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
    <h2>Confirmation - Delete ID: {{$crew_skill->id}}</h2>
    <form class="form-inline" action="<?=config("app.url"); ?>/crewskills/delete/{{$crew_skill->id}}" method="post">
    @csrf
    <p>
        <label for="id">ID</label>
        <input type="text" name="id" id="id" size="25" value="{{$crew_skill->id}}" readonly />
    </p>
    <p>
        <label for="module_crew_id">Module crew ID</label>
        <input type="text" name="module_crew_id" id="module_crew_id" size="25"
        value="{{$crew_skill->module_crew_id}}" readonly />
    </p>
    <p>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" size="25"
        value="{{$crew_skill->name}}" readonly />
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