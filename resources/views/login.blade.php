@extends('baseadm')

@section('title', 'Login')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex flex-column justify-content-center align-items-center auth auth-bg-1 theme-one">
        <div class=" row w-40 mx-auto">
            @if (session('success'))
            <div class="alert alert-success" style="margin-bottom: 20px;">
                <i class="fas fa-check-circle " style="margin-right: 20px;"></i>
                {{ session('success') }}
            </div>
            @endif
        </div>

        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Username" required autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="*********" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Se connecter</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="{{ asset('theme/images/file-icons/icon-google.svg') }}" alt="">Log in with Google</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="{{ route('signin') }}" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2020 Bootstrapdash. All rights reserved.</p>
            <p class="footer-text text-center text-center"><a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"> Free Bootstrap template </a> from BootstrapDash templates</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection
