<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CMS - PIC</title>
</head>
	@include('template.header')
<body data-theme="default" data-url="{{ url('/').'/' }}" id="body" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		@include('template.sidebar')
		<div class="main">
			@include('template.topnav')
			<main class="content">

				@yield('content')
			</main>
		</div>
	</div>
</body>
	@include('template.footer')
</html>
