<!DOCTYPE html>
<html lang="en">
	@include("includes.head")
	<body>
		@include("includes.header")
		@include("includes.nav")
        @include(" includes.slideshow")
		@include("includes.sidebar")
		@yield("content")

		@include("includes.signup")
		@include("includes.footer")

		

	</body>
</html>
