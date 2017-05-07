<!DOCTYPE html>
<html lang="en">
  
  @include('partials._head')
  
  <body>
    	
		@include('partials._nav')

		<div class="container">

			@include('partials._message')

			@yield('content')

		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	@include('partials._foot')

    	@include('partials._javascript')

       @yield('scripts')
  </body>
</html>