<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use Exception;
use Illuminate\Http\Request;
use App\Repository\TagRepository;
use App\Http\Resources\TagResource;
use App\Models\Tag;

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


    public function show(Tag $tag)
    {
        try {
            return $this->sendResponse(new TagResource($tag), __('messages.success_list_data'), 200);
        } catch (Exception $e) {
            return $this->sendError(__('messages.error_500'), $e->getMessage(), 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagStoreRequest $request)
    {
        try {
            $tag = $this->tagRepository->create($request->all());
            return $this->sendResponse(new TagResource($tag), __('messages.success_store_data'), 200);
        } catch (Exception $e) {
            return $this->sendError(__('messages.error_500'), $e->getMessage(), 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tag $tag, TagUpdateRequest $request)
    {
        try {
            $data = $request->all();
            $this->tagRepository->update($tag, $data);

            return $this->sendResponse(new TagResource($tag), __('messages.success_store_data'), 200);
        } catch (Exception $e) {
            return $this->sendError(__('messages.error_500'), $e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            $this->tagRepository->delete($tag);
            return $this->sendResponse(null, __('messages.success_delete_data'), 200);
        } catch (Exception $e) {
            return $this->sendError(__('messages.error_500'), $e->getMessage(), 400);
        }
    }
}
