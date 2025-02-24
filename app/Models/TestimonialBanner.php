<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialBanner extends Model
{
    use HasFactory;

    protected $table = false;

    public $title;
    public $subtitle;

    public function __construct()
    {
        $this->title = config('testimonial_banner.title');
        $this->subtitle = config('testimonial_banner.subtitle');
    }

    public function saveBanner($data)
    {
        config(['testimonial_banner.title' => $data['title']]);
        config(['testimonial_banner.subtitle' => $data['subtitle']]);

        $this->saveToConfigFile($data);
    }

    protected function saveToConfigFile($data)
    {
        $path = config_path('testimonial_banner.php');
        $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";
        file_put_contents($path, $content);
    }
}
