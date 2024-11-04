<div class="card">
    <div class="card-header">
        <h3>Welcome {{Auth::user()->name}}</h3>
    </div>
    <div class="card-body">
        <img class="text-center" width="100px" height="150px" src="" alt="">
        <hr>
        <a href="{{route('profile')}}">Dashboard</a>
        <hr>
        <a href="">Wishlist</a>
        <hr>
        <a href="{{route('my.order')}}">My order</a>
        <hr>
        <a href="{{route('user.setting')}}">Setting</a>
        <hr>
        <a href="{{route('open.ticket')}}">Open Ticket</a>
    </div>
</div>