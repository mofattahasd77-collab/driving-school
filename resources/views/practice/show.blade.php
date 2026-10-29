@extends('practice.layout')

@section('title', 'الاختبار النظري')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6 flex flex-col gap-4 rounded-2xl border border-brand-900/10 bg-white p-5 sm:flex-row sm:items-center sm:justify-between dark:border-white/10 dark:bg-brand-900">
            <div>
                <span class="text-sm font-extrabold text-brand-600 dark:text-gold-400">اختبر معلوماتك</span>
                <h1 class="mt-1 text-2xl font-extrabold text-brand-950 dark:text-white">الاختبار النظري</h1>
            </div>
            <div class="flex items-center gap-3 rounded-xl bg-sand-50 px-4 py-3 dark:bg-brand-950">
                <svg class="size-6 text-brand-700 dark:text-gold-400" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <div>
                    <span class="block text-xs font-semibold text-brand-600 dark:text-sand-300">الوقت المتبقي</span>
                    <span id="practice-timer" role="timer" aria-live="off" class="font-mono text-xl font-extrabold tabular-nums text-brand-900 dark:text-white">--:--</span>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('practice.finish') }}" data-practice-form data-deadline="{{ $deadline }}">
            @csrf
            <div class="mb-4 flex items-center justify-between gap-4">
                <p id="question-progress" class="text-sm font-bold text-brand-700 dark:text-sand-200">السؤال 1 من {{ $questionCount }}</p>
                <span class="text-sm text-brand-600 dark:text-sand-300">{{ $durationMinutes }} دقيقة لإكمال الاختبار</span>
            </div>
            <div class="mb-5 h-2 overflow-hidden rounded-full bg-brand-100 dark:bg-white/10">
                <div id="question-progress-bar" class="h-full rounded-full bg-brand-600 transition-all dark:bg-gold-400" style="width: 3.34%"></div>
            </div>

            <div class="grid gap-5">
                @foreach ($questions as $index => $question)
                    <fieldset data-question-step data-category="{{ $question->category }}" class="rounded-3xl border border-brand-900/10 bg-white p-5 shadow-sm sm:p-8 dark:border-white/10 dark:bg-brand-900">
                        <legend class="sr-only">السؤال {{ $index + 1 }}</legend>
                        <div class="flex items-start gap-4">
                            <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-brand-800 font-extrabold text-white dark:bg-gold-400 dark:text-brand-950">{{ $index + 1 }}</span>
                            <div class="min-w-0 flex-1">
                                <span class="inline-flex rounded-full bg-brand-50 px-3 py-1 text-xs font-bold text-brand-700 dark:bg-white/10 dark:text-gold-400">{{ \App\Models\Question::categories()[$question->category] }}</span>
                                <h2 class="mt-3 text-xl leading-8 font-extrabold text-brand-950 dark:text-white">{{ $question->question }}</h2>
                                @if ($question->image_path)
                                    <img src="{{ asset('images/'.$question->image_path) }}" alt="صورة توضيحية للسؤال {{ $index + 1 }}" class="mt-5 max-h-80 w-full rounded-2xl border border-brand-900/10 object-contain dark:border-white/10">
                                @endif
                                <div class="mt-6 grid gap-3">
                                    @foreach (['a' => 'أ', 'b' => 'ب', 'c' => 'ج', 'd' => 'د'] as $key => $label)
                                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-brand-900/10 bg-sand-50 p-4 transition hover:border-brand-500 has-checked:border-brand-600 has-checked:bg-brand-50 dark:border-white/10 dark:bg-brand-950 dark:hover:border-gold-400 dark:has-checked:border-gold-400 dark:has-checked:bg-white/10">
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $key }}" @checked(old('answers.'.$question->id) === $key) class="mt-1 size-4 shrink-0 accent-brand-700 dark:accent-gold-400">
                                            <span class="font-bold leading-6 text-brand-800 dark:text-sand-100"><span class="me-1 text-brand-500 dark:text-gold-400">{{ $label }}.</span>{{ $question->options[$key] }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </fieldset>
                @endforeach
            </div>

            <p id="answer-error" role="alert" class="mt-4 hidden rounded-xl border border-red-700/20 bg-red-50 px-4 py-3 text-sm font-bold text-red-800 dark:border-red-300/20 dark:bg-red-950/30 dark:text-red-200">اختر إجابة للانتقال إلى السؤال التالي.</p>

            <div class="mt-6 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-brand-900/10 bg-white p-4 dark:border-white/10 dark:bg-brand-900">
                <button type="button" data-previous class="rounded-xl border border-brand-900/15 px-5 py-3 font-bold text-brand-800 transition hover:bg-brand-50 disabled:cursor-not-allowed disabled:opacity-40 dark:border-white/15 dark:text-white dark:hover:bg-white/10">السؤال السابق</button>
                <button type="button" data-next class="rounded-xl bg-brand-800 px-6 py-3 font-extrabold text-white transition hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">السؤال التالي</button>
                <button type="submit" data-finish class="hidden rounded-xl bg-brand-800 px-6 py-3 font-extrabold text-white transition hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">إنهاء الاختبار</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        (() => {
            const form = document.querySelector('[data-practice-form]');
            if (!form) return;

            const questions = Array.from(form.querySelectorAll('[data-question-step]'));
            const timer = document.getElementById('practice-timer');
            const progress = document.getElementById('question-progress');
            const progressBar = document.getElementById('question-progress-bar');
            const error = document.getElementById('answer-error');
            const previous = form.querySelector('[data-previous]');
            const next = form.querySelector('[data-next]');
            const finish = form.querySelector('[data-finish]');
            const deadline = Number(form.dataset.deadline) * 1000;
            let current = 0;
            let submittingAfterTimeout = false;

            form.querySelectorAll('input[type="radio"]').forEach((input) => {
                input.required = false;
            });

            const showQuestion = (index) => {
                current = index;
                questions.forEach((question, questionIndex) => {
                    question.hidden = questionIndex !== current;
                });
                progress.textContent = `السؤال ${current + 1} من ${questions.length}`;
                progressBar.style.width = `${((current + 1) / questions.length) * 100}%`;
                previous.disabled = current === 0;
                next.classList.toggle('hidden', current === questions.length - 1);
                finish.classList.toggle('hidden', current !== questions.length - 1);
                error.classList.add('hidden');
            };

            const hasAnswer = (question) => question.querySelector('input[type="radio"]:checked') !== null;

            next.addEventListener('click', () => {
                if (!hasAnswer(questions[current])) {
                    error.classList.remove('hidden');
                    questions[current].querySelector('input[type="radio"]').focus();
                    return;
                }

                showQuestion(current + 1);
            });

            previous.addEventListener('click', () => {
                if (current > 0) showQuestion(current - 1);
            });

            form.addEventListener('submit', (event) => {
                if (submittingAfterTimeout) return;

                const unansweredIndex = questions.findIndex((question) => !hasAnswer(question));
                if (unansweredIndex !== -1) {
                    event.preventDefault();
                    showQuestion(unansweredIndex);
                    error.textContent = 'أجب عن جميع الأسئلة قبل إنهاء الاختبار.';
                    error.classList.remove('hidden');
                }
            });

            const updateTimer = () => {
                const remaining = Math.max(0, Math.floor((deadline - Date.now()) / 1000));
                const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
                const seconds = String(remaining % 60).padStart(2, '0');
                timer.textContent = `${minutes}:${seconds}`;

                if (remaining === 0 && !submittingAfterTimeout) {
                    submittingAfterTimeout = true;
                    form.submit();
                }
            };

            showQuestion(0);
            updateTimer();
            window.setInterval(updateTimer, 1000);
        })();
    </script>
@endpush
