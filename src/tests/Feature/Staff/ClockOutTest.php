<?php

namespace Tests\Feature\Staff;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class ClockOutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'name' => 'テスト太郎',
            'email' => 'test123@example.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2025-05-01 09:00:00',
        ]);
        Carbon::setTestNow(Carbon::create(2025, 5, 1, 12, 00, 0));
    }

    //画面上に「退勤」ボタンが表示され、処理後に画面上に表示されるステータスが「退勤済」になる
    public function testClockOutButton()
    {
        $attendance = Attendance::create([
            'user_id' => $this->user->id,
            'attendance_date' => '2025-05-01',
            'clock_in_at' => '09:00:00'
        ]);
        $response = $this->post('login', [
            'email' => 'test123@example.com',
            'password' => 'password123'
        ]);
        $response->assertRedirect('/attendance');
        $response = $this->get('/attendance');
        $response->assertSee('退勤');
        $response = $this->post('/attendance/clockout');
        $response = $this->get('/attendance');
        $response->assertSee('退勤済');
    }
    //管理画面に退勤時刻が正確に記録されている
    public function testAttendanceTimeConfirmation()
    {
        $response = $this->post('login', [
            'email' => 'test123@example.com',
            'password' => 'password123'
        ]);
        $response = $this->get('/attendance');
        $response = $this->post('/attendance/clockin');
        $response = $this->post('/attendance/clockout');
        $response = $this->get('/attendance/list/2025/5');
        $response->assertSeeInOrder([
            '05/01(木)',
            '12:00',
            '12:00',
            '00:00',
            '00:00'
        ]);
    }
}
