<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Tasty Food')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Animation Config -->
    <script>
    tailwind.config = {
      theme: {
        extend: {
          keyframes: {
            fadeInLeft: {
              '0%': { opacity: '0', transform: 'translateX(-60px)' },
              '100%': { opacity: '1', transform: 'translateX(0)' },
            },
            fadeInRight: {
              '0%': { opacity: '0', transform: 'translateX(60px)' },
              '100%': { opacity: '1', transform: 'translateX(0)' },
            },
            fadeInUp: {
              '0%': { opacity: '0', transform: 'translateY(40px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            }
          },
          animation: {
            fadeInLeft: 'fadeInLeft 1s ease-out forwards',
            fadeInRight: 'fadeInRight 1s ease-out forwards',
            fadeInUp: 'fadeInUp 1s ease-out forwards',
          }
        }
      }
    }
    </script>

    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @stack('css')
</head>

<body class="bg-gray-100 text-black font-sans">

    @include('frontend.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.layouts.footer')

    @stack('js')
</body>
</html>