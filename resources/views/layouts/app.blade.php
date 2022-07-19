<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>@yield('page_name')</title>
		@yield('custom_header')
	</head>
	<body>
            <div id="app">
                @yield('content')
            </div>
		    @yield('custom_footer')
	</body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
