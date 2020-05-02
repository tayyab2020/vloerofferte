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

                            <div class="login-title text-center">{{$lang->signup_handyman}}</div>

                            <form action="{{route('handyman-register-submit')}}" method="POST">
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
                                  <input name="registration_number" class="form-control" placeholder="{{$lang->rg}}" type="text" value="{{ old('registration_number') }}">
                                </div>
                              </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="postcode" class="form-control" placeholder="{{$lang->pct}}" type="text" value="{{ old('postcode') }}">
                                    </div>
                                </div>



                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="company_name" class="form-control" placeholder="{{$lang->compname}}" type="text" value="{{ old('company_name') }}">
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
                                  <input name="phone" class="form-control" placeholder="{{$lang->pn}}" type="number" value="{{ old('phone') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="tax_number" class="form-control" placeholder="{{$lang->tn}}" type="text" value="{{ old('tax_number') }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                  </div>
                                  <input name="bank_account" class="form-control" placeholder="{{$lang->ba}}" type="text" value="{{ old('bank_account') }}">
                                </div>
                              </div>

                              <input type="hidden" name="category_id" value="20">
                              <input type="hidden" name="role_id" value="2">


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



                                  <div class="g-recaptcha" data-sitekey="{{config('app.captcha_key')}}" style="display: table;margin: auto;margin-bottom: 40px;margin-top: 40px;"></div>
                                  <!-- @if($errors->has('g-recaptcha-response'))
                                  <span class="invalid-feedback" style="display: block;text-align: center;margin-bottom: 40px;">
                                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                  </span>
                                  @endif -->

                                  <div style="margin: auto;margin-bottom: 40px;margin-top:30px;width: 50%;text-align: center;">

                              <input type="checkbox" name="terms" id="terms" required> <span style="position: relative;bottom: 2px;"> {{$lang->iagt}} <a href="{{  $terms ? url('assets/'.$terms->file) : url('assets/terms-and-conditions-template.pdf')  }}" style="color: blue;">{{$lang->tact}}</a></span>
                            </div>

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
