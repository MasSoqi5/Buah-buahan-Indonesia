

USERNAME  : admin@indo.id
PASSWORD  : Buahkubuahkita!
 
ATAU jika pakai username field:
USERNAME  : admin
PASSWORD  : Buahkubuahkita!
|=============================================================
*/
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
 
class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@buahnusantara.id'],
            [
                'name'     => 'Super Admin',
                'email'    => 'admin@buahnusantara.id',
                'password' => Hash::make('BuahIndonesia2026!'),
            ]
        );
    }
}