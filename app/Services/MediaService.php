<?php

namespace App\Services;

use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaService
{
    /**
     * @param $file
     * @param string $type
     * @param null $filename
     * @return string|null
     */
    public static function upload($request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'file' =>  'required|file',
                'media_type' => 'required|integer', //1.image 2. video 3. file
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }
            $image_file = $request->file('file');
            $attrs = array(
                'filename' => $image_file->getClientOriginalName(),
                'extension' => $image_file->getClientOriginalExtension(),
                'size' => $image_file->getSize(),
                'mimeType' => $image_file->getMimeType()
            );
            if ($input['media_type'] == 1) {
                $filePath = Storage::disk('public')->put('/media/image', $input['file']);
            } else {
                $file_name = time() . '-' . strtolower(str_replace(' ', '-', $attrs['filename']));
                $filePath = '/media/file/' . $file_name;
                Storage::disk('public')->put($filePath, file_get_contents($image_file));
            }
            $new_name = basename($filePath);
            $MediaModel = new Media();
            $MediaModel->file_path = $new_name;
            $MediaModel->media_type = $input['media_type'];
            $MediaModel->attrs = serialize($attrs);
            $MediaModel->created_at = Carbon::now();
            $MediaModel->save();
            return ['status' => 200, 'data' => $MediaModel, 'file_name' => $image_file->getClientOriginalName(), 'msg' => 'Data has been added successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    public static function delete($request)
    {
        try {
            // Get the media items by their IDs
            $mediaItems = Media::whereIn('id', $request->ids)->get();

            // Loop through each media item and delete its associated file
            foreach ($mediaItems as $mediaItem) {
                // Delete the associated file from storage if it exists
                if (Storage::disk('public')->exists($mediaItem->file_path)) {
                    Storage::disk('public')->delete($mediaItem->file_path);
                }
                // Delete the media item from the database
                $mediaItem->delete();
            }

            return ['status' => 200, 'msg' => 'Data and associated media files have been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
