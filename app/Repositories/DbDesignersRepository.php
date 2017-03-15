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
     * @param $limit
     * @return mixed
     */
    public function newest($limit)
    {
        return $this->designers
            ->orderBy('created_at', 'desc')
            ->limit($limit);

    }


    public function random($limit)
    {
        return $this->designers->with('user.profile', 'user.shots.image')
            ->orderBy("id")
            ->paginate($limit);
    }

    public function local()
    {
        return $this->designers->with('user.profile', 'user.shots.image')
            ->orderBy("id")
            ->paginate(8);
    }


}