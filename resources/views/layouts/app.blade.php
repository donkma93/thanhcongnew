<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tư Vấn Du Học') - Thành Công Edu</title>
    <meta name="description" content="@yield('meta_description', 'Thành Công Edu tư vấn du học và học bổng Hàn Quốc chuyên sâu cho học sinh, sinh viên Việt Nam.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Be Vietnam Pro', 'sans-serif'],
                    },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                        float: 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                        blob: 'blob 7s infinite',
                    },
                },
            },
        };
    </script>
    <style>
        .line-clamp-2,
        .line-clamp-3,
        .line-clamp-4 {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            -webkit-line-clamp: 2;
        }

        .line-clamp-3 {
            -webkit-line-clamp: 3;
        }

        .line-clamp-4 {
            -webkit-line-clamp: 4;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">
    @include('partials.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="{{ asset('assets/js/site.js') }}"></script>
</body>
</html>
