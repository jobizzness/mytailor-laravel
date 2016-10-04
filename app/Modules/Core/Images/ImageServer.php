<?php


namespace MyTailor\Modules\Core\Images;

use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageServer {

    protected $baseDir = '/public/uploads/shots';

    protected $Directory;
    protected $path;
    protected $width;
    protected $height;

    public function store()
    {


        //Filesystem store these files

        return $this;
    }

    public function makeVersions(UploadedFile $file, $allSizes=true, $versions=[])
    {
        $this->PrepareImage($file->getClientOriginalName());

        if($allSizes){

            $versions = Config::get('assets.images.sizes');

        }

        foreach($versions as $version){

            $width = $version['width'];

            if(array_key_exists('height', $version)){
                $height = $version['height'];
            }


            Image::make($this->path)->resize($width, $height)
                ->save($this->baseDir. '/'.$version.$this->path);

        }

        return $this;
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

        $Directory = '/'.$directories[0].'/'.$directories[1].'/'.$directories[2];

        return $Directory;

    }

    protected function PrepareImage($clientName)
    {
        $name = 'mt_' . md5($clientName . time());
        $this->Directory = $this->generateDirectory($name);
    }

}