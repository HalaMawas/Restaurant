@extends('control.master')
@section('style')


@endsection
@section('content')
 <div class="row">
                 
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              انشاء مستخدم
                          </header>
                          <div class="panel-body">
                             <form method="POST" action="{{url('users')}}">
                        @csrf
                        @if (session('success'))
                            <div class="form-group  row" style="text-align: center;">
                                <div class="row col-md-6 col-md-offset-4 ">

                                    <div class="alert alert-success">
                                        {!! session('success') !!}
                                    </div>
                                </div>
                            </div>        
                                            @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">الاسم</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">البريد  الالكتروني</label>

                            <div class="col-md-6">
                                <input style="direction: ltr;text-align: left;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تأكيد كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">صلاحية المستخدم</label>

                            <div class="col-md-6">
                               <select id="role_id" name="role_id" data-route="{{url('api/selectrole')}}"      class="form-control" required>
                                               
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                                      <div class="col-lg-offset-5 col-lg-4">
                        <div class="form-actions center">
                             <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i>موافق
                            </button>
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> إلغاء
                            </button>
                           

                        </div>
                    </div>
                </div>

                    
                    </form>
                          </div>
                      </section>

                  </div>
              </div>
@endsection
@section('script')
    {{--/* for active sidebar*/--}}
    <script>
      

          var APP_URL = {!! json_encode(url('/createUser')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
        $('[href="' + APP_URL + '"]').parent().parent().prev().addClass('active');
    </script>
    @endsection
