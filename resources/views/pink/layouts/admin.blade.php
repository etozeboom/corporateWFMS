<!DOCTYPE html>

    
    <!-- START HEAD -->
    <head>
        
        <meta charset="UTF-8" />
		
        
        <title>{{ $title }}</title>
        
        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('settings.theme')) }}/images/favicon.ico" />
        
        <!-- CSSs -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/reset.css" /> <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/style.css" /> <!-- MAIN THEME STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/buttons.css" /> <!-- MAIN THEME STYLESHEET -->
        <!-- <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/jquery-ui.css" /> -->
        <link rel="stylesheet" id="custom-css" href="{{ asset(config('settings.theme')) }}/css/datatables.min.css" type="text/css" media="all" />
		
        <!-- FONTs -->
        <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
        <link rel='stylesheet' href='{{ asset(config('settings.theme')) }}/css/font-awesome.css' type='text/css' media='all' />
        
        <!-- JAVASCRIPTs -->
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery-3.5.0.min.js"></script>
        <!-- <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery-ui.js"></script> -->
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/bootstrap-filestyle.min.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/datatables.min.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/myscriptsadmin.js"></script>

    </head>
    
    <body class="no_js responsive {{ (Route::currentRouteName() == 'home') ? 'page_template_home_php' : ''}} stretched">
        
        <div class="bg_shadow">
            <div id="wrapper" class="">
                <div id="header" class="">
                    
                    <div class="inner">
                                                
							@yield('navigation')
                        <div id="menu_shadow"></div>
                    </div>
                    
                </div>
				
				@if (count($errors) > 0)
				    <div class="box error-box">
				        
				            @foreach ($errors->all() as $error)
				                <p>{{ $error }}</p>
				            @endforeach
				   
				    </div>
				@endif
				
				@if (session('status'))
				    <div class="box success-box">
				        {{ session('status') }}
				    </div>
				@endif
				
				@if (session('error'))
				    <div class="box error-box">
				        {{ session('error') }}
				    </div>
				@endif
				
				<div id="primary" class="sidebar_{{ isset($bar) ? $bar : 'no' }}">
				    <div class="inner">
												
				        
						@yield('content')
						
				    </div>
				</div>
                @yield('footer')
            </div>
        </div>
        
        
    </body>
</html>