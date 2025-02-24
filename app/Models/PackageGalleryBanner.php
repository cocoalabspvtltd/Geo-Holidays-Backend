<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageGalleryBanner extends Model
{
    use HasFactory;

    protected $table = false;

    public $title;
    public $subtitle;
    public $description;


    public function __construct()
    {
        $this->title = config('package_gallery_banner.title');
        $this->subtitle = config('package_gallery_banner.subtitle');
        $this->description = config('package_gallery_banner.description');
    }

    public function saveBanner($data)
    {
        config(['package_gallery_banner.title' => $data['title']]);
        config(['package_gallery_banner.subtitle' => $data['subtitle']]);
        config(['package_gallery_banner.description' => $data['description']]);

        $this->saveToConfigFile($data);
    }

    protected function saveToConfigFile($data)
    {
        $path = config_path('package_gallery_banner.php');
        $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";
        file_put_contents($path, $content);
    }
}
