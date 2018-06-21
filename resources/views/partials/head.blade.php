<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel JWT Starter') }}</title>
<link rel="icon" type="image/x-icon" href="/favicon.ico">

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<!-- Scripts -->
<script type="text/javascript">
	window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>
<script type="text/javascript" src="js/app.js"></script>