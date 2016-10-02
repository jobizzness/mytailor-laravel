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
                : $this->shots
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
     * @param ImageServer $imageServer
     * @internal param UploadServer $uploadServer
     */
    public function store(Request $request, ImageServer $imageServer) {

        $file = $request->file('files')[0];

        $image = $imageServer->makeVersions($file)->store($file);

        //get the size and width of the original
        //Create 3 directories from $name
        //Move images to their right directories


//        //$file_name = (new UploadServer)->get_name();
//        $publishable_type = 'MyTailor\\Brand';
//        $publishable_id = 1;
//        $published_by = Auth::user()->id;
//
//        $command = new PostShotCommand($file_name, $publishable_type, $publishable_id, $published_by);
//        $this->commandBus->execute($command);


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


        $update = $shot->fill($request->only('title', 'category', 'featured', 'published', 'views', 'source_url', 'description'))->save();

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
     * @return string
     */
    public function destroy($id){

        $file = new UploadServer();
        $file->delete(false, $id);

        $this->shots->where('file_name', '=', $id)->delete();

        
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
