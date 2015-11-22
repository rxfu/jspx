<?php

class CategoryController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {

		$title = '一级指标列表';
		$categories = Category::orderBy( 'order', 'asc' )->get();

		return View::make( 'category.list', array( 'title' => $title, 'categories' => $categories ) );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew() {

		$title = '添加一级指标';

		return View::make( 'category.new', array( 'title' => $title ) );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave() {

		$data = Input::all();

		$rules = array(
			'name' => 'required|unique:categories',
			'order' => 'numeric',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$category = new Category;
			$category->seq = Input::get( 'seq' );
			$category->name = Input::get( 'name' );
			$category->description = nl2br( Input::get( 'description' ) );
			$category->order = Input::get( 'order' );

			if ( $category->save() ) {
				return Redirect::route( 'category.list' )->with( 'flash_success', '一级指标 ' . $category->name . ' 添加成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '一级指标添加失败' );
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

		$title = '一级指标详细信息';
		$category = Category::find( $id );

		return View::make( 'category.show', array( 'title' => $title, 'category' => $category ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit( $id ) {

		$title = '编辑一级指标';
		$category = Category::find( $id );

		return View::make( 'category.edit', array( 'title' => $title, 'category' => $category )  );
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

			$category = Category::find( $id );
			$category->seq = Input::get( 'seq' );
			$category->name = Input::get( 'name' );
			$category->description = nl2br( Input::get( 'description' ) );
			$category->order = Input::get( 'order' );

			if ( $category->save() ) {
				return Redirect::route( 'category.list' )->with( 'flash_success', '一级指标 ' . $category->name . ' 修改成功' );
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

		$category = Category::find( $id );

		if ( is_null( $category ) ) {
			return Redirect::back()->with( 'flash_error', '没有找到一级指标' );
		} elseif ( $category->delete() ) {
			return Redirect::route( 'category.list' )->with( 'flash_success', '一级指标删除成功' );
		} else {
			return Redirect::back()->with( 'flash_error', '一级指标删除失败' );
		}
	}

}
