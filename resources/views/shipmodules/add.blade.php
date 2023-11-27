<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
    <h2>Add ship module</h2>
    <form class="form-inline" action="<?=config("app.url"); ?>/shipmodules/save" method="post">
    @csrf
    <p>
        <label for="moudle_name">Module name:</label>
        <input type="text" name="module_name" id="module_name" size="25" required />
    </p>
    <p>
        <label for="is_workable">Is workable:</label>

        <input type="radio" name="is_workable" id="is_workable" value=1 checked required />
        <label for="is_workable">True</label>   
        <input type="radio" name="is_workable" id="is_workable" value=0 required />
        <label for="is_workable">False</label>
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