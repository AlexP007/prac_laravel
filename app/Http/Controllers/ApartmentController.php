<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Exception;
use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;
use Illuminate\Http\{Response, Request};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $paginate = $request->user()->apartments()->paginate(20);
        $body = [
            'meta' => [
                'page' => $paginate->currentPage(),
                'totalPages' => $paginate->lastPage(),
                'nextPage' => $paginate->nextPageUrl(),
                'prevPage' => $paginate->previousPageUrl(),
            ],
            'data' => $paginate->items(),
        ];
        return response($body);
    }

    public function show(Request $request, $id)
    {
        $apartment = Apartment::with('images')->find($id);
        if (!$apartment) {
            return response([
                'errors' => ['apartment' => ['Bad Request']],
            ], 400);
        }

        $this->checkUserId($apartment, $request->user()->id);

        return response([
            'data' => $apartment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApartmentRequest $request
     * @return Response
     */
    public function store(ApartmentRequest $request): Response
    {
        $apartment = new Apartment($request->all());
        $apartment->user_id = $request->user()->id;
        $apartment->save();
        return response([
            'data' => $apartment,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ApartmentRequest $request
     * @param Apartment $apartment
     * @return Response
     */
    public function update(ApartmentRequest $request, $id)
    {
        $apartment = Apartment::find($id);
        if (!$apartment) {
            return response([
                'errors' => ['apartment' => ['Bad Request']],
            ], 400);
        }
        $this->checkUserId($apartment, $request->user()->id);
        $apartment->update($request->all());
        return response([
            'data' => $apartment,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Apartment $apartment
     * @return Response
     * @throws Exception
     */
    public function destroy(Request $request, Apartment $apartment)
    {
        $this->checkUserId($apartment, $request->user()->id);
        $apartment->delete();
        return response('', 204);
    }

    public function imageSave(Request $request, Apartment $apartment)
    {
        $this->checkUserId($apartment, $request->user()->id);

        $validator = Validator::make($request->all(), [
            'image' => 'required|image:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->messages(),
            ], 403);
        }

        if (!$apartment->id) {
            return response([
                'errors' => ['apartment' => ["apartment doesn\t exists"]],
            ], 403);
        }

        $uploadFolder = 'apartments';
        $image = $request->file('image');
        $path = $image->store($uploadFolder, 'public');
        $url = Storage::disk('public')->url($path);

        $image = new Image(['path' => $path, 'url' => $url]);
        $apartment->images()->save($image);

        return response([
            'data' => ['url' => $url]
        ]);
    }

    private function checkUserId(Apartment $apartment, int $id): void
    {
        if (!$apartment->checkUserId($id)) {
            throw new HttpResponseException(response([
                'errors' => ['user' => ['Not valid user']]
            ], 403));
        }
    }
}
