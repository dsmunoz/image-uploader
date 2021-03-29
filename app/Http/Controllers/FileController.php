<?php


namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Lib\FileUploads\RXFloDevGateway;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    /**
     * @var RXFloDevGateway $RXFloDevGateWay
     */
    private $RXFloDevGateWay;

    public function __construct(RXFloDevGateway $RXFloDevGateway)
    {
        $this->RXFloDevGateWay = $RXFloDevGateway;
    }

    public function upload(ImageUploadRequest $request)
    {
        $file = $request->file->store('public/uploads');
        $path = str_replace('public/uploads/', '/home/vagrant/code/storage/app/public/uploads/', $file);
        $response = $this->RXFloDevGateWay->uploadFile($path);
        File::delete($path);
        return response($response, 201);
    }

}
