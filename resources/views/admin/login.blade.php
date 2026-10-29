<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#17352c">
        <title>دخول الإدارة | مدرسة الخنساء</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen flex-col items-center justify-center bg-sand-50 px-5 py-12 text-brand-950 antialiased dark:bg-brand-950 dark:text-sand-50">
        <main class="my-auto w-full max-w-md">
            <a href="{{ route('home') }}" class="mx-auto flex w-fit items-center gap-3">
                <span class="grid size-12 place-items-center rounded-2xl bg-brand-800 text-gold-400 shadow-lg shadow-brand-900/10 dark:bg-brand-700">
                    <svg viewBox="0 0 32 32" class="size-7" fill="none" aria-hidden="true">
                        <path d="m5 18 2-6a3 3 0 0 1 2.8-2h12.4a3 3 0 0 1 2.8 2l2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M4 18h24v6H4zM8 24v2m16-2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="21" r="1" fill="currentColor"/><circle cx="23" cy="21" r="1" fill="currentColor"/>
                    </svg>
                </span>
                <span>
                    <span class="block text-lg font-extrabold text-brand-900 dark:text-white">مدرسة الخنساء</span>
                    <span class="mt-1 block text-xs font-medium text-brand-600 dark:text-brand-200">دخول لوحة الإدارة</span>
                </span>
            </a>

            <section class="mt-9 rounded-3xl border border-brand-900/10 bg-white p-7 shadow-xl shadow-brand-950/5 sm:p-9 dark:border-white/10 dark:bg-brand-900">
                <div>
                    <h1 class="text-2xl font-extrabold text-brand-950 dark:text-white">مرحبًا بعودتك</h1>
                    <p class="mt-2 leading-7 text-brand-700 dark:text-sand-200">سجّل الدخول لإدارة المحتوى والأسئلة النظرية.</p>
                </div>

                @if ($errors->any())
                    <div role="alert" class="mt-6 rounded-xl border border-red-500/20 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800 dark:border-red-300/20 dark:bg-red-950/40 dark:text-red-200">
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="mt-7 grid gap-5">
                    @csrf

                    <div>
                        <label for="email" class="mb-2 block text-sm font-bold text-brand-900 dark:text-sand-100">البريد الإلكتروني</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            dir="ltr"
                            class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3.5 text-left text-brand-950 outline-none transition placeholder:text-brand-500/70 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white"
                            placeholder="admin@example.com"
                        >
                        @error('email')
                            <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-bold text-brand-900 dark:text-sand-100">كلمة المرور</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            dir="ltr"
                            class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3.5 text-left text-brand-950 outline-none transition placeholder:text-brand-500/70 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white"
                            placeholder="••••••••••••"
                        >
                        @error('password')
                            <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="flex items-center gap-3 text-sm font-semibold text-brand-700 dark:text-sand-200">
                        <input type="checkbox" name="remember" value="1" class="size-4 rounded border-brand-900/20 accent-brand-700">
                        تذكرني على هذا الجهاز
                    </label>

                    <button type="submit" class="mt-1 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-800 px-5 py-3.5 font-extrabold text-white shadow-lg shadow-brand-900/10 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                        تسجيل الدخول
                        <span aria-hidden="true">←</span>
                    </button>
                </form>

                <p class="mt-6 border-t border-brand-900/10 pt-5 text-center text-sm text-brand-600 dark:border-white/10 dark:text-sand-300">
                    الدخول مخصص لمشرفي المدرسة.
                    <a href="{{ route('home') }}" class="font-bold text-brand-700 underline decoration-brand-300 underline-offset-4 hover:text-brand-500 dark:text-gold-400">العودة إلى الموقع</a>
                </p>
            </section>
        </main>
        <footer class="mt-10 w-full border-t border-brand-900/10 pt-5 text-center text-brand-600 dark:border-white/10 dark:text-sand-300">
            @include('partials.developer-credit')
        </footer>
    </body>
</html>
