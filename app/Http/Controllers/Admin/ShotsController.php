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
     * @param ImageServer $imageServer
     * @internal param UploadServer $uploadServer
     * @return bool
     */
    public function store(Request $request, ImageServer $imageServer) {

        $file = $request->file('files')[0];

        $image = $imageServer->upload($file);

        $publishable_type = 'MyTailor\\Brand';
        $publishable_id = 1;
        $published_by = Auth::user()->id;


        $command = new PostShotCommand($publishable_type, $publishable_id, $published_by, $image);
        $this->commandBus->execute($command);

        return true;
    }

    /*
     * Temporaly for bulk actions
     */
    public function clean(ImageServerProd $imageServer)
    {
        $shots = Shot::where('published', '!=', 1)->get();

        foreach($shots as $shot)
        {

            dd($shots);
            
            // Delete the image
            $status = $imageServer->delete([
                    $shot->image()->large,
                    $shot->image()->medium,
                    $shot->image()->original,
                    $shot->image()->phone,
                    $shot->image()->small
            ]);

            if($status){

                $shot->image()->delete();
                $shot->delete();
                //Delete the shot and its image

            }

        }
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
