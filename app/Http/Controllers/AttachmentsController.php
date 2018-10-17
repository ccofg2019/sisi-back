<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AttachmentsCreateRequest;
use App\Http\Requests\AttachmentsUpdateRequest;
use App\Repositories\AttachmentsRepository;
use App\Validators\AttachmentsValidator;

/**
 * Class AttachmentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AttachmentsController extends Controller
{
    /**
     * @var AttachmentsRepository
     */
    protected $repository;

    /**
     * @var AttachmentsValidator
     */
    protected $validator;

    /**
     * AttachmentsController constructor.
     *
     * @param AttachmentsRepository $repository
     * @param AttachmentsValidator $validator
     */
    public function __construct(AttachmentsRepository $repository, AttachmentsValidator $validator)
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
        $attachments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $attachments,
            ]);
        }

        return view('attachments.index', compact('attachments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AttachmentsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AttachmentsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $attachment = $this->repository->create($request->all());

            $response = [
                'message' => 'Attachments created.',
                'data'    => $attachment->toArray(),
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
        $attachment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $attachment,
            ]);
        }

        return view('attachments.show', compact('attachment'));
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
        $attachment = $this->repository->find($id);

        return view('attachments.edit', compact('attachment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AttachmentsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AttachmentsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $attachment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Attachments updated.',
                'data'    => $attachment->toArray(),
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
                'message' => 'Attachments deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Attachments deleted.');
    }
}
