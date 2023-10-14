<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagemRequest;
use App\Models\Imagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller
{
    public function upload(ImagemRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['caminho'] = $request->file('imagem')->store('imagens', options: 'public');
        $data = Imagem::create($validatedData);

        return response($data, 200);
    }
}
