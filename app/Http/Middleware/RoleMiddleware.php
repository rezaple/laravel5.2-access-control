<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RoleMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //mengambil parameter etc -> role:admin, satff
        $roles = $this->getMiddlewareParameterOnly(func_get_args());
        
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/login');
            }
        }else{
            //perulangan jika role lebih dari satu
            foreach($roles as $role)
            {
                if ($this->auth->user()->hasRole($role))
                {
                    return $next($request);
                }
            }

            return response('Unauthorized.', 401);
        }
    }

    protected function getMiddlewareParameterOnly($args)
    {
        array_shift($args); // Delete $request
        array_shift($args); // Delete Closure $next

        return $args;
    }
}
