<?php namespace App\Http\Middleware;

use Closure;

class VerifyPermission {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!$user = $request->user()) {
			return $next($request);
		}

		$route   = $request->route();
		$actions = $route->getAction();

		if (!$permission = isset($actions['permission']) ? $actions['permission'] : null) {
			return $next($request);
		}

		$userPermissions = array_fetch($user->permissions()->whereIn('slug', (array) $permisssions)->get()->toArray(), 'slug');
		$permission      = (array) $permission;
		if (isset($acions['permissions_require_all'])) {
			if (count($permissions) == count($userPermissions)) {
				return $next($request);
			}
		} else {
			if (count($userPermissions) >= 1) {
				return $next($request);
			}
		}

		return abort(401);
	}

}
