<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
	<div class="container">
		<div class="row">
		<div class="col-4">
			<a href="{{ route('homepage') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
				<span class="fs-2"><i class="fa fa-home" aria-hidden="true"></i>Funny Movies</span>
			</a>
		</div>
		<div class="col-8" >
			<div class="login-container">
				@auth
					Welcome, {{auth()->user()->email}}
					<a href="{{ route('home.share') }}" class="btn btn-outline-primary me-2">Share Movie</a>
					<form action="{{ route('do_logout') }}" method="POST" style="display: inline;">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<button type="submit" class="btn btn-outline-secondary me-2">Logout</button>
					</form>
				@endauth
		
				@guest
					<form action="{{ route('do_login') }}" method="POST">
						@if(isset ($errors) && count($errors) > 0)
							<div class="alert alert-danger" role="alert">
								<ul class="list-unstyled mb-0">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input type="text" class="form-control" required="required" placeholder="Username" name="username">
						<input type="password" class="form-control" required="required" placeholder="Password" name="password">
						<button type="submit" class="btn btn-outline-primary">Login</button>
						<a href="{{ route('register.show') }}" class="btn btn-outline-primary me-2">Register</a>
					</form>
				@endguest
			</div>
			</div>
		</div>
	</div>
</header>