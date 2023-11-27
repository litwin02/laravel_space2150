<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
    <h2>Ship modules list</h2>
    <table>
        <thead>
            <tr> <th>ID</th> <th>Module Name</th> <th>Is workable?</th> </tr>
        </thead>
        <tbody>
            @foreach($ship_modules as $el)
            <tr> 
                <td>{{$el->id}}</td> <td>{{$el->module_name}}</td> 
                <td>
                    @if($el->is_workable === TRUE)
                        True
                    @else
                        False
                    @endif
                </td> 
                <td><a href="<?=config(app.url); ?>/shipmodules/edit/{{$el->id}}">Edit</a></td>
                <td><a href="<?=config(app.url); ?>/shipmodules/show/{{$el->id}}">Del</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>