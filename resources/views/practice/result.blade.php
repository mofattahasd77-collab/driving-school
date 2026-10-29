@extends('practice.layout')

@section('title', 'نتيجة التدريب')

@section('content')
    <section class="rounded-3xl border border-brand-900/10 bg-white p-6 text-center shadow-sm sm:p-10 dark:border-white/10 dark:bg-brand-900">
        <span class="mx-auto grid size-16 place-items-center rounded-2xl {{ $percentage >= 70 ? 'bg-brand-50 text-brand-700 dark:bg-brand-500/20 dark:text-brand-100' : 'bg-gold-400/20 text-brand-800 dark:text-gold-400' }}">
            <svg class="size-8" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 4h8M8 2h8v4H8zM6 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1M7 12l3 3 7-7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
        <p class="mt-5 text-sm font-extrabold text-brand-600 dark:text-gold-400">{{ $result['time_expired'] ? 'انتهى الوقت' : 'اكتمل التدريب' }}</p>
        <h1 class="mt-2 text-3xl font-extrabold text-brand-950 dark:text-white">نتيجتك: {{ $result['score'] }} من {{ $result['question_count'] }}</h1>
        <p class="mt-3 text-lg font-bold text-brand-700 dark:text-sand-200">{{ $percentage }}٪ من الإجابات صحيحة</p>
        <p class="mt-2 text-xl font-extrabold text-brand-800 dark:text-gold-400">التقييم: {{ $grade }}</p>
        <p class="mt-2 leading-7 text-brand-600 dark:text-sand-300">
            @if ($result['time_expired'])
                انتهى الوقت؛ احتُسبت الأسئلة التي أجبت عنها فقط، واعتُبرت الأسئلة المتبقية غير مجابة.
            @elseif ($percentage >= 90)
                أداء ممتاز! لديك إلمام قوي بمعلومات القيادة.
            @elseif ($percentage >= 80)
                نتيجة جيدة جدًا، واصل المراجعة للمزيد من التقدم.
            @elseif ($percentage >= 70)
                نتيجة جيدة، راجع الأسئلة لتعزيز معلوماتك.
            @else
                تحتاج إلى مراجعة الأقسام والتدرب مجددًا.
            @endif
        </p>
        <form method="POST" action="{{ route('practice.start') }}" class="mt-6 inline-flex">
            @csrf
            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-800 px-6 py-3.5 font-extrabold text-white transition hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
                إعادة التدريب بأسئلة جديدة
                <span aria-hidden="true">↻</span>
            </button>
        </form>
    </section>

    <section class="mt-8">
        <h2 class="mb-4 text-xl font-extrabold text-brand-950 dark:text-white">مراجعة الإجابات</h2>
        <div class="grid gap-4">
            @foreach ($result['answers'] as $index => $answer)
                @php
                    $question = $answer['question'];
                    $correctOption = $question['correct_option'];
                @endphp
                <article class="rounded-2xl border {{ $answer['is_correct'] ? 'border-brand-500/25 bg-brand-50 dark:border-brand-300/20 dark:bg-brand-900' : 'border-gold-500/30 bg-white dark:border-gold-400/20 dark:bg-brand-900' }} p-5 sm:p-6">
                    <div class="flex items-start gap-3">
                        <span class="grid size-8 shrink-0 place-items-center rounded-full {{ $answer['is_correct'] ? 'bg-brand-700 text-white dark:bg-brand-500' : 'bg-gold-400 text-brand-950' }}" aria-hidden="true">{{ $answer['is_correct'] ? '✓' : '!' }}</span>
                        <div class="min-w-0">
                            <span class="inline-flex rounded-full bg-brand-100 px-3 py-1 text-xs font-bold text-brand-800 dark:bg-white/10 dark:text-gold-400">{{ $categories[$question['category']] }}</span>
                            <h3 class="mt-2 font-extrabold leading-7 text-brand-950 dark:text-white">{{ $index + 1 }}. {{ $question['text'] }}</h3>
                            @if ($question['image_path'])
                                <img src="{{ asset('images/'.$question['image_path']) }}" alt="صورة توضيحية للسؤال {{ $index + 1 }}" class="mt-4 max-h-64 w-full rounded-xl border border-brand-900/10 object-contain dark:border-white/10">
                            @endif
                            <p class="mt-2 text-sm leading-6 text-brand-700 dark:text-sand-200">إجابتك: {{ $answer['selected_option'] === null ? 'لم تتم الإجابة' : $question['options'][$answer['selected_option']] }}</p>
                            @unless ($answer['is_correct'])
                                <p class="mt-1 text-sm font-bold leading-6 text-brand-800 dark:text-gold-400">الإجابة الصحيحة: {{ $question['options'][$correctOption] }}</p>
                            @endunless
                            @if ($question['explanation'])
                                <p class="mt-3 border-t border-brand-900/10 pt-3 text-sm leading-7 text-brand-700 dark:border-white/10 dark:text-sand-200">{{ $question['explanation'] }}</p>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
