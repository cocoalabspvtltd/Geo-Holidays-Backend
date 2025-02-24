<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCommitmentBanner extends Model
{
    use HasFactory;

    protected $table = false;

    public $title;
    public $subtitle;

    public function __construct()
    {
        $this->title = config('our_commitment_banner.title');
        $this->subtitle = config('our_commitment_banner.subtitle');
    }

    public function saveBanner($data)
    {
        config(['our_commitment_banner.title' => $data['title']]);
        config(['our_commitment_banner.subtitle' => $data['subtitle']]);

        $this->saveToConfigFile($data);
    }

    protected function saveToConfigFile($data)
    {
        $path = config_path('our_commitment_banner.php');
        $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";
        file_put_contents($path, $content);
    }
}
