<nav>
<div class="navbar">
    <a href="<?=config('app.url'); ?>/">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Ships</button>
        <div class="dropdown-content">
            <a href="<?=config('app.url'); ?>/shipmodules/list">Ship modules list</a>
            <a href="<?=config('app.url'); ?>/shipmodules/add">Create ship module</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Crew</button>
        <div class="dropdown-content">
            <a href="<?=config('app.url'); ?>/modulecrew/list">Module crew list</a>
            <a href="<?=config('app.url'); ?>/modulecrew/add">Add module crew</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Skills</button>
        <div class="dropdown-content">
            <a href="<?=config('app.url'); ?>/crewskills/list">Crew skills list</a>
            <a href="<?=config('app.url'); ?>/crewskills/add">Add crew skills</a>
        </div>
    </div>
    @if (Auth::check())
    <a href="<?=config('app.url'); ?>/logout">Logout</a>
    @else
    <a href="<?=config('app.url'); ?>/login">Login</a>
    <a href="<?=config('app.url'); ?>/register">Register</a>
    @endif

</div>
</nav>