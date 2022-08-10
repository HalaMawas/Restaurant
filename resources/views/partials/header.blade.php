<div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">One <span>Life</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                       
                        <a href="{{url('/')}}" class="nav-item nav-link active">{{ __('main.Menu')}}</a>
                        <!-- <a href="{{url('offers-show')}}" class="nav-item nav-link">offer</a> -->
                        @isset($table)
                        <a href="{{url("showbasket/{$table}")}}" class="nav-item nav-link">order</a>
                        @endisset
                       <!--  <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="single.html" class="dropdown-item">Blog Detail</a>
                            </div>
                        </div> -->
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        @if(LaravelLocalization::getCurrentLocale()=='en')
                        <!-- <a href="{{url('changeLang/ar')}}" class="nav-item nav-link">ع</a> -->
                        @else

                       <!-- <a href="{{url('changeLang/en')}}" class="nav-item nav-link">En</a> -->
                            @endif
                    </div>
                </div>
            </div>
        </div>