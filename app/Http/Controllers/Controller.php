<?php

namespace App\Http\Controllers;

use App\Glossary\Headers;
use App\Glossary\RequestParameters;
use App\Jobs\ETLUploadedFile;
use App\Models\UploadFile;
use App\Service\ETL\Contracts\UploadConfigurationInterface;
use App\Service\ETL\FactoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(Request $request, FactoryInterface $factory)
    {
        $requestData = [
            RequestParameters::FILE => $request->file,
            Headers::CALLBACK_URL => $request->header(Headers::CALLBACK_URL),
        ];
        $validator = Validator::make($requestData, [
            RequestParameters::FILE => [
                'required',
                File::types(['xlsx'])
                    ->max(2 * 1024),
            ],
            Headers::CALLBACK_URL =>[
                'required',
                'url',
            ],
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $path = $request->file(RequestParameters::FILE)->storeAs(
            'uploads', $request->user()->id
        );
        $uploadFile = new UploadFile();
        $uploadFile->user_id = $request->user()->id;
        $uploadFile->path = $path;
        $uploadFile->callback = $request->header(Headers::CALLBACK_URL);
        $uploadFile->processed = false;
        $uploadFile->save();
        ETLUploadedFile::dispatch($uploadFile->id);

        return response()->json();
    }
}
