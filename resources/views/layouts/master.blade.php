<!doctype html>
<html lang="en">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71603745-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-71603745-3');
  </script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name','Photolinga') }}</title>
    <meta property="og:url"           content="https://Photolinga.com" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:500,600,300,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/autocomp.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset('vue2-autocomplete-js/dist/style/vue2-autocomplete.css')}}"> -->
    <!-- <link rel="stylesheet" href="vue2-autocomplete-js/dist/style/vue2-autocomplete.css"> -->

    <script>
      window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
</head>
<body>

<div id="app">
    @yield('content')

    @include('layouts.footer')

    <flash message="{{ session('flash') }}"></flash>

    <errors :errors="{{ $errors }}"></errors>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script>
<div id="fb-root"></div>

{{--  <script src="{{asset('js/dropzone.js')}}"></script>  --}}
<script type="text/javascript" src="{{asset('js/UploadImage.js')}}"></script>
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>
  (function( d, s, id ) {
    var js, fjs = d.getElementsByTagName(s)[ 0 ];
    if ( d.getElementById(id) ) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
    <!-- js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=123106857726295'; -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="/js/test.js"></script>
<script src="{{asset('js/Skill.js')}}"></script>
<script type="text/javascript">
    function unreadnotfication($id)
    {
        console.log($id);
        $.ajax({
        type:"GET",
        url: "/notifications",
        data: {"id":$id},
        success: function(data){
         // $(this).addClass("done");
         // alert(data);
    }
});
    }

var box_id = [];

function display(id) {
    var disp = ($(id).data('id'));

    if ($.inArray(disp, box_id) === -1) {
        box_id.push(disp);
    } else {
        box_id = box_id.filter(item => item !== disp);
    }
    console.log(box_id);

    if (box_id.length == 1) {
        console.log("Array lenght 1");
        $('#' + disp).css({ 'display': 'block', 'right': '5%' });

    } else if (box_id.length == 2) {
        console.log("Array lenght 2");

        $('#' + disp).css({ 'display': 'block', 'right': '360px' });
    }
    else if (box_id.length == 3) {
        console.log("Array lenght 2");

        $('#' + disp).css({ 'display': 'block', 'right': '800px' });
    }

}

function minimize(id) {
    var dataid = ($(id).parents('.chatbox').attr('id'));
    $('#' + dataid).css({ 'bottom': '-325px', 'z-index': '1!important' });
}

function maximize(id) {
    var dataid = ($(id).parents('.chatbox').attr('id'));
    $('#' + dataid).css({ 'bottom': '0', 'z-index': '1!important' });
}

// function closewindow(id) {
//     var dataid = ($(id).parents('.chatbox').attr('id'));
//     $('#' + dataid).css('display', 'none');
// }
function closewindow(id) {
    var dataid = ($(id).parents('.chatbox').attr('id'));
    var index = box_id.indexOf(dataid);
    box_id.splice(index, 1);
    $('#' + dataid).css('display', 'none');
    console.log(box_id);
}


// function openChat(id,convoId)
// {
//         <chatnav v-bind:conversation_id=id v-bind:id=convoId></chatnav>
//         var disp = ($(id).data('id'));

//     if ($.inArray(disp, box_id) === -1) {
//         box_id.push(disp);
//     } else {
//         box_id = box_id.filter(item => item !== disp);
//     }
//     console.log(box_id);

//     if (box_id.length == 1) {
//         $('#' + disp).css({ 'display': 'block', 'right': '5%' });

//     } else if (box_id.length == 2) {
//         $('#' + disp).css({ 'display': 'block', 'right': '360px' });
//     }
// }
</script>
</body>
</html>