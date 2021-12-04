@extends('layouts.app')

@section('content')

<div class="main-wrapper">
			<div class="account-page">
				<div class="container">
					<h3 class="account-title">CRM Pro Login</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.html"><img src="assets/img/logo2.png" alt="Focus Technologies"></a>
							</div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="form-group form-focus">
									<label for="email" class="control-label">Username or Email</label>
                                    <input id="email" type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group form-focus">
									<label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
@endsection
