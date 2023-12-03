<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
    <h2>Module crew list</h2>
    <table>
        <thead>
            <tr> <th>ID</th> <th>Ship module ID</th> <th>Nick</th> <th>Gender</th> <th>Age</th></tr>
        </thead>
        <tbody>
            @foreach($moduleCrew as $el)
            <tr> 
                <td>{{$el->id}}</td> 
                <td>{{$el->ship_module_id}}</td> 
                <td>{{$el->nick}}</td> 
                <td>{{$el->gender}}</td>
                <td>{{$el->age}}</td>
                <td><a href="<?=config('app.url'); ?>/modulecrew/edit/{{$el->id}}">Edit</a></td>
                <td><a href="<?=config('app.url'); ?>/modulecrew/show/{{$el->id}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>