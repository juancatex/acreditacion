 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
  
    <!-- Fonts --> 
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
    <style>
       html{
    background: url("background.jpg") no-repeat;
	background-size: cover;
    min-height: 100%;
}

body{
    background:none;
}

#advanced-search-form{
    background-color: #fff;
    max-width: 800px;
    margin: 10px auto 0;
    padding: 40px;
     /*color: #858b8e; */
    box-shadow: 6px 6px 6px rgba(0,0,0,0.2);
}

#advanced-search-form h2{
    padding-bottom: 20px;
    margin: 10px 20px;
    font-size: 24px;
}

#advanced-search-form hr{
    margin-top: 38px;
    margin-bottom: 54px;
    margin-left:3px;
    border: 1px solid #cccccc;

}

#advanced-search-form .form-group{
	/* margin-bottom: 20px;
    margin-left:20px;
	width: 46%;
    float:left;
    text-align: left; */
    margin-left: 20px;
    width: 95%;
    text-align: left;
}

#advanced-search-form .form-control{
    padding: 12px 20px;
    height: auto;
    border-radius: 2px;
}

#advanced-search-form .radio-inline{
    margin-left: 10px;
    margin-right: 10px;
}

#advanced-search-form .gender{
    width: 30%;
    margin-top: 30px;
    padding-left: 20px
    padding-top: 5px;
    padding-bottom: 5px;
}

#advanced-search-form .btn{
    width: 46%;
    margin: 20px auto 0;
    display: block;
    outline: none;
}
label{
    font-size: larger;    color: black;
}
@media screen and (max-width: 800px){
    #advanced-search-form .form-group{
        width: 45%;
    }

    #advanced-search-form{
        margin-top: 0;
    }
}

@media screen and (max-width: 560px){
    #advanced-search-form .form-group{
        width: 100%;
        margin-left: 0;
    }

    #advanced-search-form h2{
        text-align: center;
    }
}

       </style>
</head>
<body>
    <div id="app"> 
        <main class="py-4">
            @yield('contentacre')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="js/jquery.js" defer></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-storage.js"></script>
    <script>
        
        var firebaseConfig = {
            apiKey: "AIzaSyDr8bXp3nImPxjx9CaA53rD111-eh93skg",
            authDomain: "notifi-b4868.firebaseapp.com",
            databaseURL: "https://notifi-b4868.firebaseio.com",
            projectId: "notifi-b4868",
            storageBucket: "notifi-b4868.appspot.com",
            messagingSenderId: "846106323511",
            appId: "1:846106323511:web:1bea42013bcf12dc18edb2",
            measurementId: "G-K7HSGC0QSS"
        };

        firebase.initializeApp(firebaseConfig); 
        window.storage = firebase.storage();
    </script>
</body>
</html>
