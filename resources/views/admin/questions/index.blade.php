@extends('admin.layout')

@section('title', 'إدارة الأسئلة')

@section('content')
    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <span class="text-sm font-extrabold text-brand-600 dark:text-gold-400">لوحة التحكم</span>
            <h1 class="mt-2 text-3xl font-extrabold text-brand-950 dark:text-white">بنك الأسئلة</h1>
            <p class="mt-2 leading-7 text-brand-700 dark:text-sand-200">صنّف كل سؤال إلى نظري أو ميكانيكي أو إشارات، وأكمل 10 أسئلة منشورة في كل قسم لإتاحة الاختبار.</p>
        </div>
        <a href="{{ route('admin.questions.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-800 px-5 py-3.5 font-extrabold text-white shadow-lg shadow-brand-900/10 transition hover:-translate-y-0.5 hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
            <span class="text-xl leading-none" aria-hidden="true">+</span>
            إضافة سؤال جديد
        </a>
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-brand-900">
            <p class="text-sm font-semibold text-brand-600 dark:text-sand-300">إجمالي الأسئلة</p>
            <p class="mt-2 text-3xl font-extrabold text-brand-900 dark:text-white">{{ $totalQuestions }}</p>
        </div>
        @foreach ($categories as $category => $label)
            <div class="rounded-2xl border border-brand-900/10 bg-white p-5 dark:border-white/10 dark:bg-brand-900">
                <p class="text-sm font-semibold text-brand-600 dark:text-sand-300">المنشور - {{ $label }}</p>
                <p class="mt-2 text-3xl font-extrabold text-brand-900 dark:text-white">{{ $publishedCounts[$category] ?? 0 }} <span class="text-sm font-semibold text-brand-500 dark:text-sand-300">/ 10 مطلوب</span></p>
            </div>
        @endforeach
    </div>

    <section class="mt-8 overflow-hidden rounded-3xl border border-brand-900/10 bg-white shadow-sm dark:border-white/10 dark:bg-brand-900">
        <div class="flex flex-col gap-2 border-b border-brand-900/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7 dark:border-white/10">
            <h2 class="text-lg font-extrabold text-brand-950 dark:text-white">الأسئلة المضافة</h2>
            <p class="text-sm text-brand-600 dark:text-sand-300">تظهر الأسئلة المنشورة ضمن اختبار الأقسام الثلاثة.</p>
        </div>

        @if ($questions->isEmpty())
            <div class="px-6 py-16 text-center">
                <span class="mx-auto grid size-14 place-items-center rounded-2xl bg-brand-50 text-2xl text-brand-600 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">؟</span>
                <h3 class="mt-4 text-lg font-extrabold text-brand-900 dark:text-white">لا توجد أسئلة بعد</h3>
                <p class="mt-2 text-brand-600 dark:text-sand-300">أضف أول سؤال إلى بنك الأسئلة للبدء.</p>
                <a href="{{ route('admin.questions.create') }}" class="mt-5 inline-flex rounded-xl bg-brand-800 px-5 py-3 font-bold text-white dark:bg-gold-400 dark:text-brand-950">إضافة أول سؤال</a>
            </div>
        @else
            <div class="divide-y divide-brand-900/10 dark:divide-white/10">
                @foreach ($questions as $question)
                    <article class="flex flex-col gap-5 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                        <div class="flex min-w-0 items-start gap-4">
                            @if ($question->image_path)
                                <img src="{{ asset('images/'.$question->image_path) }}" alt="" class="size-16 shrink-0 rounded-xl border border-brand-900/10 object-cover dark:border-white/10">
                            @else
                                <span class="grid size-16 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-500 dark:bg-white/10 dark:text-gold-400" aria-hidden="true">
                                    <svg class="size-7" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4zM8 10h.01M4 16l5-5 4 4 2-2 5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                            @endif
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="rounded-full bg-gold-400/20 px-3 py-1 text-xs font-bold text-brand-800 dark:text-gold-400">{{ $categories[$question->category] ?? $question->category }}</span>
                                    <span class="rounded-full px-3 py-1 text-xs font-bold {{ $question->is_published ? 'bg-brand-50 text-brand-700 dark:bg-brand-500/20 dark:text-brand-100' : 'bg-sand-100 text-brand-600 dark:bg-white/10 dark:text-sand-200' }}">
                                        {{ $question->is_published ? 'منشور' : 'مسودة' }}
                                    </span>
                                    <span class="text-xs text-brand-500 dark:text-sand-400">{{ $question->created_at->format('Y-m-d') }}</span>
                                </div>
                                <h3 class="mt-2 line-clamp-2 font-bold leading-7 text-brand-950 dark:text-white">{{ $question->question }}</h3>
                                <p class="mt-1 text-sm text-brand-600 dark:text-sand-300">الإجابة الصحيحة: {{ $question->options[$question->correct_option] }}</p>
                            </div>
                        </div>
                        <div class="flex shrink-0 items-center gap-2">
                            <a href="{{ route('admin.questions.edit', $question) }}" class="rounded-lg border border-brand-900/15 px-4 py-2.5 text-sm font-bold text-brand-800 transition hover:bg-brand-50 dark:border-white/15 dark:text-white dark:hover:bg-white/10">تعديل</a>
                            <form method="POST" action="{{ route('admin.questions.destroy', $question) }}" onsubmit="return confirm('هل تريد حذف هذا السؤال؟ لا يمكن التراجع عن هذا الإجراء.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg border border-red-700/20 px-4 py-2.5 text-sm font-bold text-red-700 transition hover:bg-red-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 dark:border-red-300/20 dark:text-red-300 dark:hover:bg-red-950/30">حذف</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($questions->hasPages())
                <div class="border-t border-brand-900/10 px-5 py-5 sm:px-7 dark:border-white/10">
                    {{ $questions->links() }}
                </div>
            @endif
        @endif
    </section>
@endsection
