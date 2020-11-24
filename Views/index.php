<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.6.2/tailwind.min.css" integrity="sha512-mZ+ZnjWE+WxIG8b8Ilysrfq7stpTrGu53lofHJbhuIe6iYmURmoXlZ4ycMN7qQoMhR3qWzVXF/q4N4UKfwmZeQ==" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="/assets/css/style.css">
    <title>FlexCore</title>
</head>

<body>

    <div id="App">
        <div class="w-100">
            <img class="" src="/assets/img/logo-01.png" alt="Woman paying for a purchase">
        </div>
        <div class="">
            <div class="text-2xl leading-2 tracking-wider uppercase text-blue-600 font-bold mb-3 main-label">FlexCore</div>
            <div class="block mt-1 text-md leading-tight font-light text-gray-900 mb-3">
                <ul class="d-flex justify-content-md-between links">
                    <li class="link text-blue-400" data-goto="{base}/Homepage">Homepage</li>
                    <li class="link text-blue-400" data-goto="{base}/Docs">Docs</li>
                    <li class="link text-blue-400" data-goto="{base}/Examples">Examples</li>
                    <li class="link text-blue-400" data-goto="{base}/Repository">Repository</li>
                </ul>
            </div>
            <p class="mt-2 text-white text-center">
                Get right up on your feet with an easy to use PHP Micro Framework with MVC like structure.<br /> And still do the hard work.
            </p>
            Export sent us: <?= var_dump($data); ?>
        </div>
    </div>

    <script type="text/javascript" src="/assets/js/app.js"></script>
</body>

</html>