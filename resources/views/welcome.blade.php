<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ASCINALSS</title>
 
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
<script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app"> 
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> 
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
            </div>
        </div>
        </div>
    </body>
</html>
