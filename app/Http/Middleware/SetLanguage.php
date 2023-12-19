<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLanguage
{
    public function handle(Request $request, Closure $next)
    {
        $language = $request->cookie('lang', 'en');
        
        // Adjust this condition to check for 'cym' instead of 'es'
        if ($language === 'cym') {
            app()->setLocale('cym');
        } else {
            app()->setLocale($language);
        }

        return $next($request);
    }
}
?>