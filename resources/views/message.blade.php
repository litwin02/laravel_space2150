<!DOCTYPE html>
<html lang="pl-PL">
    @include('partials.head')
<body>
    @include('partials.navi')
    <div id="zawartosc">
        <h2>Error message</h2>
        <p>{{ $message }}</p>
    </div>
    
</body>
</html>