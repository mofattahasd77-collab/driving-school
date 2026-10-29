<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactInformationController extends Controller
{
    public function edit(): View
    {
        return view('admin.contact-information.edit', [
            'contactInformation' => ContactInformation::query()->find(1) ?? new ContactInformation,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $whatsapp = $request->input('whatsapp');

        if (is_string($whatsapp)) {
            $request->merge(['whatsapp' => $this->normalizeSyrianWhatsappNumber($whatsapp)]);
        }

        $data = $request->validate([
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'regex:/^9639\d{8}$/'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:2000'],
            'working_hours' => ['nullable', 'string', 'max:2000'],
        ]);

        $contactInformation = ContactInformation::query()->firstOrNew(['id' => 1]);
        $contactInformation->fill($data);
        $contactInformation->save();

        return redirect()->route('admin.contact-information.edit')
            ->with('status', 'تم تحديث معلومات التواصل بنجاح.');
    }

    private function normalizeSyrianWhatsappNumber(string $number): string
    {
        $number = preg_replace('/[\s().-]+/u', '', $number) ?? $number;

        if (str_starts_with($number, '+963')) {
            return substr($number, 1);
        }

        if (str_starts_with($number, '00963')) {
            return substr($number, 2);
        }

        if (str_starts_with($number, '09')) {
            return '963'.substr($number, 1);
        }

        if (str_starts_with($number, '9')) {
            return '963'.$number;
        }

        return $number;
    }
}
