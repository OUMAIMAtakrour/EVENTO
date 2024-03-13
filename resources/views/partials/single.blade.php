<!DOCTYPE html>
<html lang="en">

<head>
<link rel="canonical" href="https://https://demo.themesberg.com/landwind/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landwind - Tailwind CSS Landing Page Demo</title>

    <!-- Meta SEO -->
    <meta name="title" content="Landwind - Tailwind CSS Landing Page">
    <meta name="description" content="Get started with a free and open-source landing page built with Tailwind CSS and the Flowbite component library.">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Themesberg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Social media share -->
    <meta property="og:title" content="Landwind - Tailwind CSS Landing Page">
    <meta property="og:site_name" content="Themesberg">
    <meta property="og:url" content="https://https://demo.themesberg.com/landwind/">
    <meta property="og:description" content="Get started with a free and open-source landing page for Tailwind CSS built with the Flowbite component library featuring dark mode, hero sections, pricing cards, and more.">
    <meta property="og:type" content="">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/github/landwind/og-image.png">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@themesberg" />
    <meta name="twitter:creator" content="@themesberg" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="./output.css" rel="stylesheet">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>
<style>
    .flip-card-inner {
        /* position: relative; */
        height: auto;
        border-radius: 20px;
        box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.45);
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }


    .flipcard,
    .flip-card-back {
        height: auto;
        position: absolute;

        -webkit-backface-visibility: hidden;
        /* Safari */
        backface-visibility: hidden;
    }




    .flip-card-back {

        transform: rotateY(180deg);
    }
</style>

<body>
    <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
        <!-- Pricing Card -->
        @foreach ($events as $event)


        <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
            <h3 class="mb-4 text-2xl font-semibold">{{$event->event_title}}</h3>
            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best option for personal use & for your next project.</p>
            <div class="flex items-baseline justify-center my-8">
                <span class="mr-2 text-5xl font-extrabold">category</span>

            </div>
            <!-- List -->
            <ul role="list" class="mb-8 space-y-4 text-left">

                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>{{$event->description}}</span>
                </li>
                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Available seats: <span class="font-semibold">{{$event->available_seats}}</span></span>
                </li>
                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Localisation: <span class="font-semibold">{{$event->place}}</span></span>
                </li>
                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Date: <span class="font-semibold">{{$event->created_at}}</span></span>
                </li>
            </ul>
            <form method="POST" action="{{ route('store', ['event' => $event->id]) }}" class="col-10 mx-auto my-4" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="client" value="{{ Auth::user()->clients->id }}">
                <input type="hidden" name="event" value="{{ $event->id }}">

                <button type="submit" name="reserve" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">
                    RESERVE
                </button>

        </div>
        </form>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>