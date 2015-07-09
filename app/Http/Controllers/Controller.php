<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response(array $data)
    {
        return response()->json([
            'data' => $data
        ], 200);
    }
    public function responseWithPaginate(array $data, $collection)
    {
        return response()->json([
            'data' => $data,
            'paginator' => [
                'total_count' => $collection->total(),
                'total_page' => ceil($collection->total() / $collection->perPage()),
                'current_page' => $collection->currentPage()
            ]
        ], 200);
    }

    public function responseCreate($modelname)
    {
        return response([
            'message' => "{$modelname} has been created successfully."
        ], 201);
    }

    public function responseUpdate($modelname)
    {
        return response()->json([
            'message' => "{$modelname} has been updated successfully."
        ], 200);
    }

    public function responseDelete($modelname)
    {
        return response()->json([
            'message' => "{$modelname} has been deleted successfully."
        ], 200);
    }

    public function responseBad($message)
    {
        return response()->json([
            'error' => $message
        ], 400);
    }
}
