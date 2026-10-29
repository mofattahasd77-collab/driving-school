<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#17352c">
        <meta name="description" content="مدرسة الخنساء لتعليم القيادة. تعلّم أساسيات السيارة وقواعد الطريق ومهارات القيادة العملية بثقة وأمان.">

        <title>مدرسة الخنساء لتعليم القيادة</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-sand-50 text-brand-950 antialiased dark:bg-brand-950 dark:text-sand-50">
        <div class="bg-brand-900 px-4 py-2.5 text-center text-sm font-medium text-white dark:bg-black">
            طريقك إلى القيادة يبدأ بخطوة واثقة
            <a href="#training-fields" class="mx-1 inline-flex items-center gap-1 font-bold text-gold-400 underline decoration-gold-400/50 underline-offset-4 transition hover:text-white">
                اكتشف مجالات التعلّم
                <span aria-hidden="true">←</span>
            </a>
        </div>

        <header class="sticky top-0 z-30 border-b border-brand-900/5 bg-sand-50/95 backdrop-blur-xl dark:border-white/10 dark:bg-brand-950/95">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-4 sm:px-8 lg:px-10">
                <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3" aria-label="مدرسة الخنساء - الرئيسية">
                    <span class="grid size-12 place-items-center rounded-2xl bg-brand-800 text-gold-400 shadow-lg shadow-brand-900/10 dark:bg-brand-700">
                        <svg viewBox="0 0 32 32" class="size-7" fill="none" aria-hidden="true">
                            <path d="m5 18 2-6a3 3 0 0 1 2.8-2h12.4a3 3 0 0 1 2.8 2l2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4 18h24v6H4zM8 24v2m16-2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="9" cy="21" r="1" fill="currentColor"/><circle cx="23" cy="21" r="1" fill="currentColor"/>
                        </svg>
                    </span>
                    <span class="leading-tight">
                        <span class="block text-lg font-extrabold tracking-tight text-brand-900 dark:text-white">مدرسة الخنساء</span>
                        <span class="mt-1 block text-xs font-medium text-brand-600 dark:text-brand-200">لتعليم قيادة السيارات</span>
                    </span>
                </a>

                <nav aria-label="التنقل الرئيسي" class="hidden items-center gap-8 lg:flex">
                    <a href="#about" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">عن المدرسة</a>
                    <a href="#training-fields" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">مجالات التعلّم</a>
                    <a href="{{ route('practice.index') }}" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">تدرّب على الأسئلة</a>
                    <a href="#journey" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">خطواتك</a>
                    <a href="#location" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">موقع المدرسة</a>
                    <a href="#faq" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">الأسئلة الشائعة</a>
                </nav>

                <div class="hidden items-center gap-3 lg:flex">
                    <a href="#training-fields" class="inline-flex items-center justify-center gap-2 rounded-full bg-brand-800 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-brand-900/10 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                        اكتشف ما ستتعلمه
                        <span aria-hidden="true">←</span>
                    </a>
                </div>

                <details class="relative lg:hidden">
                    <summary class="grid size-11 cursor-pointer place-items-center rounded-xl border border-brand-900/10 text-brand-800 transition hover:bg-brand-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 dark:border-white/15 dark:text-white dark:hover:bg-white/10" aria-label="فتح قائمة التنقل">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </summary>
                    <nav aria-label="التنقل للجوال" class="absolute left-0 top-14 flex w-64 flex-col gap-1 rounded-2xl border border-brand-900/10 bg-white p-3 shadow-xl dark:border-white/10 dark:bg-brand-900">
                        <a href="#about" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">عن المدرسة</a>
                        <a href="#training-fields" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">مجالات التعلّم</a>
                        <a href="{{ route('practice.index') }}" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">تدرّب على الأسئلة</a>
                        <a href="#journey" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">خطواتك</a>
                        <a href="#location" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">موقع المدرسة</a>
                        <a href="#faq" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">الأسئلة الشائعة</a>
                        <a href="#training-fields" class="mt-1 rounded-xl bg-brand-800 px-4 py-3 text-center font-bold text-white dark:bg-gold-400 dark:text-brand-950">اكتشف ما ستتعلمه</a>
                    </nav>
                </details>
            </div>
        </header>

        <main>
            <section class="relative isolate overflow-hidden bg-sand-100 dark:bg-brand-900">
                <div class="pointer-events-none absolute -right-36 -top-32 -z-10 size-[30rem] rounded-full bg-brand-200/40 blur-3xl dark:bg-brand-500/10"></div>
                <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 py-14 sm:px-8 sm:py-20 lg:grid-cols-2 lg:gap-16 lg:px-10 lg:py-24">
                    <div class="max-w-xl">
                        <span class="inline-flex items-center gap-2 rounded-full border border-brand-800/10 bg-white/70 px-4 py-2 text-sm font-bold text-brand-700 shadow-sm dark:border-white/10 dark:bg-white/5 dark:text-gold-400">
                            <span class="size-2 rounded-full bg-gold-500"></span>
                            تعلّم يقودك إلى الاستقلال
                        </span>
                        <h1 class="mt-7 text-4xl leading-[1.25] font-extrabold tracking-tight text-brand-950 sm:text-5xl lg:text-6xl dark:text-white">
                            ثقتك خلف المقود
                            <span class="relative mt-1 inline-block text-brand-600 dark:text-gold-400">
                                تبدأ من هنا
                                <svg class="absolute -bottom-2 right-0 h-3 w-full text-gold-400" viewBox="0 0 250 12" fill="none" aria-hidden="true">
                                    <path d="M3 9C67 2 164-1 247 6" stroke="currentColor" stroke-width="5" stroke-linecap="round"/>
                                </svg>
                            </span>
                        </h1>
                        <p class="mt-7 max-w-lg text-lg leading-9 text-brand-700 dark:text-sand-200">
                            تعلّم القيادة خطوة بخطوة، من أساسيات الطريق إلى مهارات القيادة بثقة وأمان، مع تدريب يراعي مستواك واحتياجاتك.
                        </p>
                        <div class="mt-9 flex flex-wrap items-center gap-4">
                            <a href="#training-fields" class="inline-flex items-center justify-center gap-3 rounded-full bg-brand-800 px-7 py-4 font-bold text-white shadow-xl shadow-brand-900/15 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                                اكتشف مجالات التعلّم
                                <span aria-hidden="true">←</span>
                            </a>
                            <a href="#journey" class="inline-flex items-center gap-2 rounded-full px-4 py-3 font-bold text-brand-800 transition hover:bg-white/70 dark:text-sand-100 dark:hover:bg-white/10">
                                <span class="grid size-9 place-items-center rounded-full border border-brand-800/15 dark:border-white/20">
                                    <svg class="size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M5.5 3.8v8.4L12 8l-6.5-4.2Z"/></svg>
                                </span>
                                كيف نبدأ؟
                            </a>
                        </div>
                        <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-brand-900/10 pt-6 text-sm font-semibold text-brand-700 dark:border-white/10 dark:text-sand-200">
                            <span class="inline-flex items-center gap-2"><span class="text-gold-500">✓</span> تدريب نظري وعملي</span>
                            <span class="inline-flex items-center gap-2"><span class="text-gold-500">✓</span> مسارات تناسب مستواك</span>
                        </div>
                    </div>

                    <div class="relative mx-auto w-full max-w-xl lg:mr-auto">
                        <div class="absolute -inset-4 rotate-3 rounded-[2.5rem] bg-gold-400/35"></div>
                        <div class="relative h-[390px] overflow-hidden rounded-[2rem] shadow-2xl shadow-brand-950/20 sm:h-[480px]">
                            <img
                                src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=1200&q=85"
                                alt="متدربة تتعلم القيادة داخل السيارة"
                                class="size-full object-cover"
                                fetchpriority="high"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-950/70 via-brand-950/5 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-7 text-white sm:p-9">
                                <span class="text-sm font-bold text-gold-400">خطوة بخطوة، وبإيقاعك</span>
                                <p class="mt-2 text-2xl font-extrabold">تعلّم مريح. قيادة واثقة.</p>
                            </div>
                            <div class="absolute right-5 top-5 flex items-center gap-3 rounded-2xl border border-white/40 bg-white/90 p-3.5 shadow-lg backdrop-blur-sm sm:right-7 sm:top-7">
                                <span class="grid size-11 place-items-center rounded-xl bg-brand-800 text-gold-400">
                                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M12 3.5 14.7 9l6.1.9-4.4 4.3 1 6-5.4-2.8-5.4 2.8 1-6-4.4-4.3 6.1-.9L12 3.5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <span class="pl-1">
                                    <span class="block text-sm font-extrabold text-brand-900">أمانك أولويتنا</span>
                                    <span class="mt-0.5 block text-xs font-medium text-brand-700">تعلّم بثقة من أول درس</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="practice" class="scroll-mt-24 overflow-hidden bg-sand-100 py-20 sm:py-24 dark:bg-brand-900">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="relative isolate overflow-hidden rounded-[2rem] bg-brand-900 px-6 py-10 text-white sm:px-10 sm:py-14 lg:px-14 dark:bg-black">
                        <div class="pointer-events-none absolute -left-20 -top-24 -z-10 size-72 rounded-full bg-gold-400/15 blur-3xl"></div>
                        <div class="grid items-center gap-10 lg:grid-cols-[1fr_auto]">
                            <div class="max-w-2xl">
                                <span class="inline-flex items-center gap-2 rounded-full border border-gold-400/30 bg-white/5 px-4 py-2 text-sm font-bold text-gold-400">
                                    <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 4h8M8 2h8v4H8zM6 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1M7 12l3 3 7-7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    تدريب نظري مجاني
                                </span>
                                <h2 class="mt-5 text-3xl leading-tight font-extrabold sm:text-4xl">استعد للاختبار النظري، سؤالًا بعد سؤال</h2>
                                <p class="mt-4 max-w-xl leading-8 text-sand-200">اختبر معلوماتك في قواعد المرور والسلامة عبر 30 سؤالًا عشوائيًا: 10 أسئلة نظرية، و10 ميكانيكية، و10 عن الإشارات. لا حاجة إلى إنشاء حساب.</p>
                                <ul class="mt-6 flex flex-wrap gap-x-6 gap-y-3 text-sm font-semibold text-sand-100">
                                    <li class="inline-flex items-center gap-2"><span class="text-gold-400" aria-hidden="true">✓</span> أسئلة متنوعة مع صور</li>
                                    <li class="inline-flex items-center gap-2"><span class="text-gold-400" aria-hidden="true">✓</span> أربعة خيارات لكل سؤال</li>
                                    <li class="inline-flex items-center gap-2"><span class="text-gold-400" aria-hidden="true">✓</span> النتيجة مع مراجعة الإجابات</li>
                                </ul>
                            </div>
                            <a href="{{ route('practice.index') }}" class="inline-flex items-center justify-center gap-3 justify-self-start rounded-full bg-gold-400 px-7 py-4 font-extrabold text-brand-950 shadow-lg transition hover:-translate-y-0.5 hover:bg-gold-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-brand-900 lg:justify-self-end">
                                ابدأ التدريب الآن
                                <span aria-hidden="true">←</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section aria-label="مجالات التدريب" class="border-y border-brand-900/5 bg-white dark:border-white/10 dark:bg-brand-950">
                <div class="mx-auto grid max-w-7xl divide-y divide-brand-900/10 px-5 sm:px-8 md:grid-cols-3 md:divide-x md:divide-y-0 md:divide-brand-900/10 lg:px-10 dark:divide-white/10">
                    <div class="flex items-center gap-4 py-6 md:px-7 md:py-7">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-700 dark:bg-white/10 dark:text-gold-400">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V5m0 14h16M7 15l4-4 3 2 5-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span><span class="block font-extrabold text-brand-900 dark:text-white">تدريب حسب مستواك</span><span class="mt-1 block text-sm text-brand-600 dark:text-sand-300">من أول تجربة حتى تعزيز المهارات</span></span>
                    </div>
                    <div class="flex items-center gap-4 py-6 md:px-7 md:py-7">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-700 dark:bg-white/10 dark:text-gold-400">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v3m0 12v3M4.2 7.2l2.1 2.1m11.4 5.4 2.1 2.1M3 12h3m12 0h3m-16.8 4.8 2.1-2.1m11.4-5.4 2.1-2.1M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </span>
                        <span><span class="block font-extrabold text-brand-900 dark:text-white">سلامة قبل كل شيء</span><span class="mt-1 block text-sm text-brand-600 dark:text-sand-300">وعي بالطريق ومهارات قيادة آمنة</span></span>
                    </div>
                    <div class="flex items-center gap-4 py-6 md:px-7 md:py-7">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-700 dark:bg-white/10 dark:text-gold-400">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-3.5 7-9V5l-7-2-7 2v7c0 5.5 7 9 7 9Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span><span class="block font-extrabold text-brand-900 dark:text-white">تعلّم بثقة وراحة</span><span class="mt-1 block text-sm text-brand-600 dark:text-sand-300">بيئة مشجعة في كل مرحلة</span></span>
                    </div>
                </div>
            </section>

            <section id="about" class="scroll-mt-24 bg-sand-50 py-20 sm:py-28 dark:bg-brand-950">
                <div class="mx-auto grid max-w-7xl items-center gap-14 px-5 sm:px-8 lg:grid-cols-2 lg:gap-20 lg:px-10">
                    <div class="relative mx-auto w-full max-w-lg">
                        <div class="absolute -bottom-5 -right-5 size-40 rounded-[2rem] bg-gold-400/35"></div>
                        <div class="relative h-[350px] overflow-hidden rounded-[2rem] sm:h-[440px]">
                            <img
                                src="https://s3-eu-west-2.amazonaws.com/ezlicence-uk-production-uploads/blog_posts/featured_images/000/000/006/md/usa-1-.jpeg"
                                alt="التدرب على القيادة والتحكم بمقود السيارة"
                                class="size-full object-cover"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-950/35 to-transparent"></div>
                            <div class="absolute bottom-5 right-5 rounded-2xl bg-white/95 px-5 py-4 shadow-xl backdrop-blur-sm dark:bg-brand-900/95">
                                <span class="block text-sm font-bold text-brand-600 dark:text-brand-200">مهارة تُبنى مع كل درس</span>
                                <span class="mt-1 block text-lg font-extrabold text-brand-900 dark:text-white">الطريق يبدأ بالتعلّم</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">عن مدرسة الخنساء</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">
                            أكثر من تعلّم القيادة،
                            <span class="text-brand-600 dark:text-gold-400">إنها بداية استقلالك</span>
                        </h2>
                        <p class="mt-6 text-lg leading-9 text-brand-700 dark:text-sand-200">
                            نؤمن أن القيادة مهارة تُكتسب بالتدرّج والممارسة. لذلك صممنا تجربة تدريبية تجمع بين فهم قواعد الطريق والتطبيق العملي، لتتقدم بثبات من أول درس وحتى الاستعداد للقيادة بمفردك.
                        </p>
                        <ul class="mt-7 grid gap-4 sm:grid-cols-2">
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">شرح واضح وسهل</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">تدرّج يناسب خبرتك</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">تركيز على السلامة</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">تدريب عملي واقعي</span>
                            </li>
                        </ul>
                        <a href="#journey" class="mt-8 inline-flex items-center gap-2 font-extrabold text-brand-700 transition hover:gap-4 dark:text-gold-400">
                            تعرّف على خطوات التعلّم
                            <span aria-hidden="true">←</span>
                        </a>
                    </div>
                </div>
            </section>

            <section id="training-fields" class="scroll-mt-24 bg-brand-900 py-20 sm:py-28 dark:bg-black">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="mx-auto max-w-2xl text-center">
                        <span class="text-sm font-extrabold tracking-wide text-gold-400">مهارات تبني ثقتك</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-white sm:text-4xl">مجالات التعلّم في مدرسة الخنساء</h2>
                        <p class="mt-4 leading-8 text-sand-200">تعلّم أساسيات القيادة ومعرفة الطريق، ثم انتقل إلى التطبيق العملي بخطوات واضحة تناسب خبرتك.</p>
                    </div>

                    <div class="mt-12 grid gap-5 md:grid-cols-3">
                        <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.06] p-7 transition duration-300 hover:-translate-y-1 hover:border-gold-400/50 hover:bg-white/[0.09] sm:p-8">
                            <span class="grid size-14 place-items-center rounded-2xl bg-gold-400 text-brand-950">
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 11h14l2 4v4H3v-4l2-4Zm2 0 1.5-5h7L17 11M6 19v2m12-2v2M6.5 15h.01M17.5 15h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <h3 class="mt-7 text-xl font-extrabold text-white">أساسيات السيارة والتحكّم</h3>
                            <p class="mt-3 leading-8 text-sand-200">تعرّف على تجهيز السيارة، ووضعية القيادة، والتحكّم بالمقود والسرعة والتوقف بأمان.</p>
                        </article>

                        <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.06] p-7 transition duration-300 hover:-translate-y-1 hover:border-gold-400/50 hover:bg-white/[0.09] sm:p-8">
                            <span class="grid size-14 place-items-center rounded-2xl bg-gold-400 text-brand-950">
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 3.5 20h17L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M12 9v5m0 3h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            </span>
                            <h3 class="mt-7 text-xl font-extrabold text-white">قواعد الطريق والإشارات</h3>
                            <p class="mt-3 leading-8 text-sand-200">افهم إشارات المرور وأولويات الطريق وقواعد السلامة، واستعد للاختبار النظري بثقة.</p>
                            <a href="{{ route('practice.index') }}" class="mt-5 inline-flex items-center gap-2 font-bold text-gold-400 transition group-hover:gap-4">
                                تدرّب على الأسئلة <span aria-hidden="true">←</span>
                            </a>
                        </article>

                        <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.06] p-7 transition duration-300 hover:-translate-y-1 hover:border-gold-400/50 hover:bg-white/[0.09] sm:p-8">
                            <span class="grid size-14 place-items-center rounded-2xl bg-gold-400 text-brand-950">
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 17.5 12 5l9 12.5M7 12h10M5.5 16h13M12 5v14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <h3 class="mt-7 text-xl font-extrabold text-white">التطبيق العملي على الطريق</h3>
                            <p class="mt-3 leading-8 text-sand-200">طبّق ما تعلّمته في مواقف القيادة اليومية، وطوّر مهارات المناورة والاصطفاف والتعامل مع الطريق.</p>
                        </article>
                    </div>

                    <div class="mt-10 text-center">
                        <a href="#journey" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 px-6 py-3 font-bold text-white transition hover:bg-white hover:text-brand-950 focus:outline-none focus-visible:ring-2 focus-visible:ring-gold-400 focus-visible:ring-offset-2 focus-visible:ring-offset-brand-900">
                            تعرّف على خطوات التعلّم <span aria-hidden="true">←</span>
                        </a>
                    </div>
                </div>
            </section>

            <section id="journey" class="scroll-mt-24 bg-sand-100 py-20 sm:py-28 dark:bg-brand-900">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="mx-auto max-w-2xl text-center">
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">رحلتك معنا</span>
                        <h2 class="mt-4 text-3xl font-extrabold text-brand-950 sm:text-4xl dark:text-white">ثلاث خطوات نحو قيادة أكثر ثقة</h2>
                        <p class="mt-4 leading-8 text-brand-700 dark:text-sand-200">تجربة واضحة من البداية، حتى تعرف ما الذي ينتظرك في كل مرحلة.</p>
                    </div>

                    <div class="relative mt-14 grid gap-8 md:grid-cols-3 md:gap-6">
                        <div class="pointer-events-none absolute right-[17%] left-[17%] top-8 hidden border-t-2 border-dashed border-brand-300 md:block dark:border-brand-500"></div>
                        <article class="relative text-center">
                            <span class="relative mx-auto grid size-16 place-items-center rounded-2xl border-4 border-sand-100 bg-brand-800 text-xl font-extrabold text-gold-400 shadow-lg dark:border-brand-900">١</span>
                            <h3 class="mt-6 text-xl font-extrabold text-brand-900 dark:text-white">تعرّف على مستواك</h3>
                            <p class="mx-auto mt-3 max-w-xs leading-8 text-brand-700 dark:text-sand-200">ابدأ بتحديد خبرتك وما تطمح إلى تعلمه، لتكون نقطة البداية واضحة.</p>
                        </article>
                        <article class="relative text-center">
                            <span class="relative mx-auto grid size-16 place-items-center rounded-2xl border-4 border-sand-100 bg-brand-800 text-xl font-extrabold text-gold-400 shadow-lg dark:border-brand-900">٢</span>
                            <h3 class="mt-6 text-xl font-extrabold text-brand-900 dark:text-white">تدرّب خطوة بخطوة</h3>
                            <p class="mx-auto mt-3 max-w-xs leading-8 text-brand-700 dark:text-sand-200">اجمع بين معرفة قواعد القيادة والتطبيق العملي على الطريق.</p>
                        </article>
                        <article class="relative text-center">
                            <span class="relative mx-auto grid size-16 place-items-center rounded-2xl border-4 border-sand-100 bg-brand-800 text-xl font-extrabold text-gold-400 shadow-lg dark:border-brand-900">٣</span>
                            <h3 class="mt-6 text-xl font-extrabold text-brand-900 dark:text-white">تقدّمي بثقة</h3>
                            <p class="mx-auto mt-3 max-w-xs leading-8 text-brand-700 dark:text-sand-200">راجع مهاراتك، وواصل التدرّب حتى تصل إلى هدفك بثبات.</p>
                        </article>
                    </div>
                    <div class="mt-12 text-center">
                        <a href="#training-fields" class="inline-flex items-center justify-center gap-2 rounded-full border border-brand-800/20 px-6 py-3 font-bold text-brand-800 transition hover:bg-brand-800 hover:text-white dark:border-white/20 dark:text-white dark:hover:bg-white dark:hover:text-brand-950">
                            تعرّف على مجالات التعلّم <span aria-hidden="true">←</span>
                        </a>
                    </div>
                </div>
            </section>

            <section class="bg-sand-50 py-20 sm:py-28 dark:bg-brand-950">
                <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 lg:grid-cols-2 lg:gap-16 lg:px-10">
                    <div>
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">تجربة تدريبية تناسبك</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">تعلّم في بيئة تمنحك مساحة للتقدّم</h2>
                        <p class="mt-5 leading-8 text-brand-700 dark:text-sand-200">لا توجد وتيرة واحدة تناسب الجميع. ركّز على كل مهارة، اطرح أسئلتك، وخذ الوقت الذي تحتاجه لتصبح أكثر ارتياحًا خلف المقود.</p>
                        <div class="mt-8 grid gap-5 sm:grid-cols-2">
                            <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-white/5">
                                <span class="text-2xl text-gold-500">✳</span>
                                <h3 class="mt-3 font-extrabold text-brand-900 dark:text-white">تعلّم دون استعجال</h3>
                                <p class="mt-2 text-sm leading-7 text-brand-700 dark:text-sand-200">تدرّج من المهارات البسيطة إلى مواقف القيادة الأكثر تحديًا.</p>
                            </div>
                            <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-white/5">
                                <span class="text-2xl text-gold-500">✳</span>
                                <h3 class="mt-3 font-extrabold text-brand-900 dark:text-white">فهم قبل التطبيق</h3>
                                <p class="mt-2 text-sm leading-7 text-brand-700 dark:text-sand-200">تعرّف على قواعد الطريق وأساسيات السلامة مع كل مهارة جديدة.</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute -inset-4 rounded-[2rem] bg-brand-100 dark:bg-brand-900"></div>
                        <img
                            src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1200&q=85"
                            alt="سيارة على طريق مفتوح"
                            class="relative h-[350px] w-full rounded-[1.5rem] object-cover shadow-xl sm:h-[440px]"
                            loading="lazy"
                        >
                        <div class="absolute bottom-6 right-6 max-w-xs rounded-2xl bg-white/95 p-5 shadow-xl backdrop-blur dark:bg-brand-900/95">
                            <p class="font-extrabold text-brand-900 dark:text-white">كل رحلة تبدأ بالتعلّم</p>
                            <p class="mt-1 text-sm leading-6 text-brand-700 dark:text-sand-200">تدرّب على مهارات تبقى معك في كل طريق.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="faq" class="scroll-mt-24 bg-white py-20 sm:py-28 dark:bg-brand-900">
                <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20 lg:px-10">
                    <div>
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">الأسئلة الشائعة</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">إجابات تساعدك على البدء</h2>
                        <p class="mt-5 leading-8 text-brand-700 dark:text-sand-200">لم تجد إجابة سؤالك؟ تعرّف على مجالات التعلّم أو تواصل معنا لمساعدتك.</p>
                        <a href="#training-fields" class="mt-6 inline-flex items-center gap-2 font-extrabold text-brand-700 transition hover:gap-4 dark:text-gold-400">تعرّف على مجالات التعلّم <span aria-hidden="true">←</span></a>
                    </div>
                    <div class="divide-y divide-brand-900/10 dark:divide-white/10">
                        <details class="group py-5" open>
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                هل أحتاج إلى خبرة سابقة للالتحاق؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">لا، يمكنك البدء من الأساسيات حتى لو لم يسبق لك قيادة السيارة. نساعدك على التدرّج وفق مستواك واحتياجاتك.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                كيف أعرف من أين أبدأ؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">تواصل مع المدرسة وشارك خبرتك واحتياجاتك، لمساعدتك على تحديد نقطة البداية المناسبة وخطوات التعلّم.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                ماذا يشمل التدريب؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">يجمع التعلّم بين أساسيات قواعد الطريق ومهارات القيادة العملية، مع التركيز على السلامة والتدرّج.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                هل يمكنني تطوير مهاراتي إذا كنت أعرف القيادة مسبقًا؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">نعم، يتضمن الموقع مسارًا لتطوير المهارات ومراجعة أساسيات القيادة لمن لديهم خبرة سابقة.</p>
                        </details>
                    </div>
                </div>
            </section>

            <section id="location" class="scroll-mt-24 bg-sand-50 py-20 sm:py-28 dark:bg-brand-950">
                <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16 lg:px-10">
                    <div>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">موقع مدرسة الخنساء</h2>
                        <p class="mt-5 leading-8 text-brand-700 dark:text-sand-200">يمكنك مشاهدة موقع المدرسة على الخريطة أو فتح الاتجاهات للوصول إليها.</p>
                        
                        <a
                            href="https://www.google.com/maps/search/?api=1&amp;query=34.766094%2C36.619479"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-6 inline-flex items-center justify-center gap-3 rounded-full bg-brand-800 px-6 py-3.5 font-bold text-white shadow-lg shadow-brand-900/10 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500"
                        >
                            افتح الاتجاهات في خرائط Google
                            <svg class="size-4" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                <path d="M6 3h7v7m0-7L5 11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11 9v4H3V5h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>

                    <div class="overflow-hidden rounded-[1.75rem] border border-brand-900/10 bg-sand-100 shadow-xl shadow-brand-950/10 dark:border-white/10 dark:bg-brand-900">
                        <iframe
                            title="خريطة موقع مدرسة الخنساء"
                            src="https://maps.google.com/maps?q=34.766094%2C36.619479&amp;z=15&amp;output=embed"
                            class="h-[360px] w-full sm:h-[440px]"
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </section>

            <section class="bg-sand-50 px-5 py-16 sm:px-8 sm:py-20 dark:bg-brand-950">
                <div class="relative mx-auto max-w-7xl overflow-hidden rounded-[2rem] bg-brand-800 px-7 py-12 sm:px-12 sm:py-14 lg:px-16 dark:bg-brand-900">
                    <div class="pointer-events-none absolute -left-16 -top-28 size-80 rounded-full border-[48px] border-white/5"></div>
                    <div class="pointer-events-none absolute -bottom-32 right-1/3 size-72 rounded-full bg-gold-400/10 blur-3xl"></div>
                    <div class="relative flex flex-col justify-between gap-8 lg:flex-row lg:items-center">
                        <div class="max-w-2xl">
                            <span class="text-sm font-bold text-gold-400">الخطوة الأولى أقرب مما تتخيل</span>
                            <h2 class="mt-3 text-3xl leading-tight font-extrabold text-white sm:text-4xl">هل أنت مستعد لرحلتك الأولى خلف المقود؟</h2>
                            <p class="mt-4 leading-8 text-sand-200">تعرّف على مجالات التعلّم، ثم تواصل معنا لتبدأ خطوتك الأولى بثقة.</p>
                        </div>
                        <a href="#training-fields" class="inline-flex shrink-0 items-center justify-center gap-3 self-start rounded-full bg-gold-400 px-7 py-4 font-extrabold text-brand-950 shadow-lg transition hover:-translate-y-0.5 hover:bg-gold-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-brand-800 lg:self-center">
                            اكتشف مجالات التعلّم
                            <span aria-hidden="true">←</span>
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-brand-950 text-white dark:bg-black">
            <div class="mx-auto max-w-7xl px-5 py-12 sm:px-8 lg:px-10">
                <div class="grid gap-10 border-b border-white/10 pb-10 sm:grid-cols-2 lg:grid-cols-[1.2fr_0.8fr_0.8fr_1.2fr]">
                    <div>
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                            <span class="grid size-11 place-items-center rounded-2xl bg-white/10 text-gold-400">
                                <svg viewBox="0 0 32 32" class="size-6" fill="none" aria-hidden="true"><path d="m5 18 2-6a3 3 0 0 1 2.8-2h12.4a3 3 0 0 1 2.8 2l2 6M4 18h24v6H4zM8 24v2m16-2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <span><span class="block text-lg font-extrabold">مدرسة الخنساء</span><span class="mt-0.5 block text-xs text-sand-300">لتعليم قيادة السيارات</span></span>
                        </a>
                        <p class="mt-5 max-w-sm leading-8 text-sand-300">نرافقك في رحلتك لتعلّم القيادة بثقة ووعي، خطوة بخطوة.</p>
                    </div>
                    <div>
                        <h2 class="font-extrabold text-white">روابط سريعة</h2>
                        <ul class="mt-4 grid gap-3 text-sm text-sand-300">
                            <li><a href="#about" class="transition hover:text-gold-400">عن المدرسة</a></li>
                            <li><a href="#training-fields" class="transition hover:text-gold-400">مجالات التعلّم</a></li>
                            <li><a href="{{ route('practice.index') }}" class="transition hover:text-gold-400">التدريب على الأسئلة</a></li>
                            <li><a href="#journey" class="transition hover:text-gold-400">خطوات التعلّم</a></li>
                            <li><a href="#location" class="transition hover:text-gold-400">موقع المدرسة</a></li>
                            <li><a href="#faq" class="transition hover:text-gold-400">الأسئلة الشائعة</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="font-extrabold text-white">ابدأ من هنا</h2>
                        <p class="mt-4 leading-7 text-sand-300">تعرّف على مهارات القيادة التي يمكنك اكتسابها خطوة بخطوة.</p>
                        <a href="#training-fields" class="mt-4 inline-flex items-center gap-2 font-bold text-gold-400 transition hover:gap-4">مجالات التعلّم <span aria-hidden="true">←</span></a>
                    </div>
                    <div>
                        <h2 class="font-extrabold text-white">معلومات التواصل</h2>
                        <ul class="mt-4 grid gap-4 text-sm">
                            @if ($contactInformation?->whatsapp)
                                <li>
                                    <a href="{{ $contactInformation->whatsappUrl() }}" target="_blank" rel="noopener noreferrer" aria-label="واتساب" title="تواصل عبر واتساب" class="inline-flex items-center gap-2 text-[#25D366] transition hover:scale-110 hover:text-[#5be38a] focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-[#25D366]">
                                        <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M20.52 3.48A11.83 11.83 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.9c0 2.1.55 4.15 1.6 5.96L.12 24l6.3-1.65a11.9 11.9 0 0 0 5.68 1.45h.01c6.56 0 11.9-5.34 11.9-11.9 0-3.18-1.24-6.17-3.49-8.42ZM12.1 21.78h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.87 9.87 0 0 1-1.52-5.25c0-5.47 4.45-9.92 9.92-9.92a9.85 9.85 0 0 1 7.01 2.91 9.85 9.85 0 0 1 2.91 7.02c0 5.47-4.45 9.87-9.93 9.87Zm5.44-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.67-2.06-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.38-.03-.53-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.08-.8.38-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.18-1.42-.08-.13-.28-.2-.58-.35Z"/>
                                        </svg>
                                        واتساب
                                    </a>
                                </li>
                            @endif
                            @if ($contactInformation?->phone)
                                <li>
                                    <span class="block text-xs font-semibold text-sand-400">الهاتف</span>
                                    <a href="tel:{{ $contactInformation->phone }}" class="mt-1 block text-sand-200 transition hover:text-gold-400">{{ $contactInformation->phone }}</a>
                                </li>
                            @endif
                            @if ($contactInformation?->email)
                                <li>
                                    <span class="block text-xs font-semibold text-sand-400">البريد الإلكتروني</span>
                                    <a href="mailto:{{ $contactInformation->email }}" class="mt-1 block text-sand-200 transition hover:text-gold-400">{{ $contactInformation->email }}</a>
                                </li>
                            @endif
                            @if ($contactInformation?->address)
                                <li>
                                    <span class="block text-xs font-semibold text-sand-400">العنوان</span>
                                    <span class="mt-1 block whitespace-pre-line leading-7 text-sand-200">{{ $contactInformation->address }}</span>
                                </li>
                            @endif
                            @if ($contactInformation?->working_hours)
                                <li>
                                    <span class="block text-xs font-semibold text-sand-400">ساعات العمل</span>
                                    <span class="mt-1 block whitespace-pre-line leading-7 text-sand-200">{{ $contactInformation->working_hours }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col gap-3 pt-6 text-sm text-sand-300 sm:flex-row sm:items-center sm:justify-between">
                    <p>© {{ date('Y') }} مدرسة الخنساء لتعليم قيادة السيارات. جميع الحقوق محفوظة.</p>
                    <a href="{{ route('home') }}" class="transition hover:text-gold-400">العودة إلى الأعلى ↑</a>
                    @include('partials.developer-credit')
                </div>
            </div>
        </footer>
    </body>
</html>
