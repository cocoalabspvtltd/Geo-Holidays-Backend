<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyBookUsBanner extends Model
{
    use HasFactory;

    protected $table = false;

    public $title;
    public $subtitle;
    public $description;

    public function __construct()
    {
        $this->title = config('why_book_us_banner.title');
        $this->subtitle = config('why_book_us_banner.subtitle');
        $this->description = config('why_book_us_banner.description');
    }

    public function saveBanner($data)
    {
        config(['why_book_us_banner.title' => $data['title']]);
        config(['why_book_us_banner.subtitle' => $data['subtitle']]);
        config(['why_book_us_banner.description' => $data['description']]);

        $this->saveToConfigFile($data);
    }

    protected function saveToConfigFile($data)
    {
        $path = config_path('why_book_us_banner.php');
        $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";
        file_put_contents($path, $content);
    }
}
