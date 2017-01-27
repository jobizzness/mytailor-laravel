<?php

namespace MyTailor\Http\Controllers\Admin;


use Illuminate\Support\Facades\Response;
use MyTailor\Image;
use MyTailor\Modules\Core\Images\ImageServer;
use MyTailor\Modules\Shots\PostShotCommand;
use MyTailor\Shot;
use MyTailor\Tag;
use Illuminate\Http\Request;
use MyTailor\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Laracasts\Commander\CommandBus;

class ShotsController extends Controller    {

    protected $shots;
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * ShotsController constructor.
     * @param Shot $shots
     * @param CommandBus $commandBus
     */
    public function __construct(Shot $shots, CommandBus $commandBus) {
        $this->shots = $shots;
        $this->commandBus = $commandBus;

        parent::__construct();
    }

    /**
     *  show me a list of shots
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {

        $query = $request->get('q');
        $shots = $query ? Shot::search($query)->paginate(15)
            : $this->shots->with('image')
                ->where('image_id', '!=', 0)
                ->orderBy('shots.created_at', 'desc')->paginate(15);

        //also send along tags
        $tags = Tag::lists('id', 'tag_name');

        return view('admin.shots.index', compact('shots', 'tags'));


    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shots.upload');
    }

    /**
     * save a new shot
     * @param Request $request
     * @return bool
     */
    public function store(Request $request) {


        $file = $request->file('files')[0];
        $publishable_id = Auth::user()->id;
        $publishable_type = 'MyTailor\Brand';
        $published_by = Auth::user()->id;

        // Upload the image and Add a new Shot
        $command = new PostShotCommand($publishable_type, $publishable_id, $published_by, $file);
        return $this->commandBus->execute($command);

    }


    /**
     * @param $id
     * @return mixed
     */
    public function show($id) {

        $shot = Shot::with('tags')->where(
            'id', '=', $id)->first();

        return $shot;

    }

    /**
     * Update a shot.
     *
     * @param Requests\UpdateShotRequest $request
     * @param $id
     * @return string
     */
    public function update(Requests\UpdateShotRequest $request, $id) {

        $shot = $this->shots->findOrFail($id);


        $update = $shot->fill($request->only('views', 'category', 'featured', 'published', 'views', 'source_url', 'description'))->save();

        $this->attachTags($request, $shot);

        if(! $update){
            return Response::json([
                'data' => [
                    'message' => 'Opps ! there was an error'
                ]
            ], 503);
        }

        return Response::json([
            'data' => [
                'message' => 'Shot was updated successfully.'
            ]
        ], 200);


    }

    /**
     * @param $id
     * @param ImageServer $imageServer
     * @return string
     */
    public function destroy($id, ImageServer $imageServer){


        $shot = $this->shots->where('file_name', $id)->first();

        if($shot){

            $images = [$shot->image->original, $shot->image->phone, $shot->image->medium, $shot->image->large];

            $imageServer->delete($images);
            $shot->delete();


        }

    }

    /**
     * Sync up list of tags in the database .
     *
     * @param Requests\UpdateShotRequest $request
     *
     * @param $shot
     */
    protected function attachTags(Requests\UpdateShotRequest $request, $shot)
    {
        $tags = $request->only("tags");

        foreach ($tags['tags'] as $tag) {
            $tagId[] = $tag['id'];
        };

        if(empty($tagId)){
            $tagId = [];
        }
        $shot->tags()->sync($tagId);
    }

}
