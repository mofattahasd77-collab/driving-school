<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#17352c">
        <meta name="description" content="تقدم مدرسة الخنساء لتعليم القيادة تدريبًا نظريًا وعمليًا يشمل قواعد المرور، والإشارات، وأساسيات السيارة ومهارات القيادة على الطريق.">

        <title>مدرسة الخنساء لتعليم القيادة</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-sand-50 text-brand-950 antialiased dark:bg-brand-950 dark:text-sand-50">
        <div class="bg-brand-900 px-4 py-2.5 text-center text-sm font-medium text-white dark:bg-black">
            تدريب متكامل يجمع بين المعرفة النظرية والتطبيق العملي
            <a href="#training-fields" class="mx-1 inline-flex items-center gap-1 font-bold text-gold-400 underline decoration-gold-400/50 underline-offset-4 transition hover:text-white">
                تعرّف على مجالات التدريب
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
                    <a href="#training-fields" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">مجالات التدريب</a>
                    <a href="#educational-videos" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">فيديوهات تعليمية</a>
                    <a href="{{ route('practice.index') }}" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">تدرّب على الأسئلة</a>
                    <a href="#location" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">موقع المدرسة</a>
                    <a href="#faq" class="text-sm font-semibold text-brand-800 transition hover:text-brand-500 dark:text-sand-200 dark:hover:text-gold-400">الأسئلة الشائعة</a>
                </nav>

                <div class="hidden items-center gap-3 lg:flex">
                    <a href="#training-fields" class="inline-flex items-center justify-center gap-2 rounded-full bg-brand-800 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-brand-900/10 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                        استكشف مجالات التدريب
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
                        <a href="#management-team" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">الكادر الإداري</a>
                        <a href="#training-fields" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">مجالات التدريب</a>
                        <a href="#secondary-school" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">ثانوية الخنساء</a>
                        <a href="#educational-videos" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">فيديوهات تعليمية</a>
                        <a href="{{ route('practice.index') }}" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">تدرّب على الأسئلة</a>
                        <a href="#journey" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">خطواتك</a>
                        <a href="#location" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">موقع المدرسة</a>
                        <a href="#faq" class="rounded-xl px-4 py-3 font-semibold text-brand-900 hover:bg-brand-50 dark:text-white dark:hover:bg-white/10">الأسئلة الشائعة</a>
                        <a href="#training-fields" class="mt-1 rounded-xl bg-brand-800 px-4 py-3 text-center font-bold text-white dark:bg-gold-400 dark:text-brand-950">استكشف مجالات التدريب</a>
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
                            تعليم قيادة يجمع بين المعرفة والممارسة
                        </span>
                        <h1 class="mt-7 text-4xl leading-[1.25] font-extrabold tracking-tight text-brand-950 sm:text-5xl lg:text-6xl dark:text-white">
                            قيادة أكثر وعيًا
                            <span class="relative mt-1 inline-block text-brand-600 dark:text-gold-400">
                                تبدأ بتدريب صحيح
                                <svg class="absolute -bottom-2 right-0 h-3 w-full text-gold-400" viewBox="0 0 250 12" fill="none" aria-hidden="true">
                                    <path d="M3 9C67 2 164-1 247 6" stroke="currentColor" stroke-width="5" stroke-linecap="round"/>
                                </svg>
                            </span>
                        </h1>
                        <p class="mt-7 max-w-lg text-lg leading-9 text-brand-700 dark:text-sand-200">
                            في مدرسة الخنساء، تتدرّب على قواعد الطريق ومهارات القيادة العملية ضمن مسار واضح يبدأ من الأساسيات ويتدرج وفق خبرتك، لتقود بوعي وثقة أكبر.
                        </p>
                        <div class="mt-9 flex flex-wrap items-center gap-4">
                            <a href="#training-fields" class="inline-flex items-center justify-center gap-3 rounded-full bg-brand-800 px-7 py-4 font-bold text-white shadow-xl shadow-brand-900/15 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                                استكشف مجالات التدريب
                                <span aria-hidden="true">←</span>
                            </a>
                            <a href="#journey" class="inline-flex items-center gap-2 rounded-full px-4 py-3 font-bold text-brand-800 transition hover:bg-white/70 dark:text-sand-100 dark:hover:bg-white/10">
                                <span class="grid size-9 place-items-center rounded-full border border-brand-800/15 dark:border-white/20">
                                    <svg class="size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M5.5 3.8v8.4L12 8l-6.5-4.2Z"/></svg>
                                </span>
                                تعرّف على آلية التدريب
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
                                <span class="text-sm font-bold text-gold-400">تدرّج واضح وممارسة عملية</span>
                                <p class="mt-2 text-2xl font-extrabold">مهارات ثابتة لكل طريق.</p>
                            </div>
                            <div class="absolute right-5 top-5 flex items-center gap-3 rounded-2xl border border-white/40 bg-white/90 p-3.5 shadow-lg backdrop-blur-sm sm:right-7 sm:top-7">
                                <span class="grid size-11 place-items-center rounded-xl bg-brand-800 text-gold-400">
                                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M12 3.5 14.7 9l6.1.9-4.4 4.3 1 6-5.4-2.8-5.4 2.8 1-6-4.4-4.3 6.1-.9L12 3.5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <span class="pl-1">
                                    <span class="block text-sm font-extrabold text-brand-900">السلامة أساس التدريب</span>
                                    <span class="mt-0.5 block text-xs font-medium text-brand-700">قواعد واضحة وتطبيق واعٍ</span>
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
                                    تدريب نظري متاح للجميع
                                </span>
                                <h2 class="mt-5 text-3xl leading-tight font-extrabold sm:text-4xl">راجع معلوماتك واستعد للاختبار النظري</h2>
                                <p class="mt-4 max-w-xl leading-8 text-sand-200">راجع معلوماتك قبل الاختبار النظري عبر 30 سؤالًا عشوائيًا في قواعد القيادة وأساسيات السيارة وإشارات المرور. تظهر نتيجتك بعد الانتهاء مع مراجعة إجاباتك، دون الحاجة إلى إنشاء حساب.</p>
                                <ul class="mt-6 flex flex-wrap gap-x-6 gap-y-3 text-sm font-semibold text-sand-100">
                                    <li class="inline-flex items-center gap-2"><span class="text-gold-400" aria-hidden="true">✓</span> أسئلة من مجالات متعددة</li>
                                    <li class="inline-flex items-center gap-2"><span class="text-gold-400" aria-hidden="true">✓</span> أسئلة مدعومة بصور توضيحية</li>
                                    <li class="inline-flex items-center gap-2"><span class="text-gold-400" aria-hidden="true">✓</span> نتيجة ومراجعة بعد الاختبار</li>
                                </ul>
                            </div>
                            <a href="{{ route('practice.index') }}" class="inline-flex items-center justify-center gap-3 justify-self-start rounded-full bg-gold-400 px-7 py-4 font-extrabold text-brand-950 shadow-lg transition hover:-translate-y-0.5 hover:bg-gold-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-brand-900 lg:justify-self-end">
                                ابدأ الاختبار التجريبي
                                <span aria-hidden="true">←</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="educational-videos" aria-labelledby="educational-videos-title" class="scroll-mt-24 bg-white py-20 sm:py-28 dark:bg-brand-950">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="mx-auto max-w-2xl text-center">
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">تعلّم بالمشاهدة</span>
                        <h2 id="educational-videos-title" class="mt-4 text-3xl font-extrabold text-brand-950 sm:text-4xl dark:text-white">فيديوهات تعليمية قصيرة و لقطات لقيادة بعض المتدربين</h2>
                        <p class="mt-4 leading-8 text-brand-700 dark:text-sand-200">شاهد دروسًا مختصرة تساعدك على فهم أساسيات القيادة والاستعداد لمواقف الطريق.</p>
                    </div>

                    @forelse ($videos as $video)
                        @if ($loop->first)
                            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @endif
                        <article class="overflow-hidden rounded-[1.75rem] border border-brand-900/10 bg-sand-50 shadow-sm dark:border-white/10 dark:bg-brand-900">
                            <div class="aspect-video w-full shrink-0 bg-brand-950">
                                <video class="size-full object-contain" controls preload="metadata" playsinline>
                                    <source src="{{ $video['url'] }}" type="{{ $video['type'] }}">
                                    متصفحك لا يدعم تشغيل الفيديو.
                                </video>
                            </div>
                        </article>
                        @if ($loop->last)
                            </div>
                        @endif
                    @empty
                        <p class="mx-auto mt-10 max-w-2xl rounded-2xl border border-dashed border-brand-900/20 bg-sand-50 px-6 py-5 text-center leading-8 text-brand-700 dark:border-white/20 dark:bg-brand-900 dark:text-sand-200">
                            ستظهر الفيديوهات هنا بعد إضافة ملفات MP4 أو WEBM أو OGG إلى المجلد <code dir="ltr" class="rounded bg-brand-900/5 px-2 py-1 font-mono text-sm dark:bg-white/10">public/videos</code>.
                        </p>
                    @endforelse
                </div>
            </section>

            <section aria-label="مجالات التدريب" class="border-y border-brand-900/5 bg-white dark:border-white/10 dark:bg-brand-950">
                <div class="mx-auto grid max-w-7xl divide-y divide-brand-900/10 px-5 sm:px-8 md:grid-cols-3 md:divide-x md:divide-y-0 md:divide-brand-900/10 lg:px-10 dark:divide-white/10">
                    <div class="flex items-center gap-4 py-6 md:px-7 md:py-7">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-700 dark:bg-white/10 dark:text-gold-400">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V5m0 14h16M7 15l4-4 3 2 5-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span><span class="block font-extrabold text-brand-900 dark:text-white">تدرّج يناسب خبرتك</span><span class="mt-1 block text-sm text-brand-600 dark:text-sand-300">من المبادئ الأولى إلى تطوير المهارات</span></span>
                    </div>
                    <div class="flex items-center gap-4 py-6 md:px-7 md:py-7">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-700 dark:bg-white/10 dark:text-gold-400">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v3m0 12v3M4.2 7.2l2.1 2.1m11.4 5.4 2.1 2.1M3 12h3m12 0h3m-16.8 4.8 2.1-2.1m11.4-5.4 2.1-2.1M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </span>
                        <span><span class="block font-extrabold text-brand-900 dark:text-white">السلامة في صلب التدريب</span><span class="mt-1 block text-sm text-brand-600 dark:text-sand-300">فهم للقواعد وتطبيق مسؤول على الطريق</span></span>
                    </div>
                    <div class="flex items-center gap-4 py-6 md:px-7 md:py-7">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-700 dark:bg-white/10 dark:text-gold-400">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-3.5 7-9V5l-7-2-7 2v7c0 5.5 7 9 7 9Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span><span class="block font-extrabold text-brand-900 dark:text-white">تدريب عملي متنوع</span><span class="mt-1 block text-sm text-brand-600 dark:text-sand-300">مهارات تحكم ومناورة وتعامل مع الطريق</span></span>
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
                                <span class="mt-1 block text-lg font-extrabold text-brand-900 dark:text-white">المعرفة أساس القيادة الآمنة</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">عن مدرسة الخنساء</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">
                            تدريب يؤهلك للطريق،
                            <span class="text-brand-600 dark:text-gold-400">لا للاختبار فحسب</span>
                        </h2>
                        <p class="mt-6 text-lg leading-9 text-brand-700 dark:text-sand-200">
                            نحرص في مدرسة الخنساء على أن يكون التدريب واضحًا ومتدرجًا، وأن يجمع بين فهم قواعد المرور والتطبيق العملي. يبدأ المتدرب من المهارات الأساسية، ثم ينتقل إلى التحكم بالمركبة والتعامل مع مواقف الطريق، وفق مستواه واحتياجاته.
                        </p>
                        <ul class="mt-7 grid gap-4 sm:grid-cols-2">
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">شرح مبسّط للمعلومات والقواعد</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">تدرّج يبدأ من مستوى المتدرب</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">عادات قيادة تراعي السلامة</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 dark:bg-white/10 dark:text-gold-400">✓</span>
                                <span class="font-bold text-brand-900 dark:text-white">تطبيق على مهارات الطريق اليومية</span>
                            </li>
                        </ul>
                        <a href="#journey" class="mt-8 inline-flex items-center gap-2 font-extrabold text-brand-700 transition hover:gap-4 dark:text-gold-400">
                            تعرّف على مراحل التدريب
                            <span aria-hidden="true">←</span>
                        </a>
                    </div>
                </div>
            </section>

            <section id="training-fields" class="scroll-mt-24 bg-brand-900 py-20 sm:py-28 dark:bg-black">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="mx-auto max-w-2xl text-center">
                        <span class="text-sm font-extrabold tracking-wide text-gold-400">تدريب يجمع بين النظرية والتطبيق</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-white sm:text-4xl">مهارات قيادة متكاملة في مكان واحد</h2>
                        <p class="mt-4 leading-8 text-sand-200">من فهم المركبة وقواعد المرور إلى المناورة والتعامل مع الطريق؛ تتكامل مجالات التدريب لتمنحك أساسًا عمليًا متينًا.</p>
                    </div>

                    <div class="mt-12 grid gap-5 md:grid-cols-3">
                        <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.06] p-7 transition duration-300 hover:-translate-y-1 hover:border-gold-400/50 hover:bg-white/[0.09] sm:p-8">
                            <span class="grid size-14 place-items-center rounded-2xl bg-gold-400 text-brand-950">
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 11h14l2 4v4H3v-4l2-4Zm2 0 1.5-5h7L17 11M6 19v2m12-2v2M6.5 15h.01M17.5 15h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <h3 class="mt-7 text-xl font-extrabold text-white">أساسيات السيارة والتحكّم</h3>
                            <p class="mt-3 leading-8 text-sand-200">تعرّف على مكونات التحكم الأساسية، ووضعية الجلوس الصحيحة، واستخدام المقود والسرعة والمكابح بطريقة آمنة.</p>
                        </article>

                        <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.06] p-7 transition duration-300 hover:-translate-y-1 hover:border-gold-400/50 hover:bg-white/[0.09] sm:p-8">
                            <span class="grid size-14 place-items-center rounded-2xl bg-gold-400 text-brand-950">
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 3.5 20h17L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M12 9v5m0 3h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            </span>
                            <h3 class="mt-7 text-xl font-extrabold text-white">قواعد الطريق والإشارات</h3>
                            <p class="mt-3 leading-8 text-sand-200">تعلّم دلالات الإشارات وأولويات المرور وقواعد السلامة، وثبّت معلوماتك بالتدريب على أسئلة نظرية متنوعة.</p>
                            <a href="{{ route('practice.index') }}" class="mt-5 inline-flex items-center gap-2 font-bold text-gold-400 transition group-hover:gap-4">
                                تدرّب على الأسئلة <span aria-hidden="true">←</span>
                            </a>
                        </article>

                        <article class="group rounded-[1.75rem] border border-white/10 bg-white/[0.06] p-7 transition duration-300 hover:-translate-y-1 hover:border-gold-400/50 hover:bg-white/[0.09] sm:p-8">
                            <span class="grid size-14 place-items-center rounded-2xl bg-gold-400 text-brand-950">
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 17.5 12 5l9 12.5M7 12h10M5.5 16h13M12 5v14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <h3 class="mt-7 text-xl font-extrabold text-white">التطبيق العملي على الطريق</h3>
                            <p class="mt-3 leading-8 text-sand-200">طوّر مهارات الانطلاق والتوقف وتغيير المسار والمناورة والاصطفاف، وتدرّب على قراءة الطريق والتصرف في مواقف القيادة اليومية.</p>
                        </article>
                    </div>

                    <div class="mt-10 text-center">
                        <a href="#journey" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 px-6 py-3 font-bold text-white transition hover:bg-white hover:text-brand-950 focus:outline-none focus-visible:ring-2 focus-visible:ring-gold-400 focus-visible:ring-offset-2 focus-visible:ring-offset-brand-900">
                            اطّلع على مراحل التدريب <span aria-hidden="true">←</span>
                        </a>
                    </div>
                </div>
            </section>

            <section id="journey" class="scroll-mt-24 bg-sand-100 py-20 sm:py-28 dark:bg-brand-900">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="mx-auto max-w-2xl text-center">
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">مسار تدريبي واضح</span>
                        <h2 class="mt-4 text-3xl font-extrabold text-brand-950 sm:text-4xl dark:text-white">من تحديد احتياجك إلى الممارسة بثقة</h2>
                        <p class="mt-4 leading-8 text-brand-700 dark:text-sand-200">يتدرج التدريب من فهم احتياجاتك إلى تطبيق المهارات ومراجعتها، لتكون كل مرحلة امتدادًا لما قبلها.</p>
                    </div>

                    <div class="relative mt-14 grid gap-8 md:grid-cols-3 md:gap-6">
                        <div class="pointer-events-none absolute right-[17%] left-[17%] top-8 hidden border-t-2 border-dashed border-brand-300 md:block dark:border-brand-500"></div>
                        <article class="relative text-center">
                            <span class="relative mx-auto grid size-16 place-items-center rounded-2xl border-4 border-sand-100 bg-brand-800 text-xl font-extrabold text-gold-400 shadow-lg dark:border-brand-900">١</span>
                            <h3 class="mt-6 text-xl font-extrabold text-brand-900 dark:text-white">تحديد نقطة البداية</h3>
                            <p class="mx-auto mt-3 max-w-xs leading-8 text-brand-700 dark:text-sand-200">تُراعى خبرتك والمهارات التي ترغب في اكتسابها لاختيار نقطة انطلاق مناسبة.</p>
                        </article>
                        <article class="relative text-center">
                            <span class="relative mx-auto grid size-16 place-items-center rounded-2xl border-4 border-sand-100 bg-brand-800 text-xl font-extrabold text-gold-400 shadow-lg dark:border-brand-900">٢</span>
                            <h3 class="mt-6 text-xl font-extrabold text-brand-900 dark:text-white">اكتساب المهارات بالتدرّج</h3>
                            <p class="mx-auto mt-3 max-w-xs leading-8 text-brand-700 dark:text-sand-200">ابدأ بالتحكم بالمركبة، ثم تعلّم المناورة والتعامل مع مواقف الطريق المختلفة.</p>
                        </article>
                        <article class="relative text-center">
                            <span class="relative mx-auto grid size-16 place-items-center rounded-2xl border-4 border-sand-100 bg-brand-800 text-xl font-extrabold text-gold-400 shadow-lg dark:border-brand-900">٣</span>
                            <h3 class="mt-6 text-xl font-extrabold text-brand-900 dark:text-white">مراجعة وتطوير مستمر</h3>
                            <p class="mx-auto mt-3 max-w-xs leading-8 text-brand-700 dark:text-sand-200">راجع ما اكتسبته من مهارات، وحدد الجوانب التي تحتاج إلى مزيد من التدريب.</p>
                        </article>
                    </div>
                    <div class="mt-12 text-center">
                        <a href="#training-fields" class="inline-flex items-center justify-center gap-2 rounded-full border border-brand-800/20 px-6 py-3 font-bold text-brand-800 transition hover:bg-brand-800 hover:text-white dark:border-white/20 dark:text-white dark:hover:bg-white dark:hover:text-brand-950">
                            استكشف مجالات التدريب <span aria-hidden="true">←</span>
                        </a>
                    </div>
                </div>
            </section>

            <section class="bg-sand-50 py-20 sm:py-28 dark:bg-brand-950">
                <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 lg:grid-cols-2 lg:gap-16 lg:px-10">
                    <div>
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">جودة في أسلوب التدريب</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">تدريب منظم يضع احتياج المتعلم في المقدمة</h2>
                        <p class="mt-5 leading-8 text-brand-700 dark:text-sand-200">تعلّم القيادة يحتاج إلى فهم وممارسة، لا إلى الاستعجال. لذلك يركّز التدريب على توضيح المهارة، وتطبيقها تدريجيًا، وتعزيز الانتباه والسلامة في مختلف المواقف.</p>
                        <div class="mt-8 grid gap-5 sm:grid-cols-2">
                            <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-white/5">
                                <span class="text-2xl text-gold-500" aria-hidden="true">✳</span>
                                <h3 class="mt-3 font-extrabold text-brand-900 dark:text-white">دروس متعددة للتحضير للاختبارات</h3>
                                <p class="mt-2 text-sm leading-7 text-brand-700 dark:text-sand-200">عدد كبير من الدروس يساعدك على ترسيخ المهارات والاستعداد للاختبارات النظرية والعملية.</p>
                            </div>
                            <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-white/5">
                                <span class="text-2xl text-gold-500" aria-hidden="true">✳</span>
                                <h3 class="mt-3 font-extrabold text-brand-900 dark:text-white">خدمة نقل متوفرة للطلاب</h3>
                                <p class="mt-2 text-sm leading-7 text-brand-700 dark:text-sand-200">النقل متوفر دائمًا للطلاب لتسهيل وصولهم إلى المدرسة وحضور دروسهم.</p>
                            </div>
                            <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-white/5">
                                <span class="text-2xl text-gold-500">✳</span>
                                <h3 class="mt-3 font-extrabold text-brand-900 dark:text-white">تدرّج يبني المهارة</h3>
                                <p class="mt-2 text-sm leading-7 text-brand-700 dark:text-sand-200">انتقل من أساسيات التحكم إلى المناورة ومواقف الطريق وفق تسلسل واضح.</p>
                            </div>
                            <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-white/5">
                                <span class="text-2xl text-gold-500">✳</span>
                                <h3 class="mt-3 font-extrabold text-brand-900 dark:text-white">معرفة تدعم الممارسة</h3>
                                <p class="mt-2 text-sm leading-7 text-brand-700 dark:text-sand-200">اربط كل مهارة بقواعد المرور ومبادئ السلامة ذات الصلة.</p>
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
                            <p class="font-extrabold text-brand-900 dark:text-white">مهارات تحتاجها على الطريق</p>
                            <p class="mt-1 text-sm leading-6 text-brand-700 dark:text-sand-200">تحكم أفضل بالمركبة، وقراءة أوضح للطريق، وقرارات أكثر أمانًا.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="faq" class="scroll-mt-24 bg-white py-20 sm:py-28 dark:bg-brand-900">
                <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20 lg:px-10">
                    <div>
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">الأسئلة الشائعة</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">إجابات تهمك قبل بدء التدريب</h2>
                        <p class="mt-5 leading-8 text-brand-700 dark:text-sand-200">اطّلع على تفاصيل التدريب، وإذا كان لديك استفسار إضافي فسيسرّ إدارة المدرسة التواصل معك.</p>
                        <a href="#training-fields" class="mt-6 inline-flex items-center gap-2 font-extrabold text-brand-700 transition hover:gap-4 dark:text-gold-400">استكشف مجالات التدريب <span aria-hidden="true">←</span></a>
                    </div>
                    <div class="divide-y divide-brand-900/10 dark:divide-white/10">
                        <details class="group py-5" open>
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                هل أحتاج إلى خبرة سابقة للالتحاق؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">لا يشترط وجود خبرة سابقة؛ يمكنك البدء من أساسيات التحكم بالمركبة، ثم التدرّج إلى المهارات الأخرى وفق احتياجك.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                كيف أعرف من أين أبدأ؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">تواصل مع إدارة المدرسة ووضّح خبرتك والمهارات التي ترغب في تطويرها، لتتعرّف على نقطة البداية المناسبة لك.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                ماذا يشمل التدريب؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">يشمل التدريب قواعد المرور والإشارات وأساسيات المركبة، إلى جانب التحكم والمناورة والتعامل مع مواقف الطريق، مع مراعاة التدرّج والسلامة.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                هل يتوفر عدد كافٍ من الدروس للاستعداد للاختبارات؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">نعم، تقدم المدرسة عددًا كبيرًا من الدروس لمساعدة الطلاب على ترسيخ المهارات والاستعداد للاختبارات النظرية والعملية.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                هل تتوفر خدمة نقل للطلاب؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">نعم، خدمة النقل متوفرة دائمًا للطلاب لتسهيل وصولهم إلى المدرسة.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer items-center justify-between gap-4 text-lg font-extrabold text-brand-900 focus:outline-none focus-visible:text-brand-600 dark:text-white dark:focus-visible:text-gold-400">
                                هل يمكنني تطوير مهاراتي إذا كنت أعرف القيادة مسبقًا؟
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-700 transition group-open:rotate-45 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-4 max-w-2xl leading-8 text-brand-700 dark:text-sand-200">نعم، يمكنك التركيز على المهارات التي ترغب في تعزيزها ومراجعة قواعد الطريق أو أساسيات القيادة بحسب احتياجك.</p>
                        </details>
                    </div>
                </div>
            </section>

            <section id="location" class="scroll-mt-24 bg-sand-50 py-20 sm:py-28 dark:bg-brand-950">
                <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16 lg:px-10">
                    <div>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">موقع مدرسة الخنساء</h2>
                        <p class="mt-5 leading-8 text-brand-700 dark:text-sand-200">تجد موقع المدرسة على الخريطة أدناه، ويمكنك فتح الاتجاهات لمعرفة الطريق إليها.</p>
                        
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

            <section id="management-team" class="scroll-mt-24 bg-white py-20 sm:py-28 dark:bg-brand-900">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="mx-auto max-w-2xl text-center">
                        <span class="text-sm font-extrabold tracking-wide text-brand-600 dark:text-gold-400">إدارة المدرسة</span>
                        <h2 class="mt-4 text-3xl leading-tight font-extrabold text-brand-950 sm:text-4xl dark:text-white">الكادر الإداري</h2>
                        <p class="mt-4 leading-8 text-brand-700 dark:text-sand-200">تعرّف على مديري مدرسة الخنساء.</p>
                    </div>

                    <div class="mx-auto mt-10 grid max-w-4xl gap-6 sm:grid-cols-2">
                        <figure class="overflow-hidden rounded-[1.75rem] border border-brand-900/10 bg-sand-50 shadow-sm dark:border-white/10 dark:bg-brand-950">
                            <div class="grid aspect-[4/3] place-items-center overflow-hidden bg-sand-100 dark:bg-brand-900">
                                @if (file_exists(public_path('images/managers/manager-1.jpeg')))
                                    <img src="{{ asset('images/managers/manager-1.jpeg') }}" alt="صورة أ. باسل بكداش" class="size-full object-cover">
                                @else
                                    <div class="grid justify-items-center gap-3 text-brand-500 dark:text-gold-400">
                                        <svg class="size-20" viewBox="0 0 64 64" fill="none" aria-hidden="true">
                                            <circle cx="32" cy="22" r="11" fill="currentColor" opacity=".8"/>
                                            <path d="M12 56c1.7-11.2 9.5-17 20-17s18.3 5.8 20 17" fill="currentColor" opacity=".8"/>
                                        </svg>
                                        <span class="text-sm font-semibold">الصورة التعريفية ستضاف قريبًا</span>
                                    </div>
                                @endif
                            </div>
                            <figcaption class="px-6 py-5 text-center">
                                <h3 class="text-lg font-extrabold text-brand-900 dark:text-white">أ. باسل بكداش</h3>
                                <p class="mt-1 text-sm font-medium text-brand-600 dark:text-sand-300">مدير المدرسة</p>
                            </figcaption>
                        </figure>

                        <figure class="overflow-hidden rounded-[1.75rem] border border-brand-900/10 bg-sand-50 shadow-sm dark:border-white/10 dark:bg-brand-950">
                            <div class="grid aspect-[4/3] place-items-center overflow-hidden bg-sand-100 dark:bg-brand-900">
                                @if (file_exists(public_path('images/managers/manager-2.jpeg')))
                                    <img src="{{ asset('images/managers/manager-2.jpeg') }}" alt="صورة المدير الثاني في مدرسة الخنساء" class="size-full object-cover">
                                @else
                                    <div class="grid justify-items-center gap-3 text-brand-500 dark:text-gold-400">
                                        <svg class="size-20" viewBox="0 0 64 64" fill="none" aria-hidden="true">
                                            <circle cx="32" cy="22" r="11" fill="currentColor" opacity=".8"/>
                                            <path d="M12 56c1.7-11.2 9.5-17 20-17s18.3 5.8 20 17" fill="currentColor" opacity=".8"/>
                                        </svg>
                                        <span class="text-sm font-semibold">الصورة التعريفية ستضاف قريبًا</span>
                                    </div>
                                @endif
                            </div>
                            <figcaption class="px-6 py-5 text-center">
                                <h3 class="text-lg font-extrabold text-brand-900 dark:text-white">أ. يوسف بكداش</h3>
                                <p class="mt-1 text-sm font-medium text-brand-600 dark:text-sand-300">المدير الإداري</p>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="mx-auto mt-10 max-w-3xl text-center">
                        <p class="leading-8 text-brand-700 dark:text-sand-200">للاستفسار عن خدمات المدرسة ومجالات التدريب، يمكنك التواصل مباشرة مع مدير المدرسة أ. باسل بكداش عبر الاتصال أو واتساب.</p>
                        <div class="mt-7 flex flex-wrap justify-center gap-3">
                            <a href="tel:+963957836397" class="inline-flex items-center justify-center gap-2 rounded-full bg-brand-800 px-6 py-3.5 font-bold text-white shadow-lg shadow-brand-900/10 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M7 3h3l2 5-2 1.5a15 15 0 0 0 4.5 4.5L16 12l5 2v3c0 1.1-.9 2-2 2C10.7 19 5 13.3 5 5c0-1.1.9-2 2-2Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                اتصال: 0957836397
                            </a>
                            <a href="https://wa.me/963957836397" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-full border border-[#25D366]/30 bg-[#25D366]/10 px-6 py-3.5 font-bold text-[#138a42] transition hover:-translate-y-0.5 hover:bg-[#25D366]/15 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#25D366] dark:text-[#5be38a]">
                                <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M20.52 3.48A11.83 11.83 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.9c0 2.1.55 4.15 1.6 5.96L.12 24l6.3-1.65a11.9 11.9 0 0 0 5.68 1.45h.01c6.56 0 11.9-5.34 11.9-11.9 0-3.18-1.24-6.17-3.49-8.42ZM12.1 21.78h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.87 9.87 0 0 1-1.52-5.25c0-5.47 4.45-9.92 9.92-9.92a9.85 9.85 0 0 1 7.01 2.91 9.85 9.85 0 0 1 2.91 7.02c0 5.47-4.45 9.87-9.93 9.87Zm5.44-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.76-1.67-2.06-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.38-.03-.53-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.08-.8.38-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.18-1.42-.08-.13-.28-.2-.58-.35Z"/>
                                </svg>
                                واتساب: 0957836397
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="secondary-school" aria-labelledby="secondary-school-title" class="scroll-mt-24 bg-sand-50 px-5 py-20 sm:px-8 sm:py-28 dark:bg-brand-950">
                <div class="mx-auto max-w-7xl">
                    <div class="relative isolate overflow-hidden rounded-[2rem] bg-brand-900 p-6 text-white shadow-xl shadow-brand-950/10 sm:p-10 lg:p-14 dark:bg-black">
                        <div class="pointer-events-none absolute -left-20 -top-24 -z-10 size-72 rounded-full bg-gold-400/15 blur-3xl"></div>
                        <div class="grid items-center gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-12">
                            <div>
                                <span class="inline-flex items-center gap-2 rounded-full border border-gold-400/30 bg-white/5 px-4 py-2 text-sm font-bold text-gold-400">
                                    <span class="size-2 rounded-full bg-gold-400" aria-hidden="true"></span>
                                    إعلان مدرسة الخنساء
                                </span>
                                <h2 id="secondary-school-title" class="mt-5 text-3xl leading-tight font-extrabold sm:text-4xl">مدرسة ثانوية الخنساء</h2>
                                <p class="mt-4 leading-8 text-sand-200">مدرسة ثانوية تابعة لمدرسة الخنساء لتعليم القيادة.</p>
                            </div>

                            <div class="grid aspect-[1024/572] place-items-center overflow-hidden rounded-2xl border border-white/15 bg-white/5">
                                @if (file_exists(public_path('images/secondary-school-ad.jpg')))
                                    <img src="{{ asset('images/secondary-school-ad.jpg') }}" alt="إعلان مدرسة ثانوية الخنساء" class="size-full object-contain">
                                @else
                                    <div class="px-5 text-center">
                                        <svg class="mx-auto size-12 text-gold-400" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M3 5.5A2.5 2.5 0 0 1 5.5 3h13A2.5 2.5 0 0 1 21 5.5v13a2.5 2.5 0 0 1-2.5 2.5h-13A2.5 2.5 0 0 1 3 18.5v-13Z" stroke="currentColor" stroke-width="1.5"/>
                                            <path d="m4 17 5-5 3 3 3-4 5 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <circle cx="8.5" cy="8" r="1.5" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                        <p class="mt-3 font-bold text-white">مساحة إعلان المدرسة</p>
                                        <p class="mt-2 text-sm leading-6 text-sand-200">أضف صورة الإعلان باسم <code dir="ltr" class="font-mono text-gold-400">secondary-school-ad.jpg</code> داخل <code dir="ltr" class="font-mono text-gold-400">public/images</code>.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-sand-50 px-5 py-16 sm:px-8 sm:py-20 dark:bg-brand-950">
                <div class="relative mx-auto max-w-7xl overflow-hidden rounded-[2rem] bg-brand-800 px-7 py-12 sm:px-12 sm:py-14 lg:px-16 dark:bg-brand-900">
                    <div class="pointer-events-none absolute -left-16 -top-28 size-80 rounded-full border-[48px] border-white/5"></div>
                    <div class="pointer-events-none absolute -bottom-32 right-1/3 size-72 rounded-full bg-gold-400/10 blur-3xl"></div>
                    <div class="relative flex flex-col justify-between gap-8 lg:flex-row lg:items-center">
                        <div class="max-w-2xl">
                            <span class="text-sm font-bold text-gold-400">خطوتك التالية تبدأ بمعلومة واضحة</span>
                            <h2 class="mt-3 text-3xl leading-tight font-extrabold text-white sm:text-4xl">استعد للقيادة بفهم وممارسة</h2>
                            <p class="mt-4 leading-8 text-sand-200">استكشف مجالات التدريب، وتواصل مع المدرسة للتعرّف على المسار الذي يلائم خبرتك واحتياجك.</p>
                        </div>
                        <a href="#training-fields" class="inline-flex shrink-0 items-center justify-center gap-3 self-start rounded-full bg-gold-400 px-7 py-4 font-extrabold text-brand-950 shadow-lg transition hover:-translate-y-0.5 hover:bg-gold-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-brand-800 lg:self-center">
                            استكشف مجالات التدريب
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
                        <p class="mt-5 max-w-sm leading-8 text-sand-300">تدريب نظري وعملي على قواعد الطريق ومهارات القيادة، مع عناية بالتدرّج والسلامة.</p>
                    </div>
                    <div>
                        <h2 class="font-extrabold text-white">روابط سريعة</h2>
                        <ul class="mt-4 grid gap-3 text-sm text-sand-300">
                            <li><a href="#about" class="transition hover:text-gold-400">عن المدرسة</a></li>
                            <li><a href="#training-fields" class="transition hover:text-gold-400">مجالات التدريب</a></li>
                            <li><a href="#secondary-school" class="transition hover:text-gold-400">مدرسة ثانوية الخنساء</a></li>
                            <li><a href="#educational-videos" class="transition hover:text-gold-400">فيديوهات تعليمية</a></li>
                            <li><a href="{{ route('practice.index') }}" class="transition hover:text-gold-400">التدريب على الأسئلة</a></li>
                            <li><a href="#journey" class="transition hover:text-gold-400">مراحل التدريب</a></li>
                            <li><a href="#location" class="transition hover:text-gold-400">موقع المدرسة</a></li>
                            <li><a href="#faq" class="transition hover:text-gold-400">الأسئلة الشائعة</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="font-extrabold text-white">تدريب يناسب احتياجك</h2>
                        <p class="mt-4 leading-7 text-sand-300">راجع مجالات التدريب واختر المهارات التي تريد البدء بها أو تطويرها.</p>
                        <a href="#training-fields" class="mt-4 inline-flex items-center gap-2 font-bold text-gold-400 transition hover:gap-4">مجالات التدريب <span aria-hidden="true">←</span></a>
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
