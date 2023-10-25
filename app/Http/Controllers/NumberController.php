<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberRequest;
use App\Http\Resources\NumberResource;
use App\Models\Number;
use App\Services\NumberGenerate;
use Illuminate\Http\JsonResponse;

class NumberController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NumberResource::collection(Number::get());
    }

    public function generate(NumberRequest $request): NumberResource
    {
        return NumberResource::make(Number::create([
            'number' => NumberGenerate::generate($request->validated('count')),
        ]));

    }

    public function retrieve(Number $number): NumberResource
    {
        return NumberResource::make($number);
    }

    /**
     * @return NumberResource
     */
    public function update(NumberRequest $request, Number $number)
    {
        $number->update([
            'number' => NumberGenerate::generate($request->validated('count')),
        ]);

        return NumberResource::make($number->refresh());
    }

    /**
     * @param  string  $id
     */
    public function destroy(Number $number): JsonResponse
    {
        $number->delete();

        return response()->json(['message' => 'Ok'], 204);
    }
}
