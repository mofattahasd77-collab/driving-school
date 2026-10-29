@php
    $options = $question->options ?? [];
    $correctOption = old('correct_option', $question->correct_option);
    $isPublished = old('is_published', $question->is_published ?? false);
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="mt-7 rounded-3xl border border-brand-900/10 bg-white p-5 shadow-sm sm:p-8 dark:border-white/10 dark:bg-brand-900">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="grid gap-6">
        <div>
            <label for="category" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">تصنيف السؤال <span class="text-red-600">*</span></label>
            <select id="category" name="category" required class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 text-brand-950 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white">
                <option value="">اختر تصنيف السؤال</option>
                @foreach ($categories as $value => $label)
                    <option value="{{ $value }}" @selected(old('category', $question->category) === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('category') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="question" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">نص السؤال <span class="text-red-600">*</span></label>
            <textarea id="question" name="question" rows="4" required maxlength="5000" class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 leading-7 text-brand-950 outline-none transition placeholder:text-brand-500/70 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white" placeholder="اكتب نص السؤال هنا...">{{ old('question', $question->question) }}</textarea>
            @error('question') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
        </div>

        <fieldset>
            <legend class="mb-3 text-sm font-extrabold text-brand-900 dark:text-sand-100">الخيارات والإجابة الصحيحة <span class="text-red-600">*</span></legend>
            <p class="mb-4 text-sm leading-6 text-brand-600 dark:text-sand-300">اكتب أربعة خيارات، ثم اختر الدائرة بجانب الإجابة الصحيحة.</p>
            <div class="grid gap-4">
                @foreach (['a' => 'أ', 'b' => 'ب', 'c' => 'ج', 'd' => 'د'] as $key => $label)
                    <div class="rounded-2xl border border-brand-900/10 bg-sand-50 p-4 dark:border-white/10 dark:bg-brand-950">
                        <div class="flex items-center justify-between gap-3">
                            <label for="option_{{ $key }}" class="text-sm font-bold text-brand-800 dark:text-sand-100">الخيار {{ $label }}</label>
                            <label class="inline-flex cursor-pointer items-center gap-2 text-xs font-bold text-brand-700 dark:text-gold-400">
                                <input type="radio" name="correct_option" value="{{ $key }}" required @checked($correctOption === $key) class="size-4 accent-brand-700">
                                الإجابة الصحيحة
                            </label>
                        </div>
                        <input id="option_{{ $key }}" name="option_{{ $key }}" type="text" value="{{ old('option_'.$key, $options[$key] ?? '') }}" required maxlength="1000" class="mt-3 w-full rounded-xl border border-brand-900/15 bg-white px-4 py-3 text-brand-950 outline-none transition placeholder:text-brand-500/70 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-900 dark:text-white" placeholder="اكتب نص الخيار {{ $label }}">
                        @error('option_'.$key) <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
                    </div>
                @endforeach
            </div>
            @error('correct_option') <p class="mt-3 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
        </fieldset>

        <div>
            <label for="explanation" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">شرح الإجابة <span class="font-medium text-brand-500">(اختياري)</span></label>
            <textarea id="explanation" name="explanation" rows="3" maxlength="5000" class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 leading-7 text-brand-950 outline-none transition placeholder:text-brand-500/70 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white" placeholder="يمكن إضافة شرح يظهر بعد الإجابة...">{{ old('explanation', $question->explanation) }}</textarea>
            @error('explanation') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="image" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">صورة السؤال <span class="font-medium text-brand-500">(اختيارية)</span></label>
            <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" class="block w-full cursor-pointer rounded-xl border border-brand-900/15 bg-sand-50 text-sm text-brand-700 file:me-4 file:border-0 file:bg-brand-100 file:px-4 file:py-3 file:font-bold file:text-brand-800 hover:file:bg-brand-200 dark:border-white/15 dark:bg-brand-950 dark:text-sand-200 dark:file:bg-white/10 dark:file:text-white">
            <p class="mt-2 text-xs leading-6 text-brand-600 dark:text-sand-300">الصيغ المدعومة: JPG وPNG وWEBP. الحد الأقصى لحجم الصورة 5 ميجابايت.</p>
            @error('image') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror

            @if ($question->image_path)
                <div class="mt-4 flex flex-wrap items-center gap-4 rounded-2xl border border-brand-900/10 p-4 dark:border-white/10">
                    <img src="{{ asset('images/'.$question->image_path) }}" alt="الصورة الحالية للسؤال" class="size-24 rounded-xl object-cover">
                    <label class="inline-flex items-center gap-2 text-sm font-semibold text-brand-800 dark:text-sand-100">
                        <input type="checkbox" name="remove_image" value="1" class="size-4 rounded accent-brand-700">
                        إزالة الصورة الحالية
                    </label>
                </div>
            @endif
        </div>

        <div class="rounded-2xl border border-brand-900/10 bg-sand-50 p-4 dark:border-white/10 dark:bg-brand-950">
            <input type="hidden" name="is_published" value="0">
            <label class="flex cursor-pointer items-start gap-3">
                <input type="checkbox" name="is_published" value="1" @checked($isPublished) class="mt-1 size-4 rounded accent-brand-700">
                <span>
                    <span class="block font-extrabold text-brand-900 dark:text-white">نشر السؤال للمتدربين</span>
                    <span class="mt-1 block text-sm leading-6 text-brand-600 dark:text-sand-300">عند إلغاء النشر، يبقى السؤال محفوظًا كمسودة ولا يظهر في التدريب.</span>
                </span>
            </label>
            @error('is_published') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-brand-900/10 pt-6 sm:flex-row sm:justify-end dark:border-white/10">
        <a href="{{ route('admin.questions.index') }}" class="inline-flex items-center justify-center rounded-xl border border-brand-900/15 px-5 py-3 font-bold text-brand-800 transition hover:bg-brand-50 dark:border-white/15 dark:text-white dark:hover:bg-white/10">إلغاء</a>
        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-800 px-6 py-3 font-extrabold text-white shadow-lg shadow-brand-900/10 transition hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">
            {{ $method === 'POST' ? 'حفظ السؤال' : 'حفظ التعديلات' }}
        </button>
    </div>
</form>
