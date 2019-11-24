<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Portal</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/1c9997f288.js"></script>

    <link rel="stylesheet" href="{{asset('theme/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/css/font-icons/entypo/css/entypo.css')}}">

    <link rel="stylesheet" href="{{asset('theme/assets/css/neon-theme.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/css/neon-forms.css')}}">
<style type="text/css" media="screen">
    #content{
        margin-top: 50px;
    }
    i{
      cursor: pointer;
    }

</style>
<body>

<header>


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand" href="{{url('/')}}">Job Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        

        </ul>

          <ul class="navbar-nav ml-auto" style="float: right">
                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('register'))

                            <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('Employee') }}
                                   </a>
                                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('login') }}">{{__('Sign In')}}</a>
                                     <a class="dropdown-item" href="{{ route('register') }}">{{__('Sign Up')}}</a>



                                 </li>
                                 <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         {{ __('Employeer') }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="{{ route('employeer.login') }}">Sign In</a>
                                          <a class="dropdown-item" href="{{ route('employeer.register') }}">Sign Up</a>


                                      </li>

                            @endif

                        @else
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                          </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

      </div>
    </nav>

</header>
<section id="content">
    @yield('content')
</section>

<script type="text/javascript" src="{{ asset('js/job_info.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{asset('theme/assets/js/dropzone/dropzone.css')}}">

<!-- Bottom scripts (common) -->
<script src="{{ asset('theme/assets/js/gsap/TweenMax.min.js') }} "></script>
<script src="{{ asset('theme/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }} "></script>
<script src="{{asset('theme/assets/js/bootstrap.js')}}"></script>
<script src="{{asset('theme/assets/js/joinable.js')}}"></script>
<script src="{{asset('theme/assets/js/resizeable.js')}}"></script>
<script src="{{asset('theme/assets/js/neon-api.js')}}"></script>


<!-- Imported scripts on this page -->
<script src="{{asset('theme/assets/js/fileinput.js')}}"></script>
<script src="{{asset('theme/assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('theme/assets/js/neon-chat.js')}}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{asset('theme/assets/js/neon-custom.js')}}"></script>


<!-- Demo Settings -->
<script src="{{asset('theme/assets/js/neon-demo.js')}}"></script>
</body>
</html>