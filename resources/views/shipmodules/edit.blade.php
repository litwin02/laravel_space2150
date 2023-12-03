<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
    <h2>Edit ship module</h2>
    <form class="form-inline" action="<?=config("app.url"); ?>/shipmodules/update/{{$shipmodule->id}}" method="post">
    @csrf
    <p>
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="{{$shipmodule->id}}" readonly />
    </p>
    <p>
        <label for="moudle_name">Module name:</label>
        <input type="text" name="module_name" id="module_name" value="{{$shipmodule->module_name}}" size="25" required />
    </p>
    <p>
        <label for="is_workable">Is workable:</label>

        <input type="radio" name="is_workable" id="is_workable" value=1 
        @if ($shipmodule->is_workable) checked @endif required />
        <label for="is_workable">True</label>   
        <input type="radio" name="is_workable" id="is_workable" value=0 
        @if (!($shipmodule->is_workable)) checked @endif required  />
        <label for="is_workable">False</label>
    </p>
        <p>
            <button type="submit" class="btn btn-primary mb-2">Update</button>
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