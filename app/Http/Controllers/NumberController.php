<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberRequest;
use App\Http\Resources\NumberResource;
use App\Models\Number;
use App\Services\NumberGenerate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NumberResource::collection(Number::get());
    }

    /**
     * @param NumberRequest $request
     * @return NumberResource
     */
    public function store(NumberRequest $request): NumberResource
    {
        return NumberResource::make(Number::create([
            'number' => NumberGenerate::generate($request->validated('count')),
        ]));

    }

    /**
     * @param Number $number
     * @return NumberResource
     */
    public function show(Number $number): NumberResource
    {
        return NumberResource::make($number);
    }

    /**
     * @param NumberRequest $request
     * @param Number $number
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
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(Number $number): JsonResponse
    {
        $number->delete();
        return response()->json(['message' => 'Ok'], 204);
    }
}
