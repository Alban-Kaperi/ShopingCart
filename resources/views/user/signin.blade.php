@extends('layouts.master')
@section('title')
SignIn
@endsection
@section('content')

<!-- ================ INICIA FORMULARIO DE LOGIN ============================================================== -->

<div class="row" style="margin-top:60px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="{{route('user.signin')}}" method="POST">
        {{csrf_field()}}
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
					<p>{{$error}}</p>
					@endforeach
				</div>
				@endif
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>

				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="{{route('user.signup')}}" class="btn btn-lg btn-primary btn-block">Register</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>


@endsection
