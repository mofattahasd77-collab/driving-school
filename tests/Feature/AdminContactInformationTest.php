<?php

namespace Tests\Feature;

use App\Models\ContactInformation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AdminContactInformationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_admin_can_update_contact_information_and_it_appears_on_the_homepage(): void
    {
        $contactInformation = [
            'phone' => '+963 11 123 4567',
            'whatsapp' => '+963 933 123 456',
            'email' => 'info@example.com',
            'address' => 'حمص، سوريا',
            'working_hours' => 'من الأحد إلى الخميس، 9 صباحًا حتى 5 مساءً',
        ];

        $this->actingAs(User::factory()->admin()->create())
            ->put(route('admin.contact-information.update'), $contactInformation)
            ->assertRedirect(route('admin.contact-information.edit'))
            ->assertSessionHas('status', 'تم تحديث معلومات التواصل بنجاح.');

        $contactInformation['whatsapp'] = '963933123456';
        $this->assertDatabaseHas('contact_information', $contactInformation + ['id' => 1]);

        $this->get(route('admin.contact-information.edit'))
            ->assertOk()
            ->assertSee($contactInformation['phone'])
            ->assertSee($contactInformation['email']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee($contactInformation['phone'])
            ->assertSee($contactInformation['whatsapp'])
            ->assertSee($contactInformation['email'])
            ->assertSee($contactInformation['address'])
            ->assertSee($contactInformation['working_hours'])
            ->assertSee('href="https://wa.me/963933123456"', false)
            ->assertSee('تواصل عبر واتساب');
    }

    #[DataProvider('syrianWhatsappNumbers')]
    public function test_admin_can_save_supported_syrian_whatsapp_number_formats(string $number): void
    {
        $this->actingAs(User::factory()->admin()->create())
            ->put(route('admin.contact-information.update'), [
                'whatsapp' => $number,
            ])
            ->assertRedirect(route('admin.contact-information.edit'));

        $this->assertDatabaseHas('contact_information', [
            'id' => 1,
            'whatsapp' => '963933123456',
        ]);
    }

    public static function syrianWhatsappNumbers(): array
    {
        return [
            'local with leading zero' => ['0933 123 456'],
            'local without leading zero' => ['933123456'],
            'international with 00 prefix' => ['00963 933 123 456'],
        ];
    }

    public function test_only_admins_can_manage_contact_information(): void
    {
        $this->get(route('admin.contact-information.edit'))
            ->assertRedirect(route('login'));

        $this->actingAs(User::factory()->create())
            ->get(route('admin.contact-information.edit'))
            ->assertForbidden();

        $this->actingAs(User::factory()->create())
            ->put(route('admin.contact-information.update'), [
                'phone' => '+963 11 123 4567',
            ])
            ->assertForbidden();

        $this->assertDatabaseCount('contact_information', 0);
    }

    public function test_invalid_contact_email_is_rejected_without_persisting_changes(): void
    {
        $this->actingAs(User::factory()->admin()->create())
            ->from(route('admin.contact-information.edit'))
            ->put(route('admin.contact-information.update'), [
                'phone' => '+963 11 123 4567',
                'whatsapp' => '',
                'email' => 'not-an-email',
                'address' => '',
                'working_hours' => '',
            ])
            ->assertRedirect(route('admin.contact-information.edit'))
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('contact_information', 0);
    }

    public function test_invalid_syrian_whatsapp_number_is_rejected_without_persisting_changes(): void
    {
        $this->actingAs(User::factory()->admin()->create())
            ->from(route('admin.contact-information.edit'))
            ->put(route('admin.contact-information.update'), [
                'whatsapp' => '12345',
            ])
            ->assertRedirect(route('admin.contact-information.edit'))
            ->assertSessionHasErrors('whatsapp');

        $this->assertDatabaseCount('contact_information', 0);
    }
}
