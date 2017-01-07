<?php


namespace MyTailor\Repositories;

use MyTailor\Designer;

class DbDesignersRepository implements DesignersRepositoryInterface
{
    /**
     * @var Designer
     */
    private $designers;

    /**
     * DbDesignersRepository constructor.
     * @param Designer $designers
     */
    public function __construct(Designer $designers)
    {

        $this->designers = $designers;
    }

    /**
     * @param $cat
     * @return mixed
     */
    public function favorites($cat)
    {


    }

    public function popular($cat)
    {
        
    }

    public function latest()
    {

    }

    public function local()
    {
        return $this->designers->with('user.profile', 'user.shots.image')
            ->orderBy("id")
            ->paginate(8);
    }

    public function showcase($cat)
    {

    }

}