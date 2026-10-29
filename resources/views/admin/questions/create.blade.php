@extends('admin.layout')

@section('title', 'إضافة سؤال')

@section('content')
    <div class="mx-auto max-w-3xl">
        <a href="{{ route('admin.questions.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-700 transition hover:text-brand-500 dark:text-gold-400">
            <span aria-hidden="true">→</span>
            العودة إلى بنك الأسئلة
        </a>
        <div class="mt-5">
            <span class="text-sm font-extrabold text-brand-600 dark:text-gold-400">بنك الأسئلة</span>
            <h1 class="mt-2 text-3xl font-extrabold text-brand-950 dark:text-white">إضافة سؤال جديد</h1>
            <p class="mt-2 leading-7 text-brand-700 dark:text-sand-200">أدخل نص السؤال وأربعة خيارات، ثم حدد الإجابة الصحيحة.</p>
        </div>

        @include('admin.questions._form', ['question' => $question, 'action' => route('admin.questions.store'), 'method' => 'POST'])
    </div>
@endsection
