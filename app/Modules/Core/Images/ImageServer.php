<?php


namespace MyTailor\Modules\Core\Images;

use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Contracts\Filesystem\Filesystem;

class ImageServer {

    /**
     * @var string
     */
    protected $baseDir = 'uploads/shots';

    /**
     * @var string
     */
    protected $cloudURL= 'https://s3.amazonaws.com/mytailor-v1/';

    /**
     * @var
     */
    protected $versions;

    /**
     * @var array
     */
    protected $magicMethods = ['original', 'large', 'medium', 'phone', 'small'];

    /**
     * @var
     */
    protected $Directory;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    private $filesystem;

    /**
     * ImageServer constructor.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {

        $this->filesystem = $filesystem;
    }

    /**
     * Upload the image and create its versions.
     * @param UploadedFile $file
     * @return $this
     */
    public function upload(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName();

        $this->generateName($fileName)
             ->generateDirectory()
             ->makeVersions($file->getRealPath());

        return $this;
    }



    public function uploadFromUrl($url)
    {

    }

    /**
     * @param array $images
     * @return bool
     */
    public function delete(array $images = [])
    {

        foreach($images as $image) {

            return $this->filesystem->delete($image);

        }
    }

    /**
     * Please Refactor Me.........
     * @param $file
     * @return $this
     */
    public function makeVersions($file)
    {
        $versions = Config::get('assets.images.versions');

        foreach($versions as $name => $version){

            $width = $this->getWidth($version);
            $height = $this->getHeight($version);

            $version = Image::make($file)
                ->encode('jpg', 75)
                ->fit($width, $height)->stream();

            $path = $this->baseDir. '/'.$name.$this->Directory.'/';
            $this->store($version->__toString(), $path);
        }

        $this->storeOriginal($file);

        return $this;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Generates a unique Directory 05/c4/d3
     *
     * @return string
     */
    protected function generateDirectory(){

        $directories = []; $c=0; $n=3;
        for($i=0; $i<3; $i++){
            $n = $n+$c; $d = substr($this->name, $n, 2);
            array_push($directories, $d); $c=2;
        };

        $this->Directory = '/'.$directories[0].'/'.$directories[1].'/'.$directories[2];

        return $this;

    }

    /**
     * Generates a unique name for the image.
     *
     * @param $clientName
     * @return string
     */
    protected function generateName($clientName)
    {
        $this->name = 'mt_' . md5($clientName . time());

        return $this;
    }

    /**
     * @param $image
     * @param $path
     */
    private function store($image, $path)
    {
        $this->filesystem->put($path.$this->name.'.jpg', $image, 'public');
    }


    /**
     * Generates methods based on the method call.
     * @param $name
     * @param $params
     * @return string
     */

    public function __call($name, $params)
    {
        if(in_array($name, $this->magicMethods)){
            return $this->imageUrl($name);
        }
    }


    /**
     * Return the URL of an image on the cloud.
     *
     * @param $version
     * @return string
     */
    protected function imageUrl($version)
    {
        return $this->cloudURL. $this->baseDir. '/'. $version . $this->Directory.'/'. $this->name . '.jpg';
    }

    /**
     * @param $file
     */
    protected function storeOriginal($file)
    {
        $original = Image::make($file)
            ->encode('jpg', 75)
            ->stream();
        $path = $this->baseDir . '/' . 'original' . $this->Directory . '/';
        $this->store($original->__toString(), $path);
    }

    private function getWidth($version)
    {
        return $version['width'];
    }

    /**
     * @param $version
     * @return null
     */
    private function getHeight($version)
    {
            if(array_key_exists('height', $version)){
               return $version['height'];
            }
        return null;
    }

}