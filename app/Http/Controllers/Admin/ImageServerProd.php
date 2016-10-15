<?php


namespace MyTailor\Http\Controllers\Admin;


use MyTailor\Modules\Core\Images\ImageServer;

class ImageServerProd extends ImageServer
{


    public function make($name)
    {
        $this->name = $name;
        $this->generateDirectory();

        $filename = public_path('uploads/'.$this->name.'.jpg');
        if(file_exists ($filename )){
            $this->push(file_get_contents($filename));
    }
        return $this;

    }

    public function push($file)
    {

        $this->makeVersions($file);

        return $this;
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
}