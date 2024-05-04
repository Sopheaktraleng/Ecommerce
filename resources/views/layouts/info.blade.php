<!DOCTYPE html>
<html lang="en">
	@include("includes.head")
	<body>
		@include("includes.header")
		@include("includes.nav")
		@yield("content")
		
		@include("includes.signup")
		@include("includes.footer")

		

	</body>
</html>
