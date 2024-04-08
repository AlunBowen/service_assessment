<?php
namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\SetLangController;
use Illuminate\Support\Facades\Cookie;

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
        if (!Cookie::get('lang')) {
            $setLangController = new SetLangController;
            $setLangController->setLang($request);
        }

        return $next($request);
    }
}
?>