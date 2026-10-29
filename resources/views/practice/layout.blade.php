<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#17352c">
        <meta name="description" content="تدرّب مجانًا على أسئلة القيادة النظرية في مدرسة الخنساء.">
        <title>@yield('title', 'التدريب النظري') | مدرسة الخنساء</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-sand-50 text-brand-950 antialiased dark:bg-brand-950 dark:text-sand-50">
        <header class="border-b border-brand-900/10 bg-white dark:border-white/10 dark:bg-brand-900">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-5 px-5 py-4 sm:px-8 lg:px-10">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <span class="grid size-11 place-items-center rounded-2xl bg-brand-800 text-gold-400 dark:bg-brand-700">
                        <svg viewBox="0 0 32 32" class="size-6" fill="none" aria-hidden="true">
                            <path d="m5 18 2-6a3 3 0 0 1 2.8-2h12.4a3 3 0 0 1 2.8 2l2 6M4 18h24v6H4zM8 24v2m16-2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span>
                        <span class="block font-extrabold text-brand-900 dark:text-white">مدرسة الخنساء</span>
                        <span class="mt-1 block text-xs text-brand-600 dark:text-brand-200">التدريب على الأسئلة النظرية</span>
                    </span>
                </a>
                <a href="{{ route('home') }}" class="rounded-xl px-3 py-2 text-sm font-bold text-brand-700 transition hover:bg-brand-50 dark:text-sand-200 dark:hover:bg-white/10">العودة إلى الرئيسية</a>
            </div>
        </header>

        <main class="mx-auto max-w-5xl px-5 py-9 sm:px-8 sm:py-12 lg:px-10">
            @if (session('error'))
                <div role="alert" class="mb-6 rounded-2xl border border-red-700/20 bg-red-50 px-5 py-4 font-bold text-red-800 dark:border-red-300/20 dark:bg-red-950/30 dark:text-red-200">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div role="alert" class="mb-6 rounded-2xl border border-red-700/20 bg-red-50 px-5 py-4 text-red-800 dark:border-red-300/20 dark:bg-red-950/30 dark:text-red-200">
                    <p class="font-bold">يرجى مراجعة الإجابات والتأكد من اختيار إجابة لكل سؤال.</p>
                    @foreach ($errors->all() as $error)
                        <p class="mt-2 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @yield('content')
        </main>
        <footer class="mt-auto border-t border-brand-900/10 px-5 py-5 text-center text-brand-600 dark:border-white/10 dark:text-sand-300 sm:px-8">
            @include('partials.developer-credit')
        </footer>
        @stack('scripts')
    </body>
</html>
