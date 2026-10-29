@extends('practice.layout')

@section('title', 'ابدأ التدريب')

@section('content')
    <section class="overflow-hidden rounded-[2rem] border border-brand-900/10 bg-white shadow-sm dark:border-white/10 dark:bg-brand-900">
        <div class="relative isolate overflow-hidden bg-brand-900 px-6 py-9 text-white sm:px-10 sm:py-12 dark:bg-black">
            <div class="pointer-events-none absolute -left-16 -top-24 -z-10 size-64 rounded-full bg-gold-400/15 blur-3xl"></div>
            <span class="text-sm font-extrabold text-gold-400">تدريب مجاني على أسئلة القيادة</span>
            <h1 class="mt-3 text-3xl leading-tight font-extrabold sm:text-4xl">اختبر معلوماتك في أقسام القيادة الثلاثة</h1>
            <p class="mt-4 max-w-2xl leading-8 text-sand-200">يتكوّن الاختبار من 30 سؤالًا عشوائيًا: 10 أسئلة نظرية، و10 ميكانيكية، و10 عن الإشارات. يمكنك التدرب دون تسجيل الدخول.</p>
        </div>

        <div class="grid gap-8 p-6 sm:p-10 md:grid-cols-[1fr_auto] md:items-center">
            <div>
                <h2 class="text-xl font-extrabold text-brand-950 dark:text-white">الأسئلة المنشورة في كل قسم</h2>
                <ul class="mt-5 grid gap-4 text-brand-700 sm:grid-cols-2 dark:text-sand-200">
                    @foreach ($categories as $category => $label)
                        <li class="flex items-center justify-between gap-3 rounded-xl border border-brand-900/10 bg-sand-50 p-4 dark:border-white/10 dark:bg-brand-950">
                            <span class="font-bold">{{ $label }} <span class="text-sm font-medium text-brand-500 dark:text-sand-300">({{ $questionsPerCategory }} مطلوبة)</span></span>
                            <span class="rounded-full px-3 py-1 text-sm font-extrabold {{ $publishedCounts[$category] >= $questionsPerCategory ? 'bg-brand-100 text-brand-800 dark:bg-brand-500/20 dark:text-brand-100' : 'bg-gold-400/20 text-brand-800 dark:text-gold-400' }}">{{ $publishedCounts[$category] }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-6 grid gap-4 text-sm text-brand-600 sm:grid-cols-2 dark:text-sand-300">
                    <p class="flex items-center gap-2"><span class="font-extrabold text-brand-700 dark:text-gold-400">✓</span> أربعة خيارات لكل سؤال</p>
                    <p class="flex items-center gap-2"><span class="font-extrabold text-brand-700 dark:text-gold-400">✓</span> مراجعة الإجابات والشرح</p>
                </div>
            </div>

            <div class="rounded-2xl border border-brand-900/10 bg-sand-50 p-5 text-center sm:p-6 dark:border-white/10 dark:bg-brand-950">
                @if ($canStart)
                    <p class="text-sm font-semibold text-brand-700 dark:text-sand-200">جاهز لاختبار معلوماتك؟</p>
                    <form method="POST" action="{{ route('practice.start') }}" class="mt-4">
                        @csrf
                        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-800 px-6 py-3.5 font-extrabold text-white shadow-lg shadow-brand-900/10 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                            ابدأ اختبارًا جديدًا
                            <span aria-hidden="true">←</span>
                        </button>
                    </form>
                @else
                    <span class="mx-auto grid size-12 place-items-center rounded-2xl bg-gold-400/20 text-2xl text-brand-800 dark:text-gold-400" aria-hidden="true">!</span>
                    <p class="mt-3 font-extrabold text-brand-900 dark:text-white">التدريب قيد التجهيز</p>
                    <p class="mt-2 max-w-xs text-sm leading-6 text-brand-600 dark:text-sand-300">يبدأ الاختبار عند نشر 10 أسئلة على الأقل في كل قسم. تابع الأعداد لمعرفة الأقسام التي تحتاج إلى المزيد.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
