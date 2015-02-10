<?php

use Acme\Transformers\LessonTransformer;

class LessonsController extends \BaseController {

	/**
	 * @var Acme\Transformers\LessonTransformer
	 */
	protected $lessonTransformer;

	function __construct(LessonTransformer $lessonTransformer)
	{
		$this->lessonTransformer = $lessonTransformer;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lessons = Lesson::all();

		return Response::json([
			'data' => $this->lessonTransformer->transformCollection($lessons->all())
		], 200);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lesson = Lesson::find($id);

		if(!$lesson)
		{
			return Response::json([
				'error' => [
					'message' => 'Lesson does not exist'
				]
			], 404);
		}

		return Response::json([
			'data' => $this->lessonTransformer->transform($lesson)
		], 200);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
