@extends('layouts.front')
@section('content')

@if (Session::has('message'))
   <div class="alert alert-danger" style="font-size: 20px;margin-top: 30px;text-align: center;">{{ Session::get('message') }}</div>
@endif


<section class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12">
                        <div class="login-form">
                            <div class="login-icon"><i class="fa fa-user"></i></div>
                            
                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                            
                            <div class="login-title text-center">{{$lang->signup}}</div>

                            <form action="{{route('user-register-submit')}}" method="POST">
                              {{csrf_field()}}
                              @include('includes.form-error')
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="name" class="form-control" placeholder="{{$lang->suf}}" type="text" value="{{ old('name') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="family_name" class="form-control" placeholder="{{$lang->fn}}" type="text" value="{{ old('family_name') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="business_name" class="form-control" placeholder="{{$lang->bn}}" type="text" value="{{ old('business_name') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="postcode" class="form-control" placeholder="{{$lang->pc}}" type="text" value="{{ old('postcode') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="address" class="form-control" placeholder="{{$lang->ad}}" type="text" value="{{ old('address') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="city" class="form-control" placeholder="{{$lang->ct}}" type="text" value="{{ old('city') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="phone" class="form-control" placeholder="{{$lang->pn}}" type="number" value="{{ old('phone') }}">
                                </div>
                              </div>

                              <input type="hidden" name="category_id" value="20">
                              <input type="hidden" name="role_id" value="3">

                              
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-envelope"></i>
                                  </div>
                                  <input name="email" class="form-control" placeholder="{{$lang->sue}}" type="email" value="{{ old('email') }}">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                  <input class="form-control" name="password" placeholder="{{$lang->sup}}" type="password">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                  <input class="form-control" name="password_confirmation" placeholder="{{$lang->sucp}}" type="password">
                                </div>
                              </div>
                            

                              
                                  <div class="g-recaptcha" data-sitekey="6LfqTNUUAAAAAFqASa_nsRiXyZMwG_BSyslBhT0M" style="display: table;margin: auto;margin-bottom: 40px;margin-top: 40px;"></div>
                                  <!-- @if($errors->has('g-recaptcha-response'))
                                  <span class="invalid-feedback" style="display: block;text-align: center;margin-bottom: 40px;">
                                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                  </span>
                                  @endif -->
                                
                              <div class="form-group text-center">
                                    <button type="submit" class="btn login-btn" name="button">{{$lang->cnf_btn}}</button>
                              </div>
                              <div class="form-group text-center">
                                    <a href="{{route('user-login')}}">{{$lang->al}}</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection