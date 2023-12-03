<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
    <h2>Confirmation - Delete ID: {{$shipmodule->id}}</h2>
    <form class="form-inline" action="<?=config("app.url"); ?>/shipmodules/delete/{{$shipmodule->id}}" method="post">
    @csrf
        <p>
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" value="{{$shipmodule->id}}" readonly />
        </p>
        <p>
            <label for="moudle_name">Module name:</label>
            <input type="text" name="module_name" id="module_name" value="{{$shipmodule->module_name}}" size="25" readonly />
        </p>
        <p>
            <button type="submit" class="btn btn-primary mb-2">Delete</button>
        </p>
    </form>
    </div>
</body>
</html>