<!-- ####################### -->
<div id="navigationbar">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand navbar-logo" href="#">Alban Kaperi</a>
              </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('product.index')}}" class=""><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i> Full Menu <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sublink</a>
                                </li>
                                <li><a href="#">Sublink</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Wings</a></li>
                        <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Beef <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Sublink</a></li>
                                <li><a href="#">Sublink</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Drinks <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Sublink</a></li>
                                <li><a href="#">Sublink</a></li>
                                <li><a href="#">Sublink</a></li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="{{route('product.shoppingCart')}}">
                            <i style="color:#9CFF00" class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i> Shopping Cart
                             <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                            </a>
                        </li>

                        <li class=" dropdown">
                          <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                          @if(Auth::user())
                          {{Auth::user()->username}}
                          @else
                          UserAccount
                          @endif
                          <span class="caret"></span>
                          </a>
                            <ul class="dropdown-menu">
                              @if(Auth::check())
                              <li><a href="{{route('user.profile')}}">User Profile</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="{{route('user.logout')}}">Log Out</a></li>
                              @else
                              <li><a href="{{route('user.signin')}}">Sign In</a></li>
                              <li><a href="{{route('user.signup')}}">Sign Up</a></li>
                              @endif

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

</div>
