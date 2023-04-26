<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-center" href="#"><img class="w-25" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLy4mvNCi7b9FrVRtjOBBHZoPG6BxUJpcu2A&usqp=CAU" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link text-white" aria-current="page" id="home" href="{{ route('pages.index') }}">Home</a>
          <a class="nav-link text-white" id="men" href="#">Men</a>
          <a class="nav-link text-white" id="women" href="#">Women</a>
          <a class="mr-auto nav-link text-white" id="kids" href="#">Kids</a>
          <a class="nav-link text-white" id="kids" href="{{ route('carts.index') }}">Cart 
            @if (Session::has('cartItems'))
            <span>({{ count(Session::get('cartItems')) }})</span> 
             @endif</a>
        </div>
      </div>
    </div>
  </nav>