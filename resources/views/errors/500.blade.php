<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#17352c">
        <title>خطأ في الخادم | مدرسة الخنساء</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen flex-col items-center justify-center bg-sand-50 px-5 py-12 text-brand-950 antialiased dark:bg-brand-950 dark:text-sand-50">
        <main class="my-auto w-full max-w-xl text-center">
            <span class="mx-auto grid size-20 place-items-center rounded-3xl bg-brand-100 text-3xl font-extrabold text-brand-800 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">500</span>
            <h1 class="mt-7 text-3xl font-extrabold text-brand-950 dark:text-white">حدث خطأ غير متوقع</h1>
            <p class="mt-3 leading-8 text-brand-700 dark:text-sand-200">تعذّر إكمال طلبك الآن. حاول مرة أخرى بعد قليل.</p>
            <a href="{{ route('home') }}" class="mt-7 inline-flex items-center justify-center rounded-xl bg-brand-800 px-6 py-3.5 font-extrabold text-white transition hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                العودة إلى الصفحة الرئيسية
            </a>
        </main>
        <footer class="mt-10 w-full border-t border-brand-900/10 pt-5 text-center text-brand-600 dark:border-white/10 dark:text-sand-300">
            @include('partials.developer-credit')
        </footer>
    </body>
</html>
