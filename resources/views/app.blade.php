<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>

    <!-- Scripts -->
    <script type="text/javascript">
		window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>