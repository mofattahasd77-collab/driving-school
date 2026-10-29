@extends('admin.layout')

@section('title', 'معلومات التواصل')

@section('content')
    <div class="mx-auto max-w-3xl">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-700 transition hover:text-brand-500 dark:text-gold-400">
            <span aria-hidden="true">→</span>
            العودة إلى لوحة الإدارة
        </a>

        <div class="mt-5">
            <span class="text-sm font-extrabold text-brand-600 dark:text-gold-400">إعدادات الموقع</span>
            <h1 class="mt-2 text-3xl font-extrabold text-brand-950 dark:text-white">معلومات التواصل</h1>
            <p class="mt-2 leading-7 text-brand-700 dark:text-sand-200">تظهر المعلومات التي تدخلها هنا في تذييل الصفحة الرئيسية.</p>
        </div>

        <form method="POST" action="{{ route('admin.contact-information.update') }}" class="mt-7 rounded-3xl border border-brand-900/10 bg-white p-5 shadow-sm sm:p-8 dark:border-white/10 dark:bg-brand-900">
            @csrf
            @method('PUT')

            <div class="grid gap-6">
                <div>
                    <label for="phone" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">رقم الهاتف</label>
                    <input id="phone" name="phone" type="text" value="{{ old('phone', $contactInformation->phone) }}" maxlength="50" dir="ltr" class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 text-left text-brand-950 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white">
                    @error('phone') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="whatsapp" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">رقم واتساب</label>
                    <input id="whatsapp" name="whatsapp" type="text" value="{{ old('whatsapp', $contactInformation->whatsapp) }}" maxlength="50" dir="ltr" class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 text-left text-brand-950 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white">
                    <p class="mt-2 text-xs leading-6 text-brand-600 dark:text-sand-300">أدخل الرقم السوري مثل 09xxxxxxxx أو +9639xxxxxxxx، وسيُنشأ رابط واتساب تلقائيًا.</p>
                    @error('whatsapp') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">البريد الإلكتروني</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $contactInformation->email) }}" maxlength="255" dir="ltr" class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 text-left text-brand-950 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white">
                    @error('email') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="address" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">العنوان</label>
                    <textarea id="address" name="address" rows="3" maxlength="2000" class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 leading-7 text-brand-950 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white">{{ old('address', $contactInformation->address) }}</textarea>
                    @error('address') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="working_hours" class="mb-2 block text-sm font-extrabold text-brand-900 dark:text-sand-100">ساعات العمل</label>
                    <textarea id="working_hours" name="working_hours" rows="3" maxlength="2000" class="w-full rounded-xl border border-brand-900/15 bg-sand-50 px-4 py-3 leading-7 text-brand-950 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 dark:border-white/15 dark:bg-brand-950 dark:text-white">{{ old('working_hours', $contactInformation->working_hours) }}</textarea>
                    @error('working_hours') <p class="mt-2 text-sm font-semibold text-red-700 dark:text-red-300">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-brand-900/10 pt-6 sm:flex-row sm:justify-end dark:border-white/10">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-xl border border-brand-900/15 px-5 py-3 font-bold text-brand-800 transition hover:bg-brand-50 dark:border-white/15 dark:text-white dark:hover:bg-white/10">عرض الموقع</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-brand-800 px-6 py-3 font-extrabold text-white transition hover:bg-brand-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:bg-gold-400 dark:text-brand-950 dark:hover:bg-gold-500">حفظ معلومات التواصل</button>
            </div>
        </form>
    </div>
@endsection
