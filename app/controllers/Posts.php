<?php

namespace app\controllers;

use framework\View;
use app\models\Post;

/**
 * posts controller
 */
class Posts extends \framework\Controller {
	/**
	 * index
	 * 
	 * @return void
	 */
	public function indexAction() {
		echo 'controller "posts" action "index"';

		$posts = Post::getAll();

		View::render('posts/index.php', [
			'posts' => $posts
		]);
	}
	
	/**
	 * create
	 * 
	 * @return void
	 */
	public function createAction() {
		echo 'controller "posts" action "create"';
	}

	/**
	 * edit
	 * 
	 * @return void
	 */
	public function editAction() {
		echo 'controller "posts" action "edit"';
		echo '<p>route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
	}
}