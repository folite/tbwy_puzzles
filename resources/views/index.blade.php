<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我猜我猜我猜猜</title>
    <link rel="stylesheet" type="text/css" href="css/fullpage.min.css" />
    <script type="text/javascript" src="js/fullpage.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans TC', sans-serif;
        }

        h1 {
            margin: 0px auto;
            font-size:2cm;
        }
        h2 {
            margin: 0px auto;
        }

        .section {
            text-align: center;
        }

    </style>
</head>

<body>
    <div id="fullpage">
        @if($collection)
            @foreach($collection as $index => $item)
                <div class="section">
                    <h1>{{ $index + 1 }}.{{ $item["topic"] }}</h1>
                    <h2>{{ $item["way"] }}</h2>
                </div>
            @endforeach
        @endif

    </div>
    <script>
        new fullpage('#fullpage', {
            //options here
            autoScrolling: true,
            scrollHorizontally: true
        });

    </script>
</body>

</html>
