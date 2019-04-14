<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CoordinateCreateRequest;
use App\Http\Requests\CoordinateUpdateRequest;
use App\Repositories\CoordinateRepository;
use App\Validators\CoordinateValidator;

/**
 * Class CoordinatesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CoordinatesController extends Controller
{
    /**
     * @var CoordinateRepository
     */
    protected $repository;

    /**
     * @var CoordinateValidator
     */
    protected $validator;

    /**
     * CoordinatesController constructor.
     *
     * @param CoordinateRepository $repository
     * @param CoordinateValidator $validator
     */
    public function __construct(CoordinateRepository $repository, CoordinateValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $coordinates = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coordinates,
            ]);
        }

        return view('coordinates.index', compact('coordinates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CoordinateCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CoordinateCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $coordinate = $this->repository->create($request->all());

            $response = [
                'message' => 'Coordinate created.',
                'data'    => $coordinate->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordinate = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coordinate,
            ]);
        }

        return view('coordinates.show', compact('coordinate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordinate = $this->repository->find($id);

        return view('coordinates.edit', compact('coordinate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CoordinateUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CoordinateUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $coordinate = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Coordinate updated.',
                'data'    => $coordinate->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Coordinate deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Coordinate deleted.');
    }
}
