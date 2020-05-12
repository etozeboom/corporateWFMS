<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !IE]>
<html dir="ltr" lang="en-US">
<![endif]-->
    
    <!-- START HEAD -->
    <head>
        
        <meta charset="UTF-8" />
        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
        
        <meta name="description" content="{{ (isset($meta_desc)) ? $meta_desc : ''}}">
		<meta name="keywords" content="{{ (isset($keywords)) ? $keywords : ''}}">
		
		
		<meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ (isset($title)) ? $title : 'title'}}</title>
        <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>
        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('settings.theme')) }}/images/favicon.ico" />
        <link rel="icon" type="image/x-icon" href="{{ asset(config('settings.theme')) }}/images/favicon.ico" />
        <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
        <!-- For iPad3 with retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset(config('settings.theme')) }}/apple-touch-icon-144x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset(config('settings.theme')) }}/apple-touch-icon-114x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset(config('settings.theme')) }}/apple-touch-icon-72x.png" />
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="{{ asset(config('settings.theme')) }}/apple-touch-icon-57x.png" />
        <!-- [favicon] end -->
        
        <!-- CSSs -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/reset.css" /> <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/style.css" /> <!-- MAIN THEME STYLESHEET -->
        <link rel="stylesheet" id="max-width-1024-css" href="{{ asset(config('settings.theme')) }}/css/max-width-1024.css" type="text/css" media="screen and (max-width: 1240px)" />
        <link rel="stylesheet" id="max-width-768-css" href="{{ asset(config('settings.theme')) }}/css/max-width-768.css" type="text/css" media="screen and (max-width: 987px)" />
        <link rel="stylesheet" id="max-width-480-css" href="{{ asset(config('settings.theme')) }}/css/max-width-480.css" type="text/css" media="screen and (max-width: 480px)" />
        <link rel="stylesheet" id="max-width-320-css" href="{{ asset(config('settings.theme')) }}/css/max-width-320.css" type="text/css" media="screen and (max-width: 320px)" />
        
        <!-- CSSs Plugin -->
        <link rel="stylesheet" id="buttons" href="{{ asset(config('settings.theme')) }}/css/buttons.css" type="text/css" media="all" />
        <!-- <link rel="stylesheet" id="cache-custom-css" href="{{ asset(config('settings.theme')) }}/css/cache-custom.css" type="text/css" media="all" /> -->
        <link rel="stylesheet" id="custom-css" href="{{ asset(config('settings.theme')) }}/css/datatables.css" type="text/css" media="all" />
	    
        <!-- FONTs -->
        <!-- <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" /> -->
        <link rel='stylesheet' href='{{ asset(config('settings.theme')) }}/css/font-awesome.css' type='text/css' media='all' />
        
        <!-- JAVASCRIPTs -->
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery-3.5.0.min.js"></script>
        
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/datatables.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/myscripts.js"></script>

    </head>
    <body class="no_js responsive {{ (Route::currentRouteName() ==  'home')  ? 'page_template_home_php' : ''}} stretched">
        
        <div id="wrapper" class="">
            
            <div id="header" class="">
                
                <div class=" inner">
                    
                    <div class="flexWrap">
                        <div id="logo" class="">
                            <a href="/" title="kotbaun"><img src="{{ asset(config('settings.theme')) }}/images/logo.png" title="kotbaun" alt="kotbaun" /></a>
                        </div>
                        <div id="sidebar_header" class="">
                            <div class="yit_text_quote">
                                <blockquote class="text_quote_quote">&#8220;Что за прелесть эти сказки!&#8221;</blockquote>
                                <cite class="text_quote_author">А.С. Пушкин</cite>
                            </div>
                        </div>
                    </div>
                    
                    <hr />
                     @yield('navigation')
                    <div id="header_shadow"></div>
                    <div id="menu_shadow"></div>
                </div>
                
            </div>
            <div id="primary" class="sidebar_{{ isset($bar) ? $bar : 'no'}}">
                <div class="inner ">
                    
                       @yield('bar')

                        @yield('content')
                </div>
            </div>
            
            @yield('footer')
            
        </div> 
        
    </body>
</html>