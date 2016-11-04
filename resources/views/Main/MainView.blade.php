<head>
    @include('layouts.link')
    @include('layouts.header')
</head>
<body>

@if(Session::has('m_info'))
   
    @if(Session::get('div_member') == 1)
        @include('Main.DesignerMain')
    @endif

    @if(Session::get('div_member') == 2)
        @include('Main.DeveloperMain')
    @endif

    @else
        @include('Main.MainPage')
@endif

</body>