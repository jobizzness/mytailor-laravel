<?php


namespace MyTailor\Modules\Core\Images;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Contracts\Filesystem\Filesystem;

class ImageServer {

    protected $baseDir = 'uploads\shots';
    protected $Directory;
    protected $name;
    protected $width;
    protected $height;
    /**
     * @var
     */
    private $filesystem;

    /**
     * ImageServer constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {


        //Filesystem store these files
        $this->filesystem = $filesystem;
    }

    public function makeVersions(UploadedFile $file, $allSizes=true, $versions=[])
    {
        $this->PrepareImage($file->getClientOriginalName());

            $versions = Config::get('assets.images.versions');


        foreach($versions as $name => $version){

            $width = $version['width'];

            if(array_key_exists('height', $version)){
                $height = $version['height'];
            }

            $path = $this->baseDir. '\\'.$name.$this->Directory.'\\';

            $this->filesystem->makeDirectory($path);

            $image = Image::make($file->getRealPath())->resize($width, $height);
            $this->filesystem->put($path.$this->name.'.'.$file->getClientOriginalExtension(), $image);
        }

    }



    /**
     * Generates a unique directory for the image.
     *
     * @param $clientName
     */
    protected function PrepareImage($clientName)
    {
        $this->name = 'mt_' . md5($clientName . time());
        $this->Directory = $this->generateDirectory($this->name);
    }

    /**
     * Generates a unique Directory 05/c4/d3
     *
     * @param $name
     * @return string
     */
    public function generateDirectory($name){

        $directories = []; $c=0; $n=3;
        for($i=0; $i<3; $i++){
            $n = $n+$c; $d = substr($name, $n, 2);
            array_push($directories, $d); $c=2;
        };

        $Directory = '\\'.$directories[0].'\\'.$directories[1].'\\'.$directories[2];

        return $Directory;

    }

}