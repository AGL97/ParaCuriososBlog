<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-color: #343a40;/*#343a40;*/
            display: flex;
        }

        main{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        img{
            display: block;
            position: relative;
            max-width: 2165px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .titulo{
            padding-top: 50px;
            padding-bottom: 50px;
            color: #FFFFFF;
            text-align: center;
        }
        .texto{
            text-align: justify;
            color: #FFFFFF;
            margin-top: 30px;            
        }
        
    </style>
</head>
    <body>
        <main>
            <img src="{{asset('storage/images/'.$card->imageRoute)}}" alt="imagen">
            <h1 class="titulo">{{$card->title}}</h1>
            <p class="texto">{{$card->description}}</p>
        </main>
    </body>    
</html>


