<?php

namespace App\Service;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostServices
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {

        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $image = DB::table('posts')->select('*')->where('id', $post->id)->get()->first();

            if (isset($data['preview_image'])) {

                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

                if ($image->preview_image != null) {
                    Storage::disk('public')->delete('images', $image->preview_image);
                }

            }
            if (isset($data['main_image'])) {

                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

                if ($image->main_image != null) {
                    Storage::disk('public')->delete('images', $image->main_image);
                }

            }

            if ($image->main_image == null || $image->preview_image == null) {} else {
                Storage::disk('public')->delete('images', $image->main_image, $image->preview_image);
            }

            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }

    public function delete(Post $post)
    {
        $image = DB::table('posts')->select('*')->where('id', $post->id)->get()->first();
        Storage::disk('public')->delete('images', $image->main_image, $image->preview_image);
        $post->delete();

    }
}
