<?php

namespace MyTailor\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use MyTailor\Http\Requests;
use MyTailor\Repositories\DbShotsRepository;
use MyTailor\Http\Controllers\Controller;

class ExploreController extends Controller
{

    /**
     * @var DbShotsRepository
     */
    private $shots;
    /**
     * @var Request
     */
    private $request;

    /**
     * ExploreController constructor.
     * @param DbShotsRepository $shots
     * @param Request $request
     */
    public function __construct(DbShotsRepository $shots, Request $request)
    {

        $this->shots = $shots;
        $this->request = $request;
    }

    public function index($slug)
    {
        $slug = str_replace('-', ' ', $slug);

        $cat = $this->request->get('cat') ? $this->request->get('cat') : null;
        $cat = $this->append($cat);

        $shots = $this->shots->explore($slug, $cat);

        return $shots;

    }

    private function append($cat)
    {
        switch($cat){

            case 'ma':
                return 'men';

            case 'fm':
                return 'women';

            case 'cu':
                return 'couples';

            case 'ki':
                return 'kids';

            Default:
                return null;

        }
    }
}
