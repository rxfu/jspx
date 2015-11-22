<?php

class IndexController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {

		$title = '二级指标列表';
		$indexes = Index::with( 'Category' )->orderBy( 'order', 'asc' )->get();

		return View::make( 'index.list', array( 'title' => $title, 'indexes' => $indexes ) );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew() {

		$title = '添加二级指标';
		$category = Category::orderBy( 'order', 'asc' )->lists( 'name', 'id' );
		$mark = Mark::orderBy( 'order', 'asc' )->lists( 'name', 'id' );
		$collectionDepartment = Department::where( 'collector', 1 )
		->orderBy( 'name', 'asc' )
		->lists( 'name', 'id' );
		$markDepartment = Department::where( 'marker', 1 )
		->orderBy( 'name', 'asc' )
		->lists( 'name', 'id' );

		return View::make( 'index.new', array( 'title' => $title, 'category' => $category, 'mark' => $mark, 'collectionDepartment' => $collectionDepartment, 'markDepartment' => $markDepartment ) );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave() {

		$data = Input::all();

		$rules = array(
			'name' => 'required|unique:indexes',
			'order' => 'numeric',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$index = new Index;
			$index->seq = Input::get( 'seq' );
			$index->name = Input::get( 'name' );
			$index->description = nl2br( Input::get( 'description' ) );
			$index->type = Input::get( 'type' );
			$index->has_file = Input::get( 'has_file' );
			$index->order = Input::get( 'order' );
			$index->collection_department = Input::get( 'collection_department' );
			$index->mark_department = Input::get( 'mark_department' );
			$index->category_id = Input::get( 'category' );
			$index->mark_id = Input::get( 'mark' );
			$index->activated = Input::get( 'activated' );
			$index->memo = Input::get( 'memo' );

			if ( $index->save() ) {
				return Redirect::route( 'index.list' )->with( 'flash_success', '二级指标 ' . $index->name . ' 添加成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '二级指标添加失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getShow( $id ) {

		$title = '二级指标详细信息';
		$index = Index::find( $id );

		return View::make( 'index.show', array( 'title' => $title, 'index' => $index ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit( $id ) {

		$title = '编辑二级指标';
		$index = Index::find( $id );
		$category = Category::orderBy( 'order', 'asc' )->lists( 'name', 'id' );
		$mark = Mark::orderBy( 'order', 'asc' )->lists( 'name', 'id' );
		$collectionDepartment = Department::where( 'collector', 1 )
		->orderBy( 'name', 'asc' )
		->lists( 'name', 'id' );
		$markDepartment = Department::where( 'marker', 1 )
		->orderBy( 'name', 'asc' )
		->lists( 'name', 'id' );

		return View::make( 'index.edit', array( 'title' => $title, 'index' => $index, 'category' => $category, 'mark' => $mark, 'collectionDepartment' => $collectionDepartment, 'markDepartment' => $markDepartment ) );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postUpdate( $id ) {

		$data = Input::all();

		$rules = array(
			'order' => 'numeric',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$index = Index::find( $id );
			$index->seq = Input::get( 'seq' );
			$index->name = Input::get( 'name' );
			$index->description = nl2br( Input::get( 'description' ) );
			$index->type = Input::get( 'type' );
			$index->has_file = Input::get( 'has_file' );
			$index->order = Input::get( 'order' );
			$index->collection_department = Input::get( 'collection_department' );
			$index->mark_department = Input::get( 'mark_department' );
			$index->category_id = Input::get( 'category' );
			$index->mark_id = Input::get( 'mark' );
			$index->activated = Input::get( 'activated' );
			$index->memo = Input::get( 'memo' );

			if ( $index->save() ) {
				return Redirect::route( 'index.list' )->with( 'flash_success', '二级指标 ' . $index->name . ' 修改成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '修改失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postDestroy( $id ) {

		$index = Index::find( $id );

		if ( is_null( $index ) ) {
			return Redirect::back()->with( 'flash_error', '没有找到二级指标' );
		} elseif ( $index->delete() ) {
			return Redirect::route( 'index.list' )->with( 'flash_success', '二级指标删除成功' );
		} else {
			return Redirect::back()->with( 'flash_error', '二级指标删除失败' );
		}
	}

}
