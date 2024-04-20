<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repository\TagRepository;
use App\Http\Resources\TagResource;

class TagController extends BaseController
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        try {
            $data = $this->tagRepository->all();
            return $this->sendResponse(TagResource::collection($data), __('messages.success_list_data'), 200);
        } catch (Exception $e) {
            return $this->sendError(__('messages.error_500'), $e->getMessage(), 400);
        }
    }


    public function show($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
